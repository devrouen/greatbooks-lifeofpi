@extends('layouts.app')

@section('title', 'Quiz Arcade - Life of Pi')
@section('description', 'Test your knowledge about Life of Pi by Yann Martel with our interactive quiz arcade.')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
@endpush

@section('content')
<div class="quiz-container">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            <i class="fas fa-gamepad text-warning"></i>
                            Quiz Arcade
                        </h1>
                        <p class="hero-subtitle">Test your knowledge about <strong>Life of Pi</strong> by Yann Martel</p>
                        <p class="hero-description">
                            Choose your difficulty level and embark on an interactive journey through Pi's extraordinary adventure. 
                            Challenge yourself with questions about the plot, characters, themes, and literary analysis.
                        </p>
                        <div class="hero-stats">
                            <div class="stat-item">
                                <i class="fas fa-question-circle"></i>
                                <span>Multiple Question Types</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-trophy"></i>
                                <span>Leaderboard Rankings</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-clock"></i>
                                <span>Timed Challenges</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <div class="floating-card">
                            <i class="fas fa-ship text-primary"></i>
                            <h5>Adventure Awaits</h5>
                            <p>Journey through Pi's story</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Difficulty Selection -->
    <section class="difficulty-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="section-title">Choose Your Challenge</h2>
                    <p class="section-subtitle">Select a difficulty level that matches your knowledge of the novel</p>
                </div>
            </div>
            
            <div class="row g-4 justify-content-center">
                <!-- Easy Level -->
                <div class="col-lg-4 col-md-6">
                    <div class="difficulty-card easy" data-difficulty="easy">
                        <div class="difficulty-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <h3 class="difficulty-title">Easy</h3>
                        <div class="difficulty-description">
                            <p>Perfect for beginners or a quick review</p>
                            <ul class="difficulty-features">
                                <li><i class="fas fa-check"></i> Basic plot questions</li>
                                <li><i class="fas fa-check"></i> Character identification</li>
                                <li><i class="fas fa-check"></i> 10 questions</li>
                                <li><i class="fas fa-check"></i> 15 minutes</li>
                            </ul>
                        </div>
                        <div class="difficulty-footer">
                            <span class="points-info">10 points per question</span>
                            <button class="btn btn-start" onclick="startQuiz('easy')">
                                <i class="fas fa-play"></i> Start Easy Quiz
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Medium Level -->
                <div class="col-lg-4 col-md-6">
                    <div class="difficulty-card medium featured" data-difficulty="medium">
                        <div class="featured-badge">
                            <i class="fas fa-star"></i> Recommended
                        </div>
                        <div class="difficulty-icon">
                            <i class="fas fa-anchor"></i>
                        </div>
                        <h3 class="difficulty-title">Medium</h3>
                        <div class="difficulty-description">
                            <p>For those who have read and understood the novel</p>
                            <ul class="difficulty-features">
                                <li><i class="fas fa-check"></i> Theme analysis</li>
                                <li><i class="fas fa-check"></i> Symbolism questions</li>
                                <li><i class="fas fa-check"></i> 10 questions</li>
                                <li><i class="fas fa-check"></i> 20 minutes</li>
                            </ul>
                        </div>
                        <div class="difficulty-footer">
                            <span class="points-info">15 points per question</span>
                            <button class="btn btn-start" onclick="startQuiz('medium')">
                                <i class="fas fa-play"></i> Start Medium Quiz
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Hard Level -->
                <div class="col-lg-4 col-md-6">
                    <div class="difficulty-card hard" data-difficulty="hard">
                        <div class="difficulty-icon">
                            <i class="fas fa-mountain"></i>
                        </div>
                        <h3 class="difficulty-title">Hard</h3>
                        <div class="difficulty-description">
                            <p>Ultimate challenge for literature experts</p>
                            <ul class="difficulty-features">
                                <li><i class="fas fa-check"></i> Deep literary analysis</li>
                                <li><i class="fas fa-check"></i> Critical thinking</li>
                                <li><i class="fas fa-check"></i> 10 questions</li>
                                <li><i class="fas fa-check"></i> 25 minutes</li>
                            </ul>
                        </div>
                        <div class="difficulty-footer">
                            <span class="points-info">20 points per question</span>
                            <button class="btn btn-start" onclick="startQuiz('hard')">
                                <i class="fas fa-play"></i> Start Hard Quiz
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Actions -->
    <section class="actions-section py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-trophy text-warning"></i>
                        </div>
                        <div class="action-content">
                            <h4>View Leaderboard</h4>
                            <p>See how you rank against other players and check the top scores.</p>
                            <a href="{{ route('quiz.leaderboard') }}" class="btn btn-outline-primary">
                                <i class="fas fa-medal"></i> View Rankings
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="action-card">
                        <div class="action-icon">
                            <i class="fas fa-book-open text-info"></i>
                        </div>
                        <div class="action-content">
                            <h4>Study Material</h4>
                            <p>Review the novel analysis, timeline, and author biography before taking the quiz.</p>
                            <a href="{{ route('home') }}" class="btn btn-outline-primary">
                                <i class="fas fa-graduation-cap"></i> Study First
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Username Modal -->
<div class="modal fade" id="usernameModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="fas fa-user-circle text-primary"></i> 
                    Enter Your Username
                </h5>
            </div>
            <div class="modal-body">
                <p class="text-muted mb-3">Choose a username to track your progress and appear on the leaderboard.</p>
                <div class="form-group">
                    <input type="text" id="usernameInput" class="form-control" placeholder="Enter username" maxlength="50" autocomplete="off">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="quiz-info mt-3">
                    <h6 class="text-primary">Quiz Information:</h6>
                    <div class="info-grid">
                        <div class="info-item">
                            <i class="fas fa-layer-group"></i>
                            <span>Difficulty: <strong id="selectedDifficulty"></strong></span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-question"></i>
                            <span>Questions: <strong>10</strong></span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-clock"></i>
                            <span>Time: <strong id="timeLimit"></strong></span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-star"></i>
                            <span>Points: <strong id="pointsInfo"></strong></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="proceedToQuiz()">
                    <i class="fas fa-rocket"></i> Start Quiz
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/quiz.js') }}"></script>
@endpush