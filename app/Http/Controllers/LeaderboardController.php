<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    /**
     * Display the main leaderboard page with all difficulties
     */
    public function index()
    {
        $leaderboards = [
            'easy' => $this->getLeaderboardData('easy', 10),
            'medium' => $this->getLeaderboardData('medium', 10),
            'hard' => $this->getLeaderboardData('hard', 10)
        ];

        $stats = [
            'total_players' => DB::table('leaderboard')->distinct('username')->count(),
            'total_attempts' => DB::table('quiz_attempts')->count(),
            'avg_scores' => [
                'easy' => DB::table('leaderboard')->where('difficulty_level', 'easy')->avg('best_score'),
                'medium' => DB::table('leaderboard')->where('difficulty_level', 'medium')->avg('best_score'),
                'hard' => DB::table('leaderboard')->where('difficulty_level', 'hard')->avg('best_score')
            ]
        ];

        return view('leaderboard.index', compact('leaderboards', 'stats'));
    }

    /**
     * Display leaderboard for specific difficulty
     */
    public function show($difficulty)
    {
        $validDifficulties = ['easy', 'medium', 'hard'];
        if (!in_array($difficulty, $validDifficulties)) {
            return redirect()->route('leaderboard.index')->with('error', 'Invalid difficulty level');
        }

        $leaderboard = $this->getLeaderboardData($difficulty, 50);
        
        $stats = [
            'total_players' => count($leaderboard),
            'total_attempts' => array_sum(array_column($leaderboard, 'total_attempts')),
            'highest_score' => count($leaderboard) > 0 ? $leaderboard[0]['best_score'] : 0,
            'avg_score' => count($leaderboard) > 0 ? round(array_sum(array_column($leaderboard, 'best_score')) / count($leaderboard), 1) : 0
        ];

        return view('leaderboard.show', compact('leaderboard', 'difficulty', 'stats'));
    }

    /**
     * Get leaderboard data via API for AJAX requests
     */
    public function getData($difficulty)
    {
        $validDifficulties = ['easy', 'medium', 'hard'];
        if (!in_array($difficulty, $validDifficulties)) {
            return response()->json(['error' => 'Invalid difficulty level'], 400);
        }

        $leaderboard = $this->getLeaderboardData($difficulty, 100);
        
        return response()->json([
            'leaderboard' => $leaderboard,
            'difficulty' => $difficulty,
            'total_count' => count($leaderboard)
        ]);
    }

    /**
     * Get formatted leaderboard data for a specific difficulty
     */
    private function getLeaderboardData($difficulty, $limit = 10)
    {
        $data = DB::table('leaderboard')
            ->where('difficulty_level', $difficulty)
            ->orderByDesc('best_score')
            ->orderByAsc('fastest_time')
            ->orderByDesc('best_percentage')
            ->limit($limit)
            ->get();

        $leaderboard = [];
        $rank = 1;

        foreach ($data as $record) {
            $leaderboard[] = [
                'rank' => $rank,
                'username' => $record->username,
                'best_score' => $record->best_score,
                'best_percentage' => $record->best_percentage,
                'total_attempts' => $record->total_attempts,
                'fastest_time' => $record->fastest_time,
                'fastest_time_formatted' => $this->formatTime($record->fastest_time),
                'last_played' => $record->last_played,
                'last_played_formatted' => $this->formatDate($record->last_played),
                'difficulty_level' => $record->difficulty_level
            ];
            $rank++;
        }

        return $leaderboard;
    }

    /**
     * Format time in seconds to readable format
     */
    private function formatTime($seconds)
    {
        if (!$seconds) return 'N/A';
        
        $minutes = floor($seconds / 60);
        $remainingSeconds = $seconds % 60;
        
        if ($minutes > 0) {
            return sprintf('%dm %ds', $minutes, $remainingSeconds);
        }
        
        return sprintf('%ds', $remainingSeconds);
    }

    /**
     * Format date to readable format
     */
    private function formatDate($date)
    {
        if (!$date) return 'N/A';
        
        return \Carbon\Carbon::parse($date)->format('M j, Y g:i A');
    }

    /**
     * Get user's personal stats across all difficulties
     */
    public function getUserStats(Request $request)
    {
        $username = $request->input('username');
        
        if (!$username) {
            return response()->json(['error' => 'Username required'], 400);
        }

        $stats = DB::table('leaderboard')
            ->where('username', $username)
            ->get()
            ->keyBy('difficulty_level');

        $totalAttempts = DB::table('quiz_attempts')
            ->where('username', $username)
            ->count();

        $recentAttempts = DB::table('quiz_attempts')
            ->where('username', $username)
            ->orderByDesc('completed_at')
            ->limit(5)
            ->get()
            ->map(function ($attempt) {
                return [
                    'difficulty' => $attempt->difficulty_level,
                    'score' => $attempt->total_score,
                    'percentage' => $attempt->total_questions > 0 ? 
                        round(($attempt->correct_answers / $attempt->total_questions) * 100, 1) : 0,
                    'time_taken' => $this->formatTime($attempt->time_taken),
                    'completed_at' => $this->formatDate($attempt->completed_at)
                ];
            });

        return response()->json([
            'username' => $username,
            'total_attempts' => $totalAttempts,
            'difficulty_stats' => $stats,
            'recent_attempts' => $recentAttempts
        ]);
    }
}