// Quiz Play JavaScript
class QuizPlayer {
    constructor() {
        this.questions = [];
        this.currentQuestionIndex = 0;
        this.answers = [];
        this.startTime = null;
        this.questionStartTime = null;
        this.timer = null;
        this.totalTimeLimit = 0;
        this.username = '';
        this.difficulty = '';
        
        this.init();
    }
    
    init() {
        // Get data from session storage and URL
        this.username = sessionStorage.getItem('quizUsername') || 'Anonymous';
        this.difficulty = window.quizDifficulty || 'medium';
        
        // Set time limits based on difficulty
        const timeLimits = {
            easy: 15 * 60,    // 15 minutes
            medium: 20 * 60,  // 20 minutes
            hard: 25 * 60     // 25 minutes
        };
        this.totalTimeLimit = timeLimits[this.difficulty];
        
        // Update UI
        document.getElementById('playerName').textContent = this.username;
        document.getElementById('difficultyDisplay').textContent = this.difficulty.charAt(0).toUpperCase() + this.difficulty.slice(1);
        
        // Load questions
        this.loadQuestions();
        
        // Setup event listeners
        this.setupEventListeners();
        
        // Prevent navigation away
        this.setupNavigationProtection();
    }
    
    async loadQuestions() {
        try {
            const response = await fetch(`/quiz/api/questions/${this.difficulty}`);
            const data = await response.json();
            
            if (!data.success) {
                throw new Error(data.message || 'Failed to load questions');
            }
            
            this.questions = data.questions;
            
            if (this.questions.length === 0) {
                throw new Error('No questions available for this difficulty level');
            }
            
            // Initialize answers array
            this.answers = new Array(this.questions.length).fill(null);
            
            // Setup progress indicator
            this.setupProgressIndicator();
            
            // Hide loading and show first question
            document.getElementById('loadingState').style.display = 'none';
            document.getElementById('questionContainer').style.display = 'block';
            
            // Start the quiz
            this.startQuiz();
            
        } catch (error) {
            console.error('Error loading questions:', error);
            this.showError('Failed to load quiz questions. Please try again.');
        }
    }
    
    startQuiz() {
        this.startTime = Date.now();
        this.displayQuestion();
        this.startTimer();
    }
    
    displayQuestion() {
        const question = this.questions[this.currentQuestionIndex];
        this.questionStartTime = Date.now();
        
        // Update question counter
        document.querySelector('.current-question').textContent = this.currentQuestionIndex + 1;
        document.querySelector('.total-questions').textContent = this.questions.length;
        
        // Update question content
        document.getElementById('questionText').textContent = question.text;
        document.getElementById('questionType').textContent = this.formatQuestionType(question.type);
        document.getElementById('questionPoints').textContent = question.points;
        
        // Clear previous answer selection
        this.clearAnswerSelection();
        
        // Display options based on question type
        if (question.type === 'multiple_choice' || question.type === 'true_false') {
            this.displayMultipleChoiceOptions(question);
            document.getElementById('multipleChoiceOptions').style.display = 'block';
            document.getElementById('textInputContainer').style.display = 'none';
        } else {
            this.displayTextInput(question);
            document.getElementById('multipleChoiceOptions').style.display = 'none';
            document.getElementById('textInputContainer').style.display = 'block';
        }
        
        // Update progress indicator
        this.updateProgressIndicator();
        
        // Reset buttons
        this.resetButtons();
        
        // Animate question entry
        document.getElementById('questionContainer').style.animation = 'none';
        setTimeout(() => {
            document.getElementById('questionContainer').style.animation = 'slideInUp 0.5s ease';
        }, 10);
    }
    
    displayMultipleChoiceOptions(question) {
        const container = document.getElementById('multipleChoiceOptions');
        container.innerHTML = '';
        
        question.options.forEach((option, index) => {
            const optionElement = document.createElement('div');
            optionElement.className = 'option-item';
            optionElement.dataset.optionId = option.id;
            optionElement.innerHTML = `<p class="option-text">${option.text}</p>`;
            
            optionElement.addEventListener('click', () => this.selectOption(optionElement, option.id));
            
            container.appendChild(optionElement);
        });
    }
    
