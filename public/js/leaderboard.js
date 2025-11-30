// Leaderboard functionality
class LeaderboardManager {
    constructor() {
        this.currentDifficulty = 'all';
        this.leaderboardData = [];
        this.init();
    }
    
    init() {
        this.setupEventListeners();
        this.loadLeaderboard();
    }
    
    setupEventListeners() {
        // Difficulty tab switching
        document.querySelectorAll('.difficulty-tab').forEach(tab => {
            tab.addEventListener('click', (e) => {
                const difficulty = e.target.dataset.difficulty;
                this.switchDifficulty(difficulty);
            });
        });
    }
    
    switchDifficulty(difficulty) {
        // Update active tab
        document.querySelectorAll('.difficulty-tab').forEach(tab => {
            tab.classList.remove('active');
        });
        document.querySelector(`[data-difficulty="${difficulty}"]`).classList.add('active');
        
        this.currentDifficulty = difficulty;
        this.loadLeaderboard();
    }
    
    async loadLeaderboard() {
        try {
            this.showLoading();
            
            const response = await fetch(`/quiz/api/leaderboard/${this.currentDifficulty}`);
            const data = await response.json();
            
            if (!data.success) {
                throw new Error(data.message || 'Failed to load leaderboard');
            }
            
            this.leaderboardData = data.leaderboard;
            this.displayLeaderboard();
            this.updateStats();
            
        } catch (error) {
            console.error('Error loading leaderboard:', error);
            this.showError('Failed to load leaderboard data. Please try again.');
        }
    }
    
    showLoading() {
        document.getElementById('loadingState').style.display = 'block';
        document.getElementById('emptyState').style.display = 'none';
        document.getElementById('leaderboardTable').style.display = 'none';
    }
    
    displayLeaderboard() {
        if (this.leaderboardData.length === 0) {
            this.showEmptyState();
            return;
        }
        
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('emptyState').style.display = 'none';
        document.getElementById('leaderboardTable').style.display = 'block';
        
        this.displayPodium();
        this.displayTable();
    }
    
    showEmptyState() {
        document.getElementById('loadingState').style.display = 'none';
        document.getElementById('emptyState').style.display = 'block';
        document.getElementById('leaderboardTable').style.display = 'none';
    }
    
    displayPodium() {
        const podiumData = this.leaderboardData.slice(0, 3);
        
        // Clear previous podium data
        const positions = ['first', 'second', 'third'];
        positions.forEach(position => {
            document.getElementById(`${position}-name`).textContent = '-';
            document.getElementById(`${position}-score`).textContent = '- pts';
            document.getElementById(`${position}-percentage`).textContent = '-%';
            document.getElementById(`${position}-time`).textContent = '-:--';
            document.getElementById(`${position}-difficulty`).textContent = '-';
            document.getElementById(`${position}-difficulty`).className = 'difficulty-badge';
        });
        
        // Populate podium with actual data
        podiumData.forEach((player, index) => {
            const position = positions[index];
            document.getElementById(`${position}-name`).textContent = this.truncateText(player.username, 15);
            document.getElementById(`${position}-score`).textContent = `${player.best_score} pts`;
            document.getElementById(`${position}-percentage`).textContent = `${player.best_percentage}%`;
            document.getElementById(`${position}-time`).textContent = this.formatTime(player.fastest_time);
            
            const difficultyBadge = document.getElementById(`${position}-difficulty`);
            difficultyBadge.textContent = player.difficulty_level;
            difficultyBadge.className = `difficulty-badge ${player.difficulty_level}`;
        });
    }
    
    displayTable() {
        const tableBody = document.getElementById('rankingsTableBody');
        tableBody.innerHTML = '';
        
        // Get current user if exists
        const currentUser = sessionStorage.getItem('quizUsername');
        
        this.leaderboardData.forEach((player, index) => {
            const row = document.createElement('tr');
            const isCurrentUser = currentUser && player.username === currentUser;
            
            if (isCurrentUser) {
                row.classList.add('current-user');
            }
            
            const rank = index + 1;
            const isTop3 = rank <= 3;
            
            row.innerHTML = `
                <td class="rank-cell ${isTop3 ? 'top-3' : ''}">
                    ${this.getRankDisplay(rank)}
                </td>
                <td class="player-cell">
                    <div class="player-mini-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="player-info">
                        <div class="player-username">${this.escapeHtml(player.username)}</div>
                    </div>
                </td>
                <td class="score-cell">${player.best_score}</td>
                <td class="percentage-cell ${this.getPerformanceClass(player.best_percentage)}">
                    ${player.best_percentage}%
                </td>
                <td class="time-cell">${this.formatTime(player.fastest_time)}</td>
                <td>
                    <span class="difficulty-badge ${player.difficulty_level}">
                        ${player.difficulty_level}
                    </span>
                </td>
                <td class="attempts-cell">${player.total_attempts}</td>
                <td class="date-cell">${this.formatDate(player.last_played)}</td>
            `;
            
            tableBody.appendChild(row);
        });
        
        // Update total players count
        document.getElementById('totalPlayers').textContent = this.leaderboardData.length;
    }
    
