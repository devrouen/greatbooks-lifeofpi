/**
 * Quiz Challenge JavaScript Module
 * Handles user interactions, form submissions, and local storage
 */

class QuizController {
    constructor() {
        this.usernameInput = null;
        this.difficultyButtons = [];
        this.isSubmitting = false;
        
        this.init();
    }

    /**
     * Initialize the quiz controller
     */
    init() {
        this.bindElements();
        this.bindEvents();
        this.loadSavedData();
    }

    /**
     * Bind DOM elements
     */
    bindElements() {
        this.usernameInput = document.getElementById('username');
        this.difficultyButtons = document.querySelectorAll('[data-difficulty]');
    }

    /**
     * Bind event listeners
     */
    bindEvents() {
        if (this.usernameInput) {
            // Auto-save username as user types
            this.usernameInput.addEventListener('input', this.handleUsernameInput.bind(this));
            
            // Clear error state on focus
            this.usernameInput.addEventListener('focus', this.clearInputError.bind(this));
            
            // Handle Enter key
            this.usernameInput.addEventListener('keypress', this.handleUsernameKeypress.bind(this));
        }

        // Bind difficulty button events
        this.difficultyButtons.forEach(button => {
            button.addEventListener('click', this.handleDifficultyClick.bind(this));
        });

        // Handle page visibility change
        document.addEventListener('visibilitychange', this.handleVisibilityChange.bind(this));
    }

    /**
     * Handle username input changes
     */
    handleUsernameInput(event) {
        const value = event.target.value.trim();
        
        // Save to localStorage
        this.saveUsername(value);
        
        // Clear error state if present
        this.clearInputError();
        
        // Update button states
        this.updateButtonStates();
    }