    displayTextInput(question) {
        const input = document.getElementById('textAnswer');
        input.value = '';
        input.placeholder = this.getInputPlaceholder(question.type);
        
        input.addEventListener('input', () => {
            const hasAnswer = input.value.trim().length > 0;
            document.getElementById('submitAnswer').disabled = !hasAnswer;
        });
        
        input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                this.submitAnswer();
            }
        });
        
        // Focus on input
        setTimeout(() => input.focus(), 100);
    }
    
    selectOption(optionElement, optionId) {
        // Remove previous selections
        document.querySelectorAll('.option-item').forEach(el => {
            el.classList.remove('selected');
        });
        
        // Select current option
        optionElement.classList.add('selected');
        
        // Enable submit button
        document.getElementById('submitAnswer').disabled = false;
        
        // Store selection
        this.currentSelection = optionId;
    }
    
    submitAnswer() {
        const question = this.questions[this.currentQuestionIndex];
        const timeSpent = Date.now() - this.questionStartTime;
        
        let answer = {
            question_id: question.id,
            time_spent: Math.floor(timeSpent / 1000)
        };
        
        if (question.type === 'multiple_choice' || question.type === 'true_false') {
            if (!this.currentSelection) return;
            answer.selected_option_id = this.currentSelection;
        } else {
            const textAnswer = document.getElementById('textAnswer').value.trim();
            if (!textAnswer) return;
            answer.answer_text = textAnswer;
        }
        
        // Store answer
        this.answers[this.currentQuestionIndex] = answer;
        
        // Show next question or finish quiz
        this.showAnswerFeedback();
    }
    
    showAnswerFeedback() {
        // Disable submit button and show next/finish button
        document.getElementById('submitAnswer').style.display = 'none';
        
        if (this.currentQuestionIndex < this.questions.length - 1) {
            document.getElementById('nextQuestion').style.display = 'inline-block';
        } else {
            document.getElementById('finishQuiz').style.display = 'inline-block';
        }
        
        // For multiple choice, show correct/incorrect feedback
        if (this.questions[this.currentQuestionIndex].type === 'multiple_choice' || 
            this.questions[this.currentQuestionIndex].type === 'true_false') {
            this.showOptionFeedback();
        }
    }
    
    showOptionFeedback() {
        // This would require correct answer information from the server
        // For now, we'll just show that the answer was submitted
        document.querySelectorAll('.option-item').forEach(el => {
            el.style.pointerEvents = 'none';
            if (el.classList.contains('selected')) {
                el.style.transform = 'translateX(10px)';
            }
        });
    }
    
    nextQuestion() {
        this.currentQuestionIndex++;
        this.displayQuestion();
    }
    
    async finishQuiz() {
        // Stop timer
        if (this.timer) {
            clearInterval(this.timer);
        }
        
        const timeTaken = Math.floor((Date.now() - this.startTime) / 1000);
        
        try {
            // Show loading on finish button
            const finishBtn = document.getElementById('finishQuiz');
            const originalText = finishBtn.innerHTML;
            finishBtn.innerHTML = '<span class="spinner"></span> Submitting...';
            finishBtn.disabled = true;
            
            const response = await fetch('/quiz/api/submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({
                    username: this.username,
                    difficulty: this.difficulty,
                    answers: this.answers.filter(answer => answer !== null),
                    time_taken: timeTaken,
                    timezone_offset: new Date().getTimezoneOffset()
                })
            });
            
            const data = await response.json();
            
            if (!data.success) {
                throw new Error(data.message || 'Failed to submit quiz');
            }
            
            // Show results
            this.showResults(data.results);
            
        } catch (error) {
            console.error('Error submitting quiz:', error);
            this.showError('Failed to submit quiz. Please try again.');
            
            // Reset button
            document.getElementById('finishQuiz').innerHTML = originalText;
            document.getElementById('finishQuiz').disabled = false;
        }
    }
    
    showResults(results) {
        // Hide question container
        document.getElementById('questionContainer').style.display = 'none';
        
        // Show results container
        document.getElementById('resultsContainer').style.display = 'block';
        
        // Update results data
        document.getElementById('correctAnswers').textContent = `${results.correct_answers}/${results.total_questions}`;
        document.getElementById('totalScore').textContent = results.total_score;
        document.getElementById('percentage').textContent = `${results.percentage}%`;
        document.getElementById('timeTaken').textContent = this.formatTime(results.time_taken);
        
        // Update performance bar and message
        this.updatePerformanceDisplay(results.percentage);
        
        // Hide progress indicator
        document.querySelector('.progress-indicator').style.display = 'none';
        
        // Remove navigation protection
        this.removeNavigationProtection();
    }
    
    updatePerformanceDisplay(percentage) {
        const performanceBar = document.getElementById('performanceBar');
        const resultsMessage = document.getElementById('resultsMessage');
        const resultsIcon = document.getElementById('resultsIcon');
        
        let performance, message, iconClass;
        
        if (percentage >= 90) {
            performance = 'excellent';
            message = '🎉 Outstanding performance! You have mastered the content of Life of Pi. Your deep understanding of the novel is impressive!';
            iconClass = 'gold';
        } else if (percentage >= 70) {
            performance = 'good';
            message = '👍 Great job! You have a solid understanding of Life of Pi. Keep up the excellent work!';
            iconClass = 'silver';
        } else if (percentage >= 50) {
            performance = 'average';
            message = '📖 Good effort! You have a basic understanding of the novel. Consider reviewing the material to improve your knowledge.';
            iconClass = 'bronze';
        } else {
            performance = 'poor';
            message = '📚 Keep studying! Review the novel and our analysis materials to better understand Life of Pi. Practice makes perfect!';
            iconClass = 'bronze';
        }
        
        performanceBar.className = `performance-fill ${performance}`;
        performanceBar.style.width = `${percentage}%`;
        
        resultsMessage.className = `results-message ${performance}`;
        resultsMessage.innerHTML = message;
        
        resultsIcon.className = `fas fa-trophy ${iconClass}`;
    }
    
    startTimer() {
        let timeRemaining = this.totalTimeLimit;
        
        const updateTimer = () => {
            if (timeRemaining <= 0) {
                this.timeUp();
                return;
            }
            
            document.getElementById('timeDisplay').textContent = this.formatTime(timeRemaining);
            
            // Update progress bar
            const progressPercent = ((this.totalTimeLimit - timeRemaining) / this.totalTimeLimit) * 100;
            document.querySelector('.progress-timer-bar').style.width = `${progressPercent}%`;
            
            timeRemaining--;
        };
        
        updateTimer(); // Initial update
        this.timer = setInterval(updateTimer, 1000);
    }
    
    timeUp() {
        if (this.timer) {
            clearInterval(this.timer);
        }
        
        // Auto-submit current answer if any
        const currentAnswer = this.getCurrentAnswer();
        if (currentAnswer) {
            this.answers[this.currentQuestionIndex] = currentAnswer;
        }
        
        // Finish quiz
        this.finishQuiz();
        
        this.showNotification('Time\'s up! Your quiz has been automatically submitted.', 'warning');
    }
    
    getCurrentAnswer() {
        const question = this.questions[this.currentQuestionIndex];
        
        if (question.type === 'multiple_choice' || question.type === 'true_false') {
            if (this.currentSelection) {
                return {
                    question_id: question.id,
                    selected_option_id: this.currentSelection,
                    time_spent: Math.floor((Date.now() - this.questionStartTime) / 1000)
                };
            }
        } else {
            const textAnswer = document.getElementById('textAnswer').value.trim();
            if (textAnswer) {
                return {
                    question_id: question.id,
                    answer_text: textAnswer,
                    time_spent: Math.floor((Date.now() - this.questionStartTime) / 1000)
                };
            }
        }
        
        return null;
    }
    
    setupProgressIndicator() {
        const progressSteps = document.querySelector('.progress-steps');
        progressSteps.innerHTML = '';
        
        for (let i = 0; i < this.questions.length; i++) {
            const step = document.createElement('div');
            step.className = 'step';
            step.dataset.questionIndex = i;
            progressSteps.appendChild(step);
        }
    }
    
    updateProgressIndicator() {
        document.querySelectorAll('.step').forEach((step, index) => {
            step.classList.remove('completed', 'current');
            
            if (index < this.currentQuestionIndex) {
                step.classList.add('completed');
            } else if (index === this.currentQuestionIndex) {
                step.classList.add('current');
            }
        });
    }
    
    setupEventListeners() {
        document.getElementById('submitAnswer').addEventListener('click', () => this.submitAnswer());
        document.getElementById('nextQuestion').addEventListener('click', () => this.nextQuestion());
        document.getElementById('finishQuiz').addEventListener('click', () => this.finishQuiz());
        
        // Exit confirmation
        document.getElementById('confirmExit').addEventListener('click', () => {
            window.location.href = '/quiz';
        });
    }
    
    setupNavigationProtection() {
        // Prevent page refresh/close
        window.addEventListener('beforeunload', this.handleBeforeUnload);
        
        // Prevent back button
        history.pushState(null, null, location.href);
        window.addEventListener('popstate', this.handlePopState.bind(this));
    }
    
    removeNavigationProtection() {
        window.removeEventListener('beforeunload', this.handleBeforeUnload);
        window.removeEventListener('popstate', this.handlePopState);
    }
    
    handleBeforeUnload(e) {
        e.preventDefault();
        e.returnValue = '';
        return '';
    }
    
    handlePopState(e) {
        history.pushState(null, null, location.href);
        
        // Show exit confirmation modal
        const exitModal = new bootstrap.Modal(document.getElementById('confirmExitModal'));
        exitModal.show();
    }
    
    // Utility methods
    formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = seconds % 60;
        return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    }
    
    formatQuestionType(type) {
        const types = {
            'multiple_choice': 'Multiple Choice',
            'true_false': 'True/False',
            'identification': 'Identification',
            'enumeration': 'Enumeration',
            'fill_in_blank': 'Fill in the Blank'
        };
        return types[type] || type;
    }
    
    getInputPlaceholder(type) {
        const placeholders = {
            'identification': 'Enter your answer...',
            'enumeration': 'List your answers (separate with commas)...',
            'fill_in_blank': 'Fill in the blank...'
        };
        return placeholders[type] || 'Enter your answer...';
    }
    
    clearAnswerSelection() {
        this.currentSelection = null;
        document.querySelectorAll('.option-item').forEach(el => {
            el.classList.remove('selected', 'correct', 'incorrect');
            el.style.pointerEvents = 'auto';
            el.style.transform = '';
        });
    }
    
    resetButtons() {
        document.getElementById('submitAnswer').style.display = 'inline-block';
        document.getElementById('submitAnswer').disabled = true;
        document.getElementById('nextQuestion').style.display = 'none';
        document.getElementById('finishQuiz').style.display = 'none';
    }
    
    showError(message) {
        const container = document.querySelector('.quiz-content .container');
        container.innerHTML = `
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="alert alert-danger">
                        <h4><i class="fas fa-exclamation-triangle"></i> Error</h4>
                        <p>${message}</p>
                        <a href="/quiz" class="btn btn-primary mt-3">
                            <i class="fas fa-arrow-left"></i> Back to Quiz Selection
                        </a>
                    </div>
                </div>
            </div>
        `;
    }
    
    showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 120px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 5000);
    }
}

