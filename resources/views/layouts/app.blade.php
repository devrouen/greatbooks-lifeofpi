<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Life of Pi - Literary Analysis')</title>
  <meta name="description" content="@yield('description', 'Comprehensive analysis of Life of Pi by Yann Martel - Timeline, conventions, biography, summary, and analysis.')">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    /* Enhanced Navbar */
    .navbar {
      height: 100px;
      background: black;
      backdrop-filter: blur(6px);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;;
    }

    .navbar.scrolled {
      background: black;
      backdrop-filter: blur(10px);
    }

    .navbar-brand {
      padding-right: 20%;
      font-family: 'Inter', sans-serif;
      font-weight: 600;
      font-size: 1.25rem;
      transition: all 0.2s ease;
    }

    .navbar-brand:hover {
      transform: scale(1.02);
    }

    .navbar-nav .nav-link {
      font-weight: 500;
      margin: 0 0.15rem;
      padding: 0.5rem 0.8rem !important;
      border-radius: 6px;
      transition: all 0.2s ease;
      position: relative;
      overflow: hidden;
    }

    .navbar-nav .nav-link::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0.1);
      transition: left 0.2s ease;
      z-index: 0;
    }

    .navbar-nav .nav-link:hover::before {
      left: 0;
    }

    .navbar-nav .nav-link:hover {
      color: #fff !important;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .navbar-nav .nav-link i,
    .navbar-nav .nav-link span {
      position: relative;
      z-index: 1;
    }

    /* Enhanced Quiz button */
    .btn-quiz {
      width: 120%;
      background: linear-gradient(135deg, #ffc107, #ffca2c) !important;
      color: black !important;
      font-weight: 600;
      border-radius: 20px;
      transition: all 0.2s ease;
      padding: 0.5rem 1rem !important;
      border: none !important;
      box-shadow: 0 2px 8px rgba(255, 193, 7, 0.3);
    }

    .btn-quiz:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(255, 193, 7, 0.4);
    }

    /* Mobile improvements */
    @media (max-width: 991px) {
      .navbar-nav .nav-link {
        margin: 0.15rem 0;
        padding: 0.4rem 0.8rem !important;
      }
      
      .btn-quiz {
        margin-top: 0.3rem;
        width: auto;
      }
    }

    /* Navbar toggler animation */
    .navbar-toggler {
      border: none;
      padding: 0.5rem;
    }

    .navbar-toggler:focus {
      box-shadow: none;
    }

    .navbar-toggler-icon {
      transition: all 0.3s ease;
    }

    .navbar-toggler:hover .navbar-toggler-icon {
      transform: scale(1.1);
    }

    footer {
      background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
    }
  </style>

  @stack('styles')
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        <i class="fas fa-book-open me-2 text-warning"></i>Life of Pi
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-5">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('timeline') ? 'active' : '' }}" href="{{ route('timeline') }}">
              Timeline
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('conventions') ? 'active' : '' }}" href="{{ route('conventions') }}">
              Conventions
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('author') ? 'active' : '' }}" href="{{ route('author') }}">
              Author
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('summary') ? 'active' : '' }}" href="{{ route('summary') }}">
              Summary
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('analysis') ? 'active' : '' }}" href="{{ route('analysis') }}">
              Analysis
            </a>
          </li>
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link btn btn-quiz" href="{{ route('quiz.index') }}">
              <i class="fas fa-gamepad me-1"></i>Quiz Arcade
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="text-light py-4 mt-5">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
      <div>
        <h5><i class="fas fa-book-open me-2 text-warning"></i>Life of Pi Analysis</h5>
        <p class="mb-0">A comprehensive study of Yann Martel's masterpiece</p>
      </div>
      <div class="text-md-end mt-3 mt-md-0">
        <p class="mb-0"><i class="fas fa-graduation-cap me-2"></i>Final Project - Literary Analysis</p>
        <small class="text-muted">{{ date('Y') }} Academic Project</small>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Add scroll effect to navbar
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  </script>
  
  @stack('scripts')
</body>
</html>