    /**
     * Handle username keypress events
     */
    handleUsernameKeypress(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            // Find first enabled difficulty button and click it
            const enabledButton = document.querySelector('[data-difficulty]:not([disabled])');
            if (enabledButton) {
                enabledButton.click();
            }
        }
    }

    /**
     * Handle difficulty button clicks
     */
    handleDifficultyClick(event) {
        event.preventDefault();
        
        if (this.isSubmitting) return;
        
        const button = event.currentTarget;
        const difficulty = button.getAttribute('data-difficulty');
        
        this.startQuiz(difficulty, button);
    }

    /**
     * Start quiz with given difficulty
     */
    startQuiz(difficulty, buttonElement = null) {
        const username = this.getUsername();
        
        // Validate username
        const validation = this.validateUsername(username);
        if (!validation.valid) {
            this.showUsernameError(validation.message);
            return;
        }

        // Show loading state
        this.setLoadingState(buttonElement, true);

        try {
            // Get timezone information
            const timezoneData = this.getTimezoneData();
            
            // Create and submit form
            this.submitQuizForm(difficulty, username, timezoneData);
            
        } catch (error) {
            console.error('Error starting quiz:', error);
            this.showError('An error occurred while starting the quiz. Please try again.');
            this.setLoadingState(buttonElement, false);
        }
    }

    /**
     * Get cleaned username
     */
    getUsername() {
        return this.usernameInput ? this.usernameInput.value.trim() : '';
    }

    /**
     * Validate username input
     */
    validateUsername(username) {
        if (!username) {
            return {
                valid: false,
                message: 'Please enter your name before starting the quiz!'
            };
        }

        if (username.length > 50) {
            return {
                valid: false,
                message: 'Name must be 50 characters or less!'
            };
        }

        if (username.length < 2) {
            return {
                valid: false,
                message: 'Name must be at least 2 characters long!'
            };
        }

        // Check for valid characters (allow letters, numbers, spaces, and common punctuation)
        const validPattern = /^[a-zA-Z0-9\s\-_.,']+$/;
        if (!validPattern.test(username)) {
            return {
                valid: false,
                message: 'Name contains invalid characters!'
            };
        }

        return { valid: true };
    }

    /**
     * Get timezone data
     */
    getTimezoneData() {
        const now = new Date();
        return {
            offset: now.getTimezoneOffset(),
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone || 'UTC'
        };
    }

    /**
     * Create and submit quiz form
     */
    submitQuizForm(difficulty, username, timezoneData) {
        this.isSubmitting = true;

        const form = document.createElement('form');
        form.method = 'GET';
        form.action = `/quiz/start/${encodeURIComponent(difficulty)}`;
        form.style.display = 'none';

        // Add form fields
        const fields = {
            username: username,
            timezone_offset: timezoneData.offset,
            timezone: timezoneData.timezone,
            timestamp: Date.now()
        };

        Object.entries(fields).forEach(([name, value]) => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = value;
            form.appendChild(input);
        });

        // Submit form
        document.body.appendChild(form);
        form.submit();
    }

    /**
     * Show username validation error
     */
    showUsernameError(message) {
        if (!this.usernameInput) return;

        // Add error class to input
        this.usernameInput.classList.add('error');
        
        // Focus input
        this.usernameInput.focus();
        this.usernameInput.select();

        // Show error message
        this.showError(message);

        // Remove error class after animation
        setTimeout(() => {
            this.clearInputError();
        }, 500);
    }

    /**
     * Clear input error state
     */
    clearInputError() {
        if (this.usernameInput) {
            this.usernameInput.classList.remove('error');
        }
        this.hideError();
    }

    /**
     * Show error message
     */
    showError(message) {
        // Remove existing error messages
        this.hideError();

        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        errorDiv.setAttribute('role', 'alert');

        // Insert after username section
        const usernameSection = document.querySelector('.username-section');
        if (usernameSection) {
            usernameSection.appendChild(errorDiv);
        }

        // Auto-hide after 5 seconds
        setTimeout(() => {
            this.hideError();
        }, 5000);
    }

    /**
     * Hide error messages
     */
    hideError() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(msg => {
            msg.style.animation = 'slideUp 0.3s ease-out reverse';
            setTimeout(() => msg.remove(), 300);
        });
    }

    /**
     * Set loading state for buttons
     */
    setLoadingState(buttonElement, isLoading) {
        if (isLoading) {
            // Disable all buttons
            this.difficultyButtons.forEach(btn => {
                btn.disabled = true;
                btn.classList.add('loading');
            });

            if (buttonElement) {
                buttonElement.textContent = 'Starting Quiz...';
            }
        } else {
            // Re-enable buttons
            this.difficultyButtons.forEach(btn => {
                btn.disabled = false;
                btn.classList.remove('loading');
            });
            
            this.isSubmitting = false;
            this.updateButtonStates();
        }
    }

    /**
     * Update button states based on username
     */
    updateButtonStates() {
        const hasUsername = this.getUsername().length > 0;
        
        this.difficultyButtons.forEach(button => {
            if (hasUsername) {
                button.removeAttribute('disabled');
                button.style.opacity = '1';
            } else {
                button.setAttribute('disabled', 'true');
                button.style.opacity = '0.6';
            }
        });
    }

    /**
     * Save username to localStorage
     */
    saveUsername(username) {
        try {
            if (username) {
                localStorage.setItem('quiz_username', username);
            } else {
                localStorage.removeItem('quiz_username');
            }
        } catch (error) {
            console.warn('Failed to save username to localStorage:', error);
        }
    }

    /**
     * Load saved data from localStorage
     */
    loadSavedData() {
        try {
            const savedUsername = localStorage.getItem('quiz_username');
            
            if (savedUsername && this.usernameInput && !this.usernameInput.value) {
                this.usernameInput.value = savedUsername;
                this.updateButtonStates();
            }
        } catch (error) {
            console.warn('Failed to load saved data from localStorage:', error);
        }
    }

    /**
     * Handle page visibility changes
     */
    handleVisibilityChange() {
        if (document.visibilityState === 'visible') {
            // Reset loading states if user returns to page
            if (this.isSubmitting) {
                this.setLoadingState(null, false);
            }
        }
    }

    /**
     * Add entrance animations
     */
    addEntranceAnimations() {
        const cards = document.querySelectorAll('.difficulty-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${0.1 + (index * 0.1)}s`;
        });
    }

    /**
     * Handle keyboard navigation
     */
    handleKeyboardNavigation(event) {
        const focusableElements = document.querySelectorAll(
            'input, button, [tabindex]:not([tabindex="-1"])'
        );
        
        const currentIndex = Array.from(focusableElements).indexOf(document.activeElement);
        
        if (event.key === 'ArrowDown' || (event.key === 'Tab' && !event.shiftKey)) {
            event.preventDefault();
            const nextIndex = (currentIndex + 1) % focusableElements.length;
            focusableElements[nextIndex].focus();
        } else if (event.key === 'ArrowUp' || (event.key === 'Tab' && event.shiftKey)) {
            event.preventDefault();
            const prevIndex = currentIndex === 0 ? focusableElements.length - 1 : currentIndex - 1;
            focusableElements[prevIndex].focus();
        }
    }
}

