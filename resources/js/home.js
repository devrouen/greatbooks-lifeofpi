// Home page JavaScript functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initNavigation();
    initAnimations();
    initScrollEffects();
    initInteractiveElements();
});

// Navigation functionality
function initNavigation() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    const navbar = document.querySelector('.navbar');

    // Mobile menu toggle
    hamburger?.addEventListener('click', function() {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    // Close mobile menu when clicking on a link
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            hamburger?.classList.remove('active');
            navMenu.classList.remove('active');
        });
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Smooth scroll to sections
    window.scrollToSection = function(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            const offsetTop = section.offsetTop - 70; // Account for fixed navbar
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
        }
    };
}

// Animation on scroll functionality
function initAnimations() {
    const animatedElements = document.querySelectorAll('[data-aos]');
    
    function checkAnimation() {
        animatedElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('animate-in');
            }
        });
    }

    // Check animations on scroll
    window.addEventListener('scroll', checkAnimation);
    
    // Check animations on page load
    checkAnimation();
}

// Scroll effects for various elements
function initScrollEffects() {
    let ticking = false;

    function updateScrollEffects() {
        const scrollTop = window.pageYOffset;
        
        // Parallax effect for hero section
        const hero = document.querySelector('.hero');
        if (hero) {
            const heroHeight = hero.offsetHeight;
            const heroOffset = scrollTop * 0.5;
            if (scrollTop < heroHeight) {
                hero.style.transform = `translateY(${heroOffset}px)`;
            }
        }

        // Floating elements animation based on scroll
        const waves = document.querySelectorAll('.wave');
        waves.forEach((wave, index) => {
            const speed = (index + 1) * 0.1;
            wave.style.transform = `translateX(-50%) rotateZ(${scrollTop * speed}deg)`;
        });

        ticking = false;
    }

    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateScrollEffects);
            ticking = true;
        }
    }

    window.addEventListener('scroll', requestTick);
}

// Interactive elements functionality
function initInteractiveElements() {
    // Card hover effects
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Button hover effects with ripple
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            createRipple(e, this);
        });
    });

    // Stats counter animation
    animateStats();

    // Add loading states for quiz links
    const quizLinks = document.querySelectorAll('a[href*="quiz"]');
    quizLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (!this.classList.contains('loading')) {
                this.classList.add('loading');
                const originalText = this.textContent;
                this.textContent = 'Loading...';
                
                // Reset after a delay (in case navigation doesn't happen immediately)
                setTimeout(() => {
                    this.classList.remove('loading');
                    this.textContent = originalText;
                }, 3000);
            }
        });
    });
}

// Create ripple effect for buttons
function createRipple(event, element) {
    const circle = document.createElement('span');
    const diameter = Math.max(element.clientWidth, element.clientHeight);
    const radius = diameter / 2;

    const rect = element.getBoundingClientRect();
    circle.style.width = circle.style.height = `${diameter}px`;
    circle.style.left = `${event.clientX - rect.left - radius}px`;
    circle.style.top = `${event.clientY - rect.top - radius}px`;
    circle.classList.add('ripple');

    // Add ripple styles
    circle.style.position = 'absolute';
    circle.style.borderRadius = '50%';
    circle.style.background = 'rgba(255, 255, 255, 0.3)';
    circle.style.transform = 'scale(0)';
    circle.style.animation = 'ripple 0.6s linear';
    circle.style.pointerEvents = 'none';

    // Ensure button has relative positioning
    if (getComputedStyle(element).position === 'static') {
        element.style.position = 'relative';
    }

    // Add overflow hidden to button
    element.style.overflow = 'hidden';

    const ripple = element.getElementsByClassName('ripple')[0];
    if (ripple) {
        ripple.remove();
    }

    element.appendChild(circle);

    // Remove ripple after animation
    setTimeout(() => {
        circle.remove();
    }, 600);
}

// Animate statistics counter
function animateStats() {
    const stats = document.querySelectorAll('.stat-number');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    });

    stats.forEach(stat => observer.observe(stat));
}

function animateCounter(element) {
    const target = element.textContent.trim();
    const isInfinity = target === '∞';
    
    if (isInfinity) {
        // Special animation for infinity symbol
        let opacity = 0;
        const animate = () => {
            opacity += 0.02;
            element.style.opacity = Math.sin(opacity) * 0.5 + 0.5;
            if (opacity < Math.PI * 4) {
                requestAnimationFrame(animate);
            } else {
                element.style.opacity = 1;
            }
        };
        animate();
        return;
    }

    const numericValue = parseInt(target.replace(/,/g, ''));
    if (isNaN(numericValue)) return;

    let currentValue = 0;
    const increment = numericValue / 100;
    const duration = 2000; // 2 seconds
    const stepTime = duration / 100;

    const timer = setInterval(() => {
        currentValue += increment;
        if (currentValue >= numericValue) {
            currentValue = numericValue;
            clearInterval(timer);
        }
        
        // Format the number (add commas for thousands)
        const formattedValue = Math.floor(currentValue).toLocaleString();
        element.textContent = formattedValue;
    }, stepTime);
}