    updateStats() {
        if (this.leaderboardData.length === 0) {
            // Reset stats for empty state
            document.getElementById('totalPlayersCount').textContent = '0';
            document.getElementById('averageScore').textContent = '0';
            document.getElementById('highestScore').textContent = '0';
            document.getElementById('fastestTime').textContent = '-:--';
            return;
        }
        
        const totalPlayers = this.leaderboardData.length;
        const scores = this.leaderboardData.map(p => p.best_score);
        const times = this.leaderboardData.map(p => p.fastest_time).filter(t => t !== null);
        
        const averageScore = Math.round(scores.reduce((a, b) => a + b, 0) / totalPlayers);
        const highestScore = Math.max(...scores);
        const fastestTime = times.length > 0 ? Math.min(...times) : null;
        
        // Animate stat updates
        this.animateNumber('totalPlayersCount', totalPlayers);
        this.animateNumber('averageScore', averageScore);
        this.animateNumber('highestScore', highestScore);
        document.getElementById('fastestTime').textContent = this.formatTime(fastestTime);
    }
    
    animateNumber(elementId, targetValue) {
        const element = document.getElementById(elementId);
        const startValue = parseInt(element.textContent) || 0;
        const duration = 1000; // 1 second
        const startTime = Date.now();
        
        const updateNumber = () => {
            const currentTime = Date.now();
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Easing function for smooth animation
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const currentValue = Math.round(startValue + (targetValue - startValue) * easeOutQuart);
            
            element.textContent = currentValue.toLocaleString();
            
            if (progress < 1) {
                requestAnimationFrame(updateNumber);
            }
        };
        
        requestAnimationFrame(updateNumber);
    }
    
    getRankDisplay(rank) {
        if (rank === 1) return '🥇 1';
        if (rank === 2) return '🥈 2';
        if (rank === 3) return '🥉 3';
        return rank;
    }
    
    getPerformanceClass(percentage) {
        if (percentage >= 90) return 'excellent';
        if (percentage >= 70) return 'good';
        if (percentage >= 50) return 'average';
        return 'poor';
    }
    
    formatTime(seconds) {
        if (!seconds || seconds === null) return '-:--';
        
        const mins = Math.floor(seconds / 60);
        const secs = seconds % 60;
        return `${mins}:${secs.toString().padStart(2, '0')}`;
    }
    
    formatDate(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const diffMs = now - date;
        const diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));
        
        if (diffDays === 0) {
            return 'Today';
        } else if (diffDays === 1) {
            return 'Yesterday';
        } else if (diffDays < 7) {
            return `${diffDays} days ago`;
        } else {
            return date.toLocaleDateString('en-US', { 
                month: 'short', 
                day: 'numeric',
                year: date.getFullYear() !== now.getFullYear() ? 'numeric' : undefined
            });
        }
    }
    
    truncateText(text, maxLength) {
        if (text.length <= maxLength) return text;
        return text.substring(0, maxLength - 3) + '...';
    }
    
    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
    
    showError(message) {
        this.showNotification(message, 'danger');
        this.showEmptyState();
    }
    
    showNotification(message, type = 'info') {
        // Remove any existing notifications
        document.querySelectorAll('.alert-floating').forEach(alert => alert.remove());
        
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show alert-floating`;
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 5000);
    }
}

// Global functions
function refreshLeaderboard() {
    const refreshBtn = document.querySelector('[onclick="refreshLeaderboard()"]');
    if (refreshBtn) {
        refreshBtn.classList.add('loading');
        refreshBtn.disabled = true;
        
        // Reset after loading completes
        setTimeout(() => {
            refreshBtn.classList.remove('loading');
            refreshBtn.disabled = false;
        }, 1000);
    }
    
    if (window.leaderboardManager) {
        window.leaderboardManager.loadLeaderboard();
    }
}

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    window.leaderboardManager = new LeaderboardManager();
    
    // Add smooth scroll animations to elements
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
            }
        });
    }, observerOptions);
    
    // Observe stat cards
    document.querySelectorAll('.stat-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        observer.observe(card);
    });
});

// Handle page visibility for auto-refresh
document.addEventListener('visibilitychange', function() {
    if (!document.hidden && window.leaderboardManager) {
        // Refresh leaderboard when user comes back to the tab
        setTimeout(() => {
            window.leaderboardManager.loadLeaderboard();
        }, 1000);
    }
});

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // R key to refresh
    if (e.key === 'r' || e.key === 'R') {
        if (!e.ctrlKey && !e.metaKey) {
            e.preventDefault();
            refreshLeaderboard();
        }
    }
    
    // Number keys to switch difficulty tabs
    const difficultyMap = {
        '1': 'all',
        '2': 'easy',
        '3': 'medium',
        '4': 'hard'
    };
    
    if (difficultyMap[e.key] && window.leaderboardManager) {
        e.preventDefault();
        window.leaderboardManager.switchDifficulty(difficultyMap[e.key]);
    }
});

// Add CSS animation classes
const style = document.createElement('style');
style.textContent = `
    .fadeInUp {
        animation: fadeInUp 0.6s ease forwards !important;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);