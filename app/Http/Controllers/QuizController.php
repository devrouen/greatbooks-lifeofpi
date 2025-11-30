<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\QuestionAnswer;
use App\Models\QuizAttempt;
use App\Models\QuizResponse;
use App\Models\Leaderboard;

class QuizController extends Controller
{
    /**
     * Show the quiz selection page
     */
    public function index()
    {
        return view('quiz.quiz');
    }

    public function getQuestions($difficulty)
    {
        try {
            // Define question types based on difficulty level
            $questionTypesByDifficulty = [
                'easy' => [
                    'multiple_choice',
                    'true_false',
                    'identification'
                ],
                'medium' => [
                    'multiple_choice',
                    'true_false',
                    'identification',
                    'fill_in_blank'
                ],
                'hard' => [
                    'multiple_choice',
                    'true_false',
                    'identification',
                    'fill_in_blank',
                    'enumeration'
                ]
            ];

            // Get available question types for this difficulty
            $availableTypes = $questionTypesByDifficulty[$difficulty] ?? $questionTypesByDifficulty['easy'];
            
            $questions = collect();
            $targetTotal = 10; // Target total questions
            $typeCount = count($availableTypes);
            
            // Calculate random distribution that adds up to 10
            $distribution = $this->generateRandomDistribution($targetTotal, $typeCount);
            
            // Get questions for each type based on the random distribution
            foreach ($availableTypes as $index => $type) {
                $count = $distribution[$index];
                
                if ($count > 0) {
                    // Check how many questions are available for this type
                    $availableCount = Question::where('difficulty', $difficulty)
                        ->where('question_type', $type)
                        ->where('is_active', true)
                        ->count();

                    if ($availableCount > 0) {
                        // Take the minimum of requested count or available count
                        $actualCount = min($count, $availableCount);
                        
                        $typeQuestions = Question::where('difficulty', $difficulty)
                            ->where('question_type', $type)
                            ->where('is_active', true)
                            ->with(['options', 'answers'])
                            ->inRandomOrder()
                            ->limit($actualCount)
                            ->get();

                        $questions = $questions->merge($typeQuestions);
                    }
                }
            }

            // If we didn't get enough questions, fill remaining from any available type
            if ($questions->count() < $targetTotal) {
                $remaining = $targetTotal - $questions->count();
                $usedIds = $questions->pluck('question_id')->toArray();
                
                $additionalQuestions = Question::where('difficulty', $difficulty)
                    ->where('is_active', true)
                    ->whereNotIn('question_id', $usedIds)
                    ->with(['options', 'answers'])
                    ->inRandomOrder()
                    ->limit($remaining)
                    ->get();
                    
                $questions = $questions->merge($additionalQuestions);
            }

            // Shuffle all questions so they're not grouped by type
            $questions = $questions->shuffle();

            if ($questions->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'No questions available for this difficulty level.'
                ], 404);
            }

            // Format questions for frontend
            $formattedQuestions = $questions->map(function ($question) {
                $questionData = [
                    'id' => $question->question_id,
                    'text' => $question->question_text,
                    'type' => $question->question_type,
                    'points' => $question->points,
                    'difficulty' => $question->difficulty
                ];

                if ($question->question_type === 'multiple_choice' || $question->question_type === 'true_false') {
                    $questionData['options'] = $question->options->map(function ($option) {
                        return [
                            'id' => $option->option_id,
                            'text' => $option->option_text,
                        ];
                    });
                }

                return $questionData;
            });

