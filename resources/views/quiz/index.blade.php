@extends('layouts.app')

@section('title', 'Quiz Challenge - Test Your Knowledge')

@section('meta')
<meta name="description" content="Challenge yourself with our interactive quiz! Choose from Easy, Medium, or Hard difficulty levels and compete on the leaderboards.">
<meta name="keywords" content="quiz, challenge, trivia, knowledge, test, leaderboard, competition">
<meta name="author" content="Quiz Challenge">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="Quiz Challenge - Test Your Knowledge">
<meta property="og:description" content="Challenge yourself with our interactive quiz! Choose from Easy, Medium, or Hard difficulty levels.">
<meta property="og:image" content="{{ asset('images/quiz-og-image.jpg') }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="Quiz Challenge - Test Your Knowledge">
<meta property="twitter:description" content="Challenge yourself with our interactive quiz! Choose from Easy, Medium, or Hard difficulty levels.">
<meta property="twitter:image" content="{{ asset('images/quiz-og-image.jpg') }}">

<!-- Preload critical resources -->
<link rel="preload" href="{{ asset('css/quiz.css') }}" as="style">
<link rel="preload" href="{{ asset('js/quiz.js') }}" as="script">
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
@endpush

@section('content')
<main class="quiz-container" role="main">
    <div class="container">
        <!-- Header Section -->
        <header class="quiz-header">
            <h1 class="quiz-title">
                📚 Quiz Challenge
            </h1>
            <p class="quiz-subtitle">
                Test your knowledge and compete with others! Choose your difficulty level and see how you rank on the leaderboards.
            </p>
        </header>

        <!-- Username Input Section -->
        <section class="username-section" aria-labelledby="username-label">
            <div class="glass-card">
                <label for="username" id="username-label" class="input-label">
                    Enter Your Name:
                </label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    value="{{ session('quiz_username', '') }}"
                    class="username-input"
                    placeholder="Your name" 
                    maxlength="50"
                    autocomplete="nickname"
                    aria-describedby="username-help"
                    required
                >
                <div id="username-help" class="sr-only">
                    Enter your name to participate in the quiz challenge
                </div>
            </div>
        </section>

        <!-- Difficulty Selection Section -->
        <section class="difficulty-section" aria-labelledby="difficulty-heading">
            <h2 id="difficulty-heading" class="sr-only">Choose Quiz Difficulty</h2>
            
            <div class="difficulty-grid">
                <!-- Easy Difficulty -->
                <article class="difficulty-card easy">
                    <div class="difficulty-icon" aria-hidden="true">
                        <span>🟢</span>
                    </div>
                    <h3 class="difficulty-title">Easy</h3>
                    <p class="difficulty-description">Perfect for beginners</p>
                    
                    <div class="difficulty-stats" role="group" aria-label="Easy quiz statistics">
                        <p class="stats-questions">
                            {{ number_format($stats['easy']) }} Questions Available
                        </p>
                        <p class="stats-points">10 points per question</p>
                    </div>
                    
                    <button 
                        type="button"
                        data-difficulty="easy"
                        class="difficulty-button"
                        aria-describedby="easy-description"
                        disabled
                    >
                        Start Easy Quiz
                    </button>
                    <div id="easy-description" class="sr-only">
                        Start an easy difficulty quiz with {{ $stats['easy'] }} available questions
                    </div>
                </article>

                <!-- Medium Difficulty -->
                <article class="difficulty-card medium">
                    <div class="difficulty-icon" aria-hidden="true">
                        <span>🟡</span>
                    </div>
                    <h3 class="difficulty-title">Medium</h3>
                    <p class="difficulty-description">For intermediate players</p>
                    
                    <div class="difficulty-stats" role="group" aria-label="Medium quiz statistics">
                        <p class="stats-questions">
                            {{ number_format($stats['medium']) }} Questions Available
                        </p>
                        <p class="stats-points">10 points per question</p>
                    </div>
                    
                    <button 
                        type="button"
                        data-difficulty="medium"
                        class="difficulty-button"
                        aria-describedby="medium-description"
                        disabled
                    >
                        Start Medium Quiz
                    </button>
                    <div id="medium-description" class="sr-only">
                        Start a medium difficulty quiz with {{ $stats['medium'] }} available questions
                    </div>
                </article>

                <!-- Hard Difficulty -->
                <article class="difficulty-card hard">
                    <div class="difficulty-icon" aria-hidden="true">
                        <span>🔴</span>
                    </div>
                    <h3 class="difficulty-title">Hard</h3>
                    <p class="difficulty-description">For expert challengers</p>
                    
                    <div class="difficulty-stats" role="group" aria-label="Hard quiz statistics">
                        <p class="stats-questions">
                            {{ number_format($stats['hard']) }} Questions Available
                        </p>
                        <p class="stats-points">10 points per question</p>
                    </div>
                    
                    <button 
                        type="button"
                        data-difficulty="hard"
                        class="difficulty-button"
                        aria-describedby="hard-description"
                        disabled
                    >
                        Start Hard Quiz
                    </button>
                    <div id="hard-description" class="sr-only">
                        Start a hard difficulty quiz with {{ $stats['hard'] }} available questions
                    </div>
                </article>
            </div>
        </section>

        <!-- Navigation Links Section -->
        <nav class="navigation" aria-label="Quiz navigation">
            <div class="nav-links">
                <a 
                    href="{{ route('leaderboard.index') }}" 
                    class="nav-link primary"
                    aria-label="View quiz leaderboards"
                >
                    <span aria-hidden="true">🏆</span>
                    View Leaderboards
                </a>
                <a 
                    href="{{ route('home') }}" 
                    class="nav-link secondary"
                    aria-label="Return to homepage"
                >
                    <span aria-hidden="true">🏠</span>
                    Back to Home
                </a>
            </div>
        </nav>
    </div>

    <!-- Loading overlay for better UX -->
    <div id="loading-overlay" class="loading-overlay" style="display: none;" aria-hidden="true">
        <div class="loading-spinner">
            <div class="spinner"></div>
            <p>Starting your quiz...</p>
        </div>
    </div>