/**
 * Utility functions
 */
const QuizUtils = {
    /**
     * Debounce function calls
     */
    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },

    /**
     * Check if device supports touch
     */
    isTouchDevice() {
        return 'ontouchstart' in window || navigator.maxTouchPoints > 0;
    },

    /**
     * Format number with commas
     */
    formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    },

    /**
     * Sanitize HTML content
     */
    sanitizeHTML(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    },

    /**
     * Get browser info
     */
    getBrowserInfo() {
        const ua = navigator.userAgent;
        let browserName = 'Unknown';
        
        if (ua.includes('Firefox')) browserName = 'Firefox';
        else if (ua.includes('Chrome')) browserName = 'Chrome';
        else if (ua.includes('Safari')) browserName = 'Safari';
        else if (ua.includes('Edge')) browserName = 'Edge';
        
        return {
            name: browserName,
            userAgent: ua,
            language: navigator.language,
            platform: navigator.platform
        };
    }
};

/**
 * Performance monitoring
 */
class PerformanceMonitor {
    constructor() {
        this.startTime = performance.now();
        this.metrics = {};
    }

    mark(name) {
        this.metrics[name] = performance.now() - this.startTime;
    }

    getMetrics() {
        return { ...this.metrics };
    }

    logMetrics() {
        console.table(this.metrics);
    }
}

/**
 * Initialize when DOM is ready
 */
document.addEventListener('DOMContentLoaded', function() {
    const perfMonitor = new PerformanceMonitor();
    perfMonitor.mark('DOMContentLoaded');
    
    // Initialize quiz controller
    const quizController = new QuizController();
    perfMonitor.mark('QuizControllerInitialized');
    
    // Add touch device class
    if (QuizUtils.isTouchDevice()) {
        document.body.classList.add('touch-device');
    }
    
    // Add keyboard navigation
    document.addEventListener('keydown', quizController.handleKeyboardNavigation.bind(quizController));
    
    // Add entrance animations
    quizController.addEntranceAnimations();
    
    // Log performance metrics in development
    if (window.location.hostname === 'localhost' || window.location.hostname.includes('127.0.0.1')) {
        setTimeout(() => {
            perfMonitor.mark('PageFullyLoaded');
            perfMonitor.logMetrics();
        }, 1000);
    }
    
    // Add global error handling
    window.addEventListener('error', function(event) {
        console.error('Global error:', event.error);
        // You could send this to your error reporting service
    });
    
    // Add unhandled promise rejection handling
    window.addEventListener('unhandledrejection', function(event) {
        console.error('Unhandled promise rejection:', event.reason);
        event.preventDefault();
    });
});

/**
 * Legacy support for older browsers
 */
if (!window.QuizController) {
    window.QuizController = QuizController;
    window.QuizUtils = QuizUtils;
}

/**
 * Export for module systems
 */
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { QuizController, QuizUtils, PerformanceMonitor };
}