            return response()->json([
                'success' => true,
                'total_questions' => $questions->count(),
                'questions' => $formattedQuestions
            ]);

        } catch (\Exception $e) {
            Log::error('Error fetching questions:', [
                'difficulty' => $difficulty,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error fetching questions: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Generate a random distribution of numbers that sum to a target
     * 
     * @param int $target The target sum
     * @param int $parts Number of parts to split into
     * @return array Array of random integers that sum to target
     */
    private function generateRandomDistribution($target, $parts)
    {
        if ($parts <= 0) {
            return [];
        }
        
        if ($parts === 1) {
            return [$target];
        }
        
        // Start with at least 1 for each part (if target allows)
        $minPerPart = 1;
        if ($target < $parts * $minPerPart) {
            $minPerPart = 0; // If target is too small, some parts can be 0
        }
        
        $distribution = array_fill(0, $parts, $minPerPart);
        $remaining = $target - ($minPerPart * $parts);
        
        // Distribute remaining randomly
        for ($i = 0; $i < $remaining; $i++) {
            $randomIndex = rand(0, $parts - 1);
            $distribution[$randomIndex]++;
        }
        
        return $distribution;
    }

    /**
     * Submit quiz attempt
     */
    public function submitAttempt(Request $request)
    {
        try {
            // Log the incoming request for debugging
            Log::info('Quiz submission received:', $request->all());

            // Enhanced validation
            $request->validate([
                'username' => 'required|string|max:50',
                'difficulty' => 'required|in:easy,medium,hard',
                'answers' => 'required|array|min:1',
                'answers.*.question_id' => 'required|integer|exists:questions,question_id',
                'answers.*.selected_option_id' => 'nullable|integer',
                'answers.*.answer_text' => 'nullable|string',
                'answers.*.time_spent' => 'nullable|integer|min:0',
                'time_taken' => 'required|integer|min:1',
                'timezone_offset' => 'nullable|integer'
            ]);

            // Validate that each answer has appropriate data
            foreach ($request->answers as $index => $answer) {
                $question = Question::find($answer['question_id']);
                if (!$question) {
                    Log::error('Question not found:', ['question_id' => $answer['question_id']]);
                    throw new \Exception("Question not found: " . $answer['question_id']);
                }
                
                if ($question->question_type === 'multiple_choice' || $question->question_type === 'true_false') {
                    if (empty($answer['selected_option_id'])) {
                        throw new \Exception("Selected option required for question " . $question->question_id);
                    }
                    
                    // Verify the option belongs to the question
                    $optionExists = QuestionOption::where('option_id', $answer['selected_option_id'])
                        ->where('question_id', $question->question_id)
                        ->exists();
                    
                    if (!$optionExists) {
                        throw new \Exception("Invalid option selected for question " . $question->question_id);
                    }
                } else {
                    if (empty($answer['answer_text']) && $answer['answer_text'] !== '0') {
                        throw new \Exception("Answer text required for question " . $question->question_id);
                    }
                }
            }

            DB::beginTransaction();

            $totalQuestions = count($request->answers);
            $correctAnswersCount = 0; // FIXED: Use different variable name
            $totalScore = 0;

            // Create quiz attempt
            $attempt = QuizAttempt::create([
                'username' => $request->username,
                'difficulty_level' => $request->difficulty,
                'total_questions' => $totalQuestions,
                'time_taken' => $request->time_taken,
                'timezone_offset' => $request->timezone_offset,
            ]);

            Log::info('Quiz attempt created:', ['attempt_id' => $attempt->attempt_id]);

            // Process each answer
            foreach ($request->answers as $answer) {
                $question = Question::find($answer['question_id']);
                if (!$question) {
                    Log::warning('Skipping missing question:', ['question_id' => $answer['question_id']]);
                    continue;
                }

                $isCorrect = false;
                $selectedOptionId = null;
                $answerText = null;

                if ($question->question_type === 'multiple_choice' || $question->question_type === 'true_false') {
                    $selectedOptionId = $answer['selected_option_id'];
                    $selectedOption = QuestionOption::find($selectedOptionId);
                    $isCorrect = $selectedOption && $selectedOption->is_correct;
                    
                    Log::info('Processing MC/TF question:', [
                        'question_id' => $question->question_id,
                        'selected_option_id' => $selectedOptionId,
                        'is_correct' => $isCorrect
                    ]);
                } else {
                    // FIXED: Use different variable name to avoid conflict
                    $answerText = trim($answer['answer_text']);
                    $correctAnswerOptions = QuestionAnswer::where('question_id', $question->question_id)->get();
                    
                    Log::info('Processing text question:', [
                        'question_id' => $question->question_id,
                        'answer_text' => $answerText,
                        'correct_options_count' => $correctAnswerOptions->count()
                    ]);
                    
                    foreach ($correctAnswerOptions as $correctAnswer) {
                        if ($correctAnswer->is_case_sensitive) {
                            if ($answerText === $correctAnswer->answer_text) {
                                $isCorrect = true;
                                break;
                            }
                        } else {
                            if (strtolower($answerText) === strtolower($correctAnswer->answer_text)) {
                                $isCorrect = true;
                                break;
                            }
                        }
                    }
                }

                $pointsEarned = $isCorrect ? $question->points : 0;
                
                if ($isCorrect) {
                    $correctAnswersCount++; // FIXED: Now using the correct variable
                    $totalScore += $pointsEarned;
                }

                // Save quiz response
                $response = QuizResponse::create([
                    'attempt_id' => $attempt->attempt_id,
                    'question_id' => $question->question_id,
                    'selected_option_id' => $selectedOptionId,
                    'answer_text' => $answerText,
                    'is_correct' => $isCorrect,
                    'points_earned' => $pointsEarned,
                    'time_spent' => $answer['time_spent'] ?? null,
                ]);

                Log::info('Quiz response saved:', [
                    'response_id' => $response->id,
                    'is_correct' => $isCorrect,
                    'points_earned' => $pointsEarned
                ]);
            }

            // Update attempt with final scores
            $attempt->update([
                'correct_answers' => $correctAnswersCount, // FIXED: Using correct variable
                'total_score' => $totalScore,
            ]);

            Log::info('Quiz attempt updated:', [
                'attempt_id' => $attempt->attempt_id,
                'correct_answers' => $correctAnswersCount,
                'total_score' => $totalScore
            ]);

            // Update leaderboard
            $this->updateLeaderboard($request->username, $request->difficulty, $totalScore, $totalQuestions, $request->time_taken);

            DB::commit();

            $percentage = $totalQuestions > 0 ? round(($correctAnswersCount / $totalQuestions) * 100, 2) : 0;

            Log::info('Quiz submitted successfully:', [
                'attempt_id' => $attempt->attempt_id,
                'total_questions' => $totalQuestions,
                'correct_answers' => $correctAnswersCount,
                'total_score' => $totalScore,
                'percentage' => $percentage
            ]);

            return response()->json([
                'success' => true,
                'results' => [
                    'attempt_id' => $attempt->attempt_id,
                    'total_questions' => $totalQuestions,
                    'correct_answers' => $correctAnswersCount,
                    'total_score' => $totalScore,
                    'percentage' => $percentage,
                    'time_taken' => $request->time_taken
                ]
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error('Validation failed:', [
                'errors' => $e->errors(),
                'request_data' => $request->all()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Validation failed: ' . implode(', ', array_flatten($e->errors())),
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Quiz submission error:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'request_data' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error submitting quiz: ' . $e->getMessage(),
                'debug_info' => app()->environment(['local', 'development']) ? [
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ] : null
            ], 500);
        }
    }

    /**
     * Update leaderboard
     */
    private function updateLeaderboard($username, $difficulty, $score, $totalQuestions, $timeTaken)
    {
        try {
            // Calculate percentage based on actual points possible
            $question = Question::where('difficulty', $difficulty)->first();
            $maxPointsPerQuestion = $question ? $question->points : 10;
            $maxPossibleScore = $totalQuestions * $maxPointsPerQuestion;
            $percentage = $maxPossibleScore > 0 ? round(($score / $maxPossibleScore) * 100, 2) : 0;

            $leaderboardEntry = Leaderboard::where('username', $username)
                ->where('difficulty_level', $difficulty)
                ->first();

            if ($leaderboardEntry) {
                $updateData = [
                    'total_attempts' => $leaderboardEntry->total_attempts + 1,
                    'last_played' => now(),
                ];

                // Update if better score
                if ($score > $leaderboardEntry->best_score) {
                    $updateData['best_score'] = $score;
                    $updateData['best_percentage'] = $percentage;
                }

                // Update if faster time with same or better score
                if ($score >= $leaderboardEntry->best_score && 
                    (!$leaderboardEntry->fastest_time || $timeTaken < $leaderboardEntry->fastest_time)) {
                    $updateData['fastest_time'] = $timeTaken;
                }

                $leaderboardEntry->update($updateData);
            } else {
                Leaderboard::create([
                    'username' => $username,
                    'difficulty_level' => $difficulty,
                    'best_score' => $score,
                    'best_percentage' => $percentage,
                    'total_attempts' => 1,
                    'fastest_time' => $timeTaken,
                    'last_played' => now(),
                ]);
            }
            
            Log::info('Leaderboard updated:', [
                'username' => $username,
                'difficulty' => $difficulty,
                'score' => $score,
                'percentage' => $percentage
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating leaderboard:', [
                'username' => $username,
                'difficulty' => $difficulty,
                'error' => $e->getMessage()
            ]);
            // Don't throw the exception as leaderboard update failure shouldn't fail the quiz
        }
    }

    /**
     * Show leaderboard
     */
    public function leaderboard()
    {
        return view('quiz.leaderboard');
    }

    /**
     * Get leaderboard data
     */
    public function getLeaderboardData($difficulty = 'all')
    {
        try {
            $query = Leaderboard::select('username', 'difficulty_level', 'best_score', 'best_percentage', 'total_attempts', 'fastest_time', 'last_played')
                ->orderBy('best_score', 'desc')
                ->orderBy('fastest_time', 'asc');

            if ($difficulty !== 'all') {
                $query->where('difficulty_level', $difficulty);
            }

            $leaderboard = $query->limit(50)->get();

            return response()->json([
                'success' => true,
                'leaderboard' => $leaderboard
            ]);

        } catch (\Exception $e) {
            Log::error('Error fetching leaderboard:', [
                'difficulty' => $difficulty,
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error fetching leaderboard: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show quiz play page
     */
    public function play($difficulty)
    {
        if (!in_array($difficulty, ['easy', 'medium', 'hard'])) {
            abort(404);
        }

        return view('quiz.play', compact('difficulty'));
    }
}