</main>

<!-- Skip link for accessibility -->
<a href="#main-content" class="skip-link sr-only focus:not-sr-only">
    Skip to main content
</a>

<!-- Screen reader only content -->
<div class="sr-only">
    <p>Quiz Challenge application. Choose a difficulty level and enter your name to start.</p>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/quiz.js') }}" defer></script>

@if(config('app.env') === 'local')
<!-- Development only: Performance monitoring -->
<script>
console.log('Quiz Challenge - Development Mode');
console.log('Available difficulties:', @json(array_keys($stats)));
console.log('Question counts:', @json($stats));
</script>
@endif

<!-- Schema.org structured data for SEO -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebApplication",
    "name": "Quiz Challenge",
    "description": "Interactive quiz application with multiple difficulty levels and leaderboards",
    "url": "{{ url()->current() }}",
    "applicationCategory": "GameApplication",
    "operatingSystem": "Web Browser",
    "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "USD"
    },
    "author": {
        "@type": "Organization",
        "name": "Quiz Challenge Team"
    },
    "gameItem": [
        {
            "@type": "Game",
            "name": "Easy Quiz",
            "description": "Beginner-friendly quiz questions",
            "numberOfQuestions": {{ $stats['easy'] }}
        },
        {
            "@type": "Game", 
            "name": "Medium Quiz",
            "description": "Intermediate level quiz questions",
            "numberOfQuestions": {{ $stats['medium'] }}
        },
        {
            "@type": "Game",
            "name": "Hard Quiz", 
            "description": "Expert level quiz questions",
            "numberOfQuestions": {{ $stats['hard'] }}
        }
    ]
}
</script>
@endpush

@push('head-scripts')
<!-- Preconnect to external domains if needed -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="dns-prefetch" href="//fonts.googleapis.com">

<!-- Critical CSS inlined for fastest render -->
<style>
/* Critical above-the-fold styles */
.quiz-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 25%, #667eea 50%, #764ba2 75%, #f093fb 100%);
}

.sr-only {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
}

.sr-only.focus\:not-sr-only:focus {
    position: static;
    width: auto;
    height: auto;
    padding: 0.5rem 1rem;
    margin: 0;
    overflow: visible;
    clip: auto;
    white-space: normal;
    background: #000;
    color: #fff;
    text-decoration: none;
    border-radius: 0.25rem;
}

.skip-link {
    position: absolute;
    top: 1rem;
    left: 1rem;
    z-index: 1000;
}

.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.loading-spinner {
    text-align: center;
    color: white;
}

.spinner {
    width: 40px;
    height: 40px;
    border: 4px solid rgba(255, 255, 255, 0.3);
    border-top: 4px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto 1rem;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endpush