// Keyboard navigation support
document.addEventListener('keydown', function(e) {
    // Handle Escape key to close mobile menu
    if (e.key === 'Escape') {
        const hamburger = document.querySelector('.hamburger');
        const navMenu = document.querySelector('.nav-menu');
        hamburger?.classList.remove('active');
        navMenu?.classList.remove('active');
    }

    // Handle Enter key for accessibility
    if (e.key === 'Enter') {
        const activeElement = document.activeElement;
        if (activeElement && activeElement.classList.contains('card')) {
            const link = activeElement.querySelector('.card-link');
            if (link) {
                link.click();
            }
        }
    }
});

// Add accessibility features
function initAccessibility() {
    // Make cards keyboard accessible
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.setAttribute('tabindex', '0');
        card.setAttribute('role', 'button');
        card.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const link = this.querySelector('.card-link');
                if (link) {
                    link.click();
                }
            }
        });
    });

    // Add skip to main content link
    const skipLink = document.createElement('a');
    skipLink.href = '#explore';
    skipLink.textContent = 'Skip to main content';
    skipLink.className = 'skip-link';
    skipLink.style.cssText = `
        position: absolute;
        top: -40px;
        left: 6px;
        background: var(--primary-color);
        color: white;
        padding: 8px;
        text-decoration: none;
        border-radius: 4px;
        z-index: 1000;
        transition: top 0.3s;
    `;
    
    skipLink.addEventListener('focus', function() {
        this.style.top = '6px';
    });
    
    skipLink.addEventListener('blur', function() {
        this.style.top = '-40px';
    });

    document.body.insertBefore(skipLink, document.body.firstChild);
}

// Initialize accessibility features
document.addEventListener('DOMContentLoaded', initAccessibility);

// Performance optimization: Debounce scroll events
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Optimize scroll performance
const optimizedScrollHandler = debounce(() => {
    // Any additional scroll optimizations can go here
}, 16); // ~60fps

window.addEventListener('scroll', optimizedScrollHandler);

// Add CSS for ripple animation and loading states
const additionalStyles = document.createElement('style');
additionalStyles.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    .loading {
        opacity: 0.7;
        pointer-events: none;
        position: relative;
    }

    .loading::after {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        margin: auto;
        border: 2px solid transparent;
        border-top-color: currentColor;
        border-radius: 50%;
        animation: loading-spin 1s linear infinite;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    @keyframes loading-spin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }

    .skip-link:focus {
        top: 6px !important;
    }

    /* Reduce motion for users who prefer it */
    @media (prefers-reduced-motion: reduce) {
        * {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
        
        .hero {
            transform: none !important;
        }
        
        .wave {
            animation: none !important;
        }
    }

    /* High contrast mode support */
    @media (prefers-contrast: high) {
        .nav-link::after,
        .section-title::after {
            background: currentColor;
        }
        
        .btn-primary {
            border-color: currentColor;
        }
    }

    /* Focus styles for better accessibility */
    .card:focus,
    .btn:focus,
    .nav-link:focus {
        outline: 2px solid var(--primary-color);
        outline-offset: 2px;
    }
`;

document.head.appendChild(additionalStyles);

// Console welcome message
console.log(`
🌊 Welcome to Life of Pi Educational Resource! 🌊
Built with modern web technologies for an immersive learning experience.

Navigation: Use arrow keys, tab, and enter for keyboard navigation
Performance: Optimized animations and smooth scrolling
Accessibility: Screen reader friendly with proper ARIA labels

Explore the story of survival, faith, and the power of storytelling!
`);

// Error handling for missing elements
window.addEventListener('error', function(e) {
    console.warn('Non-critical error handled:', e.message);
});

// Graceful degradation for older browsers
if (!window.IntersectionObserver) {
    // Fallback for browsers without Intersection Observer
    document.querySelectorAll('[data-aos]').forEach(el => {
        el.classList.add('animate-in');
    });
    
    // Simple counter animation fallback
    setTimeout(() => {
        document.querySelectorAll('.stat-number').forEach(animateCounter);
    }, 1000);
}