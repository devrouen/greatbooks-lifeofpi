@extends('layouts.app')

@section('title', 'Life of Pi - Literary Analysis & Interactive Quiz')
@section('description', 'Explore Yann Martel\'s Life of Pi through comprehensive literary analysis, historical context, and interactive quizzes. Dive deep into one of literature\'s most celebrated works.')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold text-white mb-4 animate-fade-in">
                        Life of Pi
                        <span class="text-warning d-block fs-3">by Yann Martel</span>
                    </h1>
                    <p class="lead text-white-50 mb-4 animate-fade-in-delay-1">
                        Embark on a journey of survival, faith, and storytelling. Explore the depths of one of literature's most captivating tales through comprehensive analysis and interactive learning.
                    </p>
                    <div class="hero-buttons animate-fade-in-delay-2">
                        <a href="{{ route('summary') }}" class="btn btn-primary btn-lg me-3 mb-2">
                            <i class="fas fa-book-open me-2"></i>Start Reading
                        </a>
                        <a href="{{ route('quiz.index') }}" class="btn btn-warning btn-lg mb-2">
                            <i class="fas fa-gamepad me-2"></i>Quiz Arcade
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="book-showcase animate-float">
                    <div class="book-container">
                        <img src="https://i.pinimg.com/736x/04/05/c4/0405c45d7c0f56c39dc4baaaca482a71.jpg" 
                             alt="Life of Pi Book Cover" 
                             class="book-cover img-fluid">
                        <div class="book-glow"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section class="stats-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="stat-card text-center h-100">
                    <div class="stat-icon">
                        <i class="fas fa-calendar-alt text-primary"></i>
                    </div>
                    <h4 class="stat-number">2001</h4>
                    <p class="stat-label">Published</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="stat-card text-center h-100">
                    <div class="stat-icon">
                        <i class="fas fa-award text-success"></i>
                    </div>
                    <h4 class="stat-number">Man Booker</h4>
                    <p class="stat-label">Prize Winner</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="stat-card text-center h-100">
                    <div class="stat-icon">
                        <i class="fas fa-globe text-info"></i>
                    </div>
                    <h4 class="stat-number">40+</h4>
                    <p class="stat-label">Languages</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="stat-card text-center h-100">
                    <div class="stat-icon">
                        <i class="fas fa-film text-danger"></i>
                    </div>
                    <h4 class="stat-number">2012</h4>
                    <p class="stat-label">Film Adaptation</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Navigation Cards -->
<section class="navigation-section py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title mb-4">Explore the Story</h2>
                <p class="lead text-muted">Dive deep into every aspect of this literary masterpiece</p>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Timeline Card -->
            <div class="col-lg-4 col-md-6">
                <div class="nav-card h-100">
                    <div class="nav-card-header">
                        <i class="fas fa-clock text-primary"></i>
                    </div>
                    <div class="nav-card-body">
                        <h4>Historical Timeline</h4>
                        <p>Discover the historical context and publication journey of Life of Pi.</p>
                        <ul class="feature-list">
                            <li>Publication history</li>
                            <li>Awards & recognition</li>
                            <li>Cultural impact</li>
                        </ul>
                    </div>
                    <div class="nav-card-footer">
                        <a href="{{ route('timeline') }}" class="btn btn-outline-primary">
                            Explore Timeline <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Conventions Card -->
            <div class="col-lg-4 col-md-6">
                <div class="nav-card h-100">
                    <div class="nav-card-header">
                        <i class="fas fa-lightbulb text-warning"></i>
                    </div>
                    <div class="nav-card-body">
                        <h4>Literary Conventions</h4>
                        <p>Analyze the literary techniques and narrative structures used in the novel.</p>
                        <ul class="feature-list">
                            <li>Narrative techniques</li>
                            <li>Symbolism & themes</li>
                            <li>Literary devices</li>
                        </ul>
                    </div>
                    <div class="nav-card-footer">
                        <a href="{{ route('convention') }}" class="btn btn-outline-warning">
                            Study Conventions <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Author Card -->
            <div class="col-lg-4 col-md-6">
                <div class="nav-card h-100">
                    <div class="nav-card-header">
                        <i class="fas fa-user text-success"></i>
                    </div>
                    <div class="nav-card-body">
                        <h4>Author Biography</h4>
                        <p>Learn about Yann Martel's life, influences, and literary career.</p>
                        <ul class="feature-list">
                            <li>Early life & education</li>
                            <li>Writing inspiration</li>
                            <li>Other works</li>
                        </ul>
                    </div>
                    <div class="nav-card-footer">
                        <a href="{{ route('author') }}" class="btn btn-outline-success">
                            Meet the Author <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Summary Card -->
            <div class="col-lg-4 col-md-6">
                <div class="nav-card h-100">
                    <div class="nav-card-header">
                        <i class="fas fa-file-text text-info"></i>
                    </div>
                    <div class="nav-card-body">
                        <h4>Story Summary</h4>
                        <p>Comprehensive plot summary and character analysis of the novel.</p>
                        <ul class="feature-list">
                            <li>Plot overview</li>
                            <li>Character development</li>
                            <li>Key events</li>
                        </ul>
                    </div>
                    <div class="nav-card-footer">
                        <a href="{{ route('summary') }}" class="btn btn-outline-info">
                            Read Summary <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Analysis Card -->
            <div class="col-lg-4 col-md-6">
                <div class="nav-card h-100">
                    <div class="nav-card-header">
                        <i class="fas fa-microscope text-danger"></i>
                    </div>
                    <div class="nav-card-body">
                        <h4>Literary Analysis</h4>
                        <p>In-depth critical analysis of themes, motifs, and literary significance.</p>
                        <ul class="feature-list">
                            <li>Thematic analysis</li>
                            <li>Critical perspectives</li>
                            <li>Scholarly interpretations</li>
                        </ul>
                    </div>
                    <div class="nav-card-footer">
                        <a href="{{ route('analysis') }}" class="btn btn-outline-danger">
                            Deep Analysis <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quiz Card -->
            <div class="col-lg-4 col-md-6">
                <div class="nav-card h-100 quiz-card">
                    <div class="nav-card-header">
                        <i class="fas fa-gamepad text-warning"></i>
                    </div>
                    <div class="nav-card-body">
                        <h4>Quiz Arcade</h4>
                        <p>Test your knowledge with our interactive quiz system!</p>
                        <ul class="feature-list">
                            <li>Multiple difficulty levels</li>
                            <li>Instant feedback</li>
                            <li>Leaderboard system</li>
                        </ul>
                    </div>
                    <div class="nav-card-footer">
                        <a href="{{ route('quiz.index') }}" class="btn btn-warning text-dark fw-bold">
                            <i class="fas fa-play me-1"></i> Play Now!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quote Section -->
<section class="quote-section py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <blockquote class="blockquote">
                    <p class="fs-4 mb-4">"The world isn't just the way it is. It is how we understand it, no? And in understanding something, we bring something to it, no? Doesn't that make life a story?"</p>
                    <footer class="blockquote-footer text-white-50">
                        <cite title="Source Title">Pi Patel in Life of Pi</cite>
                    </footer>
                </blockquote>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/home.js') }}"></script>
@endpush