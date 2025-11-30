// Quiz functionality
let selectedDifficulty = '';
let usernameModal;

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap modal
    usernameModal = new bootstrap.Modal(document.getElementById('usernameModal'));
    
    // Add fade-in animation to cards
    const cards = document.querySelectorAll('.difficulty-card, .action-card');
    cards.forEach((card, index) => {
        card.classList.add('fade-in', `delay-${index % 3 + 1}`);
    });
    
    // Add click handlers to difficulty cards
    const difficultyCards = document.querySelectorAll('.difficulty-card');
    difficultyCards.forEach(card => {
        card.addEventListener('click', function() {
            const difficulty = this.dataset.difficulty;
            if (difficulty) {
                startQuiz(difficulty);
            }
        });
        
        // Add hover effects
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(-10px)';
        });
    });
    
    // Username input validation
    const usernameInput = document.getElementById('usernameInput');
    usernameInput.addEventListener('input', validateUsername);
    usernameInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            proceedToQuiz();
        }
    });
    
    // Focus username input when modal opens
    document.getElementById('usernameModal').addEventListener('shown.bs.modal', function() {
        usernameInput.focus();
    });
});

/**
 * Start quiz with selected difficulty
 */
function startQuiz(difficulty) {
    selectedDifficulty = difficulty;
    
    // Update modal content based on difficulty
    updateModalInfo(difficulty);
    
    // Clear previous username
    document.getElementById('usernameInput').value = '';
    document.getElementById('usernameInput').classList.remove('is-invalid');
    
    // Show username modal
    usernameModal.show();
}

/**
 * Update modal information based on selected difficulty
 */
function updateModalInfo(difficulty) {
    const difficultyElement = document.getElementById('selectedDifficulty');
    const timeLimitElement = document.getElementById('timeLimit');
    const pointsInfoElement = document.getElementById('pointsInfo');
    
    const difficultyInfo = {
        easy: {
            name: 'Easy',
            time: '15 minutes',
            points: '10 per question'
        },
        medium: {
            name: 'Medium',
            time: '20 minutes',
            points: '15 per question'
        },
        hard: {
            name: 'Hard',
            time: '25 minutes',
            points: '20 per question'
        }
    };
    
    const info = difficultyInfo[difficulty];
    difficultyElement.textContent = info.name;
    timeLimitElement.textContent = info.time;
    pointsInfoElement.textContent = info.points;
    
    // Update modal title color based on difficulty
    const modalTitle = document.querySelector('#usernameModal .modal-title');
    modalTitle.className = `modal-title text-${difficulty === 'easy' ? 'success' : difficulty === 'medium' ? 'warning' : 'danger'}`;
}

/**
 * Validate username input
 */
function validateUsername() {
    const usernameInput = document.getElementById('usernameInput');
    const feedback = usernameInput.nextElementSibling;
    const username = usernameInput.value.trim();
    
    // Remove previous validation states
    usernameInput.classList.remove('is-valid', 'is-invalid');
    
    if (username.length === 0) {
        return false;
    }
    
    if (username.length < 2) {
        usernameInput.classList.add('is-invalid');
        feedback.textContent = 'Username must be at least 2 characters long.';
        return false;
    }
    
    if (username.length > 50) {
        usernameInput.classList.add('is-invalid');
        feedback.textContent = 'Username must not exceed 50 characters.';
        return false;
    }
    
    if (!/^[a-zA-Z0-9_\-\s]+$/.test(username)) {
        usernameInput.classList.add('is-invalid');
        feedback.textContent = 'Username can only contain letters, numbers, spaces, hyphens, and underscores.';
        return false;
    }
    
    // Valid username
    usernameInput.classList.add('is-valid');
    feedback.textContent = '';
    return true;
}

/**
 * Proceed to quiz after username validation
 */
function proceedToQuiz() {
    if (!validateUsername()) {
        return;
    }
    
    const username = document.getElementById('usernameInput').value.trim();
    
    // Store username in session storage for the quiz
    sessionStorage.setItem('quizUsername', username);
    sessionStorage.setItem('quizDifficulty', selectedDifficulty);
    
    // Add loading state to button
    const proceedBtn = document.querySelector('#usernameModal .btn-primary');
    const originalContent = proceedBtn.innerHTML;
    proceedBtn.innerHTML = '<span class="spinner"></span> Starting Quiz...';
    proceedBtn.disabled = true;
    
    // Simulate brief loading time for better UX
    setTimeout(() => {
        // Navigate to quiz play page
        window.location.href = `/quiz/play/${selectedDifficulty}`;
    }, 500);
}

/**
 * Show notification
 */
function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    // Add to page
    document.body.appendChild(notification);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}

/**
 * Check if questions are available for difficulty
 */
async function checkQuestionsAvailable(difficulty) {
    try {
        const response = await fetch(`/quiz/api/questions/${difficulty}`);
        const data = await response.json();
        
        if (!data.success || !data.questions || data.questions.length === 0) {
            showNotification(`No questions available for ${difficulty} difficulty. Please try another level.`, 'warning');
            return false;
        }
        
        return true;
    } catch (error) {
        console.error('Error checking questions:', error);
        showNotification('Error loading questions. Please try again.', 'danger');
        return false;
    }
}

/**
 * Enhanced error handling
 */
window.addEventListener('error', function(e) {
    console.error('JavaScript Error:', e.error);
    showNotification('An unexpected error occurred. Please refresh the page.', 'danger');
});

/**
 * Handle network connectivity
 */
window.addEventListener('online', function() {
    showNotification('Internet connection restored.', 'success');
});

window.addEventListener('offline', function() {
    showNotification('Internet connection lost. Please check your connection.', 'warning');
});

/**
 * Smooth scroll to section
 */
function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
    }
}

/**
 * Add keyboard navigation
 */
document.addEventListener('keydown', function(e) {
    // ESC key closes modal
    if (e.key === 'Escape' && usernameModal) {
        usernameModal.hide();
    }
    
    // Arrow keys for difficulty selection (when modal is not open)
    if (!document.body.classList.contains('modal-open')) {
        const difficultyCards = document.querySelectorAll('.difficulty-card');
        const currentActive = document.querySelector('.difficulty-card.keyboard-active');
        let currentIndex = currentActive ? Array.from(difficultyCards).indexOf(currentActive) : -1;
        
        if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
            e.preventDefault();
            currentIndex = Math.max(0, currentIndex - 1);
        } else if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
            e.preventDefault();
            currentIndex = Math.min(difficultyCards.length - 1, currentIndex + 1);
        } else if (e.key === 'Enter' && currentActive) {
            e.preventDefault();
            currentActive.click();
            return;
        }
        
        // Update active card
        difficultyCards.forEach(card => card.classList.remove('keyboard-active'));
        if (currentIndex >= 0 && currentIndex < difficultyCards.length) {
            difficultyCards[currentIndex].classList.add('keyboard-active');
            difficultyCards[currentIndex].focus();
        }
    }
});

/**
 * Add focus styles for keyboard navigation
 */
const style = document.createElement('style');
style.textContent = `
    .difficulty-card.keyboard-active {
        outline: 3px solid #667eea;
        outline-offset: 2px;
    }
    
    .difficulty-card:focus {
        outline: none;
    }
`;
document.head.appendChild(style);