// Home Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize home page functionality
    initScrollAnimations();
    initNavCardHovers();
    initStatCounters();
    initBookShowcase();
});

// Scroll-triggered animations
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    // Observe nav cards
    document.querySelectorAll('.nav-card').forEach(card => {
        observer.observe(card);
    });

    // Observe stat cards
    document.querySelectorAll('.stat-card').forEach(card => {
        observer.observe(card);
    });
}

// Navigation card interactions
function initNavCardHovers() {
    const navCards = document.querySelectorAll('.nav-card');
    
    navCards.forEach(card => {
        // Add hover sound effect (optional)
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-10px) scale(1.02)';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1)';
        });

        // Add click animation
        card.addEventListener('click', (e) => {
            // Don't trigger if clicking on a link
            if (e.target.tagName === 'A' || e.target.closest('a')) {
                return;
            }

            // Find the link in the card and navigate
            const link = card.querySelector('a');
            if (link) {
                // Add click animation
                card.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    window.location.href = link.href;
                }, 150);
            }
        });
    });
}

// Animated stat counters
function initStatCounters() {
    const statNumbers = document.querySelectorAll('.stat-number');
    const animatedStats = new Set();

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !animatedStats.has(entry.target)) {
                animatedStats.add(entry.target);
                animateStatNumber(entry.target);
            }
        });
    }, {
        threshold: 0.5
    });

    statNumbers.forEach(stat => {
        observer.observe(stat);
    });
}

function animateStatNumber(element) {
    const text = element.textContent;
    const hasNumbers = /\d/.test(text);
    
    if (!hasNumbers) {
        // For non-numeric stats, just add a fade-in effect
        element.style.opacity = '0';
        setTimeout(() => {
            element.style.transition = 'opacity 0.6s ease';
            element.style.opacity = '1';
        }, 100);
        return;
    }

    const matches = text.match(/(\d+)/);
    if (matches) {
        const number = parseInt(matches[1]);
        const prefix = text.substring(0, matches.index);
        const suffix = text.substring(matches.index + matches[1].length);
        
        let current = 0;
        const increment = Math.ceil(number / 30);
        const timer = setInterval(() => {
            current += increment;
            if (current >= number) {
                current = number;
                clearInterval(timer);
            }
            element.textContent = prefix + current + suffix;
        }, 50);
    }
}

// Book showcase interactions
function initBookShowcase() {
    const bookCover = document.querySelector('.book-cover');
    
    if (bookCover) {
        // Add parallax effect on mouse move
        document.addEventListener('mousemove', (e) => {
            const rect = bookCover.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            
            const mouseX = e.clientX;
            const mouseY = e.clientY;
            
            const rotateX = (mouseY - centerY) / 20;
            const rotateY = (centerX - mouseX) / 20;
            
            bookCover.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });

        // Reset transform when mouse leaves
        bookCover.addEventListener('mouseleave', () => {
            bookCover.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg)';
        });

        // Add click event for book preview (optional feature)
        bookCover.addEventListener('click', () => {
            showBookPreview();
        });
    }
}

// Book preview modal (optional feature)
function showBookPreview() {
    // Create modal for book preview
    const modal = document.createElement('div');
    modal.className = 'modal fade';
    modal.innerHTML = `
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Life of Pi - Book Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="https://i.pinimg.com/736x/04/05/c4/0405c45d7c0f56c39dc4baaaca482a71.jpg" 
                                 alt="Life of Pi" class="img-fluid rounded">
                        </div>
                        <div class="col-md-8">
                            <h6>About the Book</h6>
                            <p><strong>Author:</strong> Yann Martel</p>
                            <p><strong>Published:</strong> 2001</p>
                            <p><strong>Genre:</strong> Adventure Fiction, Philosophical Fiction</p>
                            <p><strong>Pages:</strong> 354</p>
                            <hr>
                            <p><em>"Life of Pi is a masterful and utterly original novel that is at once the story of a young castaway and a meditation on religion, faith, art, and life."</em></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="${window.location.origin}/summary" class="btn btn-primary">Read Summary</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    const bsModal = new bootstrap.Modal(modal);
    bsModal.show();
    
    // Remove modal from DOM when closed
    modal.addEventListener('hidden.bs.modal', () => {
        modal.remove();
    });
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add CSS for scroll animations
const style = document.createElement('style');
style.textContent = `
    .nav-card, .stat-card {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
    }
    
    .nav-card.animate-in, .stat-card.animate-in {
        opacity: 1;
        transform: translateY(0);
    }
    
    .nav-card:nth-child(1).animate-in { transition-delay: 0.1s; }
    .nav-card:nth-child(2).animate-in { transition-delay: 0.2s; }
    .nav-card:nth-child(3).animate-in { transition-delay: 0.3s; }
    .nav-card:nth-child(4).animate-in { transition-delay: 0.4s; }
    .nav-card:nth-child(5).animate-in { transition-delay: 0.5s; }
    .nav-card:nth-child(6).animate-in { transition-delay: 0.6s; }
`;
document.head.appendChild(style);