// Initialize quiz when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Check if user has username in session
    const username = sessionStorage.getItem('quizUsername');
    if (!username) {
        // Redirect back to quiz selection
        window.location.href = '/quiz';
        return;
    }
    
    // Initialize quiz player
    window.quizPlayer = new QuizPlayer();
});

// Handle page visibility changes (tab switching)
document.addEventListener('visibilitychange', function() {
    if (document.visibilityState === 'hidden' && window.quizPlayer) {
        // User switched tabs - could implement anti-cheat measures here
        console.log('User switched tabs during quiz');
    }
});

// Prevent right-click context menu during quiz
document.addEventListener('contextmenu', function(e) {
    if (document.getElementById('questionContainer').style.display !== 'none') {
        e.preventDefault();
    }
});

// Prevent text selection during quiz
document.addEventListener('selectstart', function(e) {
    if (document.getElementById('questionContainer').style.display !== 'none' && 
        !e.target.matches('input, textarea')) {
        e.preventDefault();
    }
});

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Only if quiz is active
    if (document.getElementById('questionContainer').style.display === 'none') return;
    
    // Number keys for multiple choice (1-4)
    if (e.key >= '1' && e.key <= '4' && !e.target.matches('input, textarea')) {
        const options = document.querySelectorAll('.option-item');
        const optionIndex = parseInt(e.key) - 1;
        if (options[optionIndex] && !options[optionIndex].style.pointerEvents) {
            options[optionIndex].click();
        }
    }
    
    // Enter to submit
    if (e.key === 'Enter' && !e.target.matches('input, textarea')) {
        const submitBtn = document.getElementById('submitAnswer');
        const nextBtn = document.getElementById('nextQuestion');
        const finishBtn = document.getElementById('finishQuiz');
        
        if (submitBtn.style.display !== 'none' && !submitBtn.disabled) {
            submitBtn.click();
        } else if (nextBtn.style.display !== 'none') {
            nextBtn.click();
        } else if (finishBtn.style.display !== 'none') {
            finishBtn.click();
        }
    }
    
    // Prevent F5 refresh
    if (e.key === 'F5') {
        e.preventDefault();
    }
    
    // Prevent Ctrl+R refresh
    if (e.ctrlKey && e.key === 'r') {
        e.preventDefault();
    }
});