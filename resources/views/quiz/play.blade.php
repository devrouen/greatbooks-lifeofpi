@extends('layouts.app')

@section('title', 'Quiz Play - Life of Pi')
@section('description', 'Take the Life of Pi quiz and test your knowledge of Yann Martel\'s novel.')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/quiz-play.css') }}">
@endpush

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="quiz-play-container">
    <!-- Quiz Header -->
    <div class="quiz-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="quiz-info">
                        <h5 class="quiz-title">
                            <i class="fas fa-layer-group"></i>
                            <span id="difficultyDisplay">{{ ucfirst($difficulty) }}</span> Quiz
                        </h5>
                        <div class="quiz-meta">
                            <span class="username">
                                <i class="fas fa-user"></i>
                                <span id="playerName">Player</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="question-counter">
                        <span class="current-question">1</span>
                        <span class="separator">/</span>
                        <span class="total-questions">10</span>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <div class="timer-container">
                        <div class="timer">
                            <i class="fas fa-clock"></i>
                            <span id="timeDisplay">00:00</span>
                        </div>
                        <div class="progress-timer">
                            <div class="progress-timer-bar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quiz Content -->
    <div class="quiz-content">
        <div class="container">
            <!-- Loading State -->
            <div id="loadingState" class="loading-state">
                <div class="loading-spinner">
                    <div class="spinner"></div>
                </div>
                <h4>Loading Questions...</h4>
                <p>Please wait while we prepare your quiz.</p>
            </div>

            <!-- Quiz Question -->
            <div id="questionContainer" class="question-container" style="display: none;">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="question-card">
                            <div class="question-header">
                                <div class="question-type-badge">
                                    <span id="questionType">Multiple Choice</span>
                                </div>
                                <div class="question-points">
                                    <i class="fas fa-star"></i>
                                    <span id="questionPoints">10</span> points
                                </div>
                            </div>
                            
                            <div class="question-content">
                                <h3 id="questionText" class="question-text">
                                    <!-- Question will be loaded here -->
                                </h3>
                            </div>

                            <!-- Multiple Choice Options -->
                            <div id="multipleChoiceOptions" class="options-container">
                                <!-- Options will be loaded here -->
                            </div>

                            <!-- Text Input (for other question types) -->
                            <div id="textInputContainer" class="text-input-container" style="display: none;">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <input type="text" id="textAnswer" class="form-control" placeholder="Enter your answer here..." autocomplete="off">
                                </div>
                                <small class="text-muted mt-2">
                                    <i class="fas fa-info-circle"></i>
                                    Type your answer and click "Submit Answer" or press Enter.
                                </small>
                            </div>

                            <div class="question-actions">
                                <button id="submitAnswer" class="btn btn-submit" disabled>
                                    <i class="fas fa-check"></i>
                                    Submit Answer
                                </button>
                                <button id="nextQuestion" class="btn btn-next" style="display: none;">
                                    <i class="fas fa-arrow-right"></i>
                                    Next Question
                                </button>
                                <button id="finishQuiz" class="btn btn-finish" style="display: none;">
                                    <i class="fas fa-flag-checkered"></i>
                                    Finish Quiz
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quiz Results -->
            <div id="resultsContainer" class="results-container" style="display: none;">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="results-card">
                            <div class="results-header">
                                <div class="results-icon">
                                    <i class="fas fa-trophy" id="resultsIcon"></i>
                                </div>
                                <h2 id="resultsTitle">Quiz Completed!</h2>
                                <p id="resultsSubtitle">Here's how you performed</p>
                            </div>

                            <div class="results-stats">
                                <div class="stat-item">
                                    <div class="stat-value" id="correctAnswers">0</div>
                                    <div class="stat-label">Correct Answers</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value" id="totalScore">0</div>
                                    <div class="stat-label">Total Score</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value" id="percentage">0%</div>
                                    <div class="stat-label">Accuracy</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value" id="timeTaken">0:00</div>
                                    <div class="stat-label">Time Taken</div>
                                </div>
                            </div>

                            <div class="performance-bar">
                                <div class="performance-fill" id="performanceBar"></div>
                            </div>

                            <div class="results-message" id="resultsMessage">
                                <!-- Performance message will be shown here -->
                            </div>

                            <div class="results-actions">
                                <a href="{{ route('quiz.index') }}" class="btn btn-primary">
                                    <i class="fas fa-redo"></i>
                                    Take Another Quiz
                                </a>
                                <a href="{{ route('quiz.leaderboard') }}" class="btn btn-outline-primary">
                                    <i class="fas fa-trophy"></i>
                                    View Leaderboard
                                </a>
                                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-home"></i>
                                    Back to Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmExitModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-exclamation-triangle text-warning"></i>
                    Exit Quiz?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to exit the quiz? Your progress will be lost.</p>
                <div class="alert alert-warning">
                    <i class="fas fa-info-circle"></i>
                    This action cannot be undone.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue Quiz</button>
                <button type="button" class="btn btn-danger" id="confirmExit">
                    <i class="fas fa-sign-out-alt"></i>
                    Exit Quiz
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Progress Indicator -->
<div class="progress-indicator">
    <div class="progress-steps">
        <!-- Progress steps will be generated by JavaScript -->
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Pass PHP variable to JavaScript
    window.quizDifficulty = @json($difficulty);
</script>
<script src="{{ asset('js/quiz-play.js') }}"></script>
@endpush