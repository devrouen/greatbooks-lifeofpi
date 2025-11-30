@extends('layouts.app')

@section('title', 'Leaderboard - Life of Pi Quiz')
@section('description', 'Check the top scores and rankings for the Life of Pi quiz across all difficulty levels.')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/leaderboard.css') }}">
@endpush

@section('content')
<div class="leaderboard-container">
    <!-- Hero Section -->
    <section class="leaderboard-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            <i class="fas fa-trophy text-warning"></i>
                            Leaderboard
                        </h1>
                        <p class="hero-subtitle">Top performers in the Life of Pi quiz challenge</p>
                        <p class="hero-description">
                            See how you rank against other quiz takers. Challenge yourself to reach the top of the leaderboard 
                            across different difficulty levels!
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="trophy-display">
                        <div class="trophy gold">
                            <i class="fas fa-trophy"></i>
                            <div class="trophy-number">1</div>
                        </div>
                        <div class="trophy silver">
                            <i class="fas fa-medal"></i>
                            <div class="trophy-number">2</div>
                        </div>
                        <div class="trophy bronze">
                            <i class="fas fa-award"></i>
                            <div class="trophy-number">3</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Controls Section -->
    <section class="controls-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="controls-card">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="controls-title">
                                    <i class="fas fa-filter"></i>
                                    Filter by Difficulty
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <div class="difficulty-tabs">
                                    <button class="difficulty-tab active" data-difficulty="all">
                                        <i class="fas fa-globe"></i> All Levels
                                    </button>
                                    <button class="difficulty-tab" data-difficulty="easy">
                                        <i class="fas fa-seedling"></i> Easy
                                    </button>
                                    <button class="difficulty-tab" data-difficulty="medium">
                                        <i class="fas fa-anchor"></i> Medium
                                    </button>
                                    <button class="difficulty-tab" data-difficulty="hard">
                                        <i class="fas fa-mountain"></i> Hard
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leaderboard Section -->
    <section class="leaderboard-section">
        <div class="container">
            <!-- Loading State -->
            <div id="loadingState" class="loading-state text-center">
                <div class="spinner-large"></div>
                <h4>Loading Leaderboard...</h4>
                <p>Please wait while we fetch the latest rankings.</p>
            </div>

            <!-- Empty State -->
            <div id="emptyState" class="empty-state text-center" style="display: none;">
                <div class="empty-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h4>No Rankings Yet</h4>
                <p>Be the first to take a quiz and appear on the leaderboard!</p>
                <a href="{{ route('quiz.index') }}" class="btn btn-primary">
                    <i class="fas fa-play"></i> Take Quiz Now
                </a>
            </div>

            <!-- Leaderboard Table -->
            <div id="leaderboardTable" class="leaderboard-table-container" style="display: none;">
                <!-- Top 3 Podium -->
                <div id="podiumSection" class="podium-section">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="podium">
                                <!-- Second Place -->
                                <div class="podium-position second">
                                    <div class="position-card">
                                        <div class="position-number">2</div>
                                        <div class="player-avatar">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="player-name" id="second-name">-</div>
                                        <div class="player-score" id="second-score">- pts</div>
                                        <div class="player-stats">
                                            <span id="second-percentage">-%</span> • 
                                            <span id="second-time">-:--</span>
                                        </div>
                                        <div class="difficulty-badge" id="second-difficulty">-</div>
                                    </div>
                                </div>

                                <!-- First Place -->
                                <div class="podium-position first">
                                    <div class="position-card">
                                        <div class="crown">
                                            <i class="fas fa-crown"></i>
                                        </div>
                                        <div class="position-number">1</div>
                                        <div class="player-avatar">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="player-name" id="first-name">-</div>
                                        <div class="player-score" id="first-score">- pts</div>
                                        <div class="player-stats">
                                            <span id="first-percentage">-%</span> • 
                                            <span id="first-time">-:--</span>
                                        </div>
                                        <div class="difficulty-badge" id="first-difficulty">-</div>
                                    </div>
                                </div>

                                <!-- Third Place -->
                                <div class="podium-position third">
                                    <div class="position-card">
                                        <div class="position-number">3</div>
                                        <div class="player-avatar">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="player-name" id="third-name">-</div>
                                        <div class="player-score" id="third-score">- pts</div>
                                        <div class="player-stats">
                                            <span id="third-percentage">-%</span> • 
                                            <span id="third-time">-:--</span>
                                        </div>
                                        <div class="difficulty-badge" id="third-difficulty">-</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Full Rankings Table -->
                <div class="rankings-table">
                    <div class="table-header">
                        <h3>
                            <i class="fas fa-list-ol"></i>
                            Complete Rankings
                        </h3>
                        <div class="table-info">
                            <span id="totalPlayers">0</span> players ranked
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Player</th>
                                    <th>Score</th>
                                    <th>Accuracy</th>
                                    <th>Best Time</th>
                                    <th>Difficulty</th>
                                    <th>Attempts</th>
                                    <th>Last Played</th>
                                </tr>
                            </thead>
                            <tbody id="rankingsTableBody">
                                <!-- Rankings will be populated here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number" id="totalPlayersCount">0</div>
                            <div class="stat-label">Total Players</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number" id="averageScore">0</div>
                            <div class="stat-label">Average Score</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number" id="highestScore">0</div>
                            <div class="stat-label">Highest Score</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number" id="fastestTime">-:--</div>
                            <div class="stat-label">Fastest Time</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Action Section -->
    <section class="action-section">
        <div class="container text-center">
            <h3>Ready to Compete?</h3>
            <p>Take the quiz and see if you can make it to the top of the leaderboard!</p>
            <div class="action-buttons">
                <a href="{{ route('quiz.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-gamepad"></i>
                    Take Quiz Now
                </a>
                <button class="btn btn-outline-primary btn-lg" onclick="refreshLeaderboard()">
                    <i class="fas fa-sync-alt"></i>
                    Refresh Rankings
                </button>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/leaderboard.js') }}"></script>
@endpush