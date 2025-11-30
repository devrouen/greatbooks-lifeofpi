<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Main informative pages
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/timeline', function () {
    return view('timeline');
})->name('timeline');

Route::get('/conventions', function () {
    return view('conventions');
})->name('conventions');

Route::get('/author', function () {
    return view('author');
})->name('author');

Route::get('/summary', function () {
    return view('summary');
})->name('summary');

Route::get('/analysis', function () {
    return view('analysis');
})->name('analysis');

// Quiz routes
Route::prefix('quiz')->name('quiz.')->group(function () {
    Route::get('/', [QuizController::class, 'index'])->name('index');
    Route::get('/play/{difficulty}', [QuizController::class, 'play'])->name('play');
    Route::get('/leaderboard', [QuizController::class, 'leaderboard'])->name('leaderboard');
    
    // API routes for quiz functionality
    Route::get('/api/questions/{difficulty}', [QuizController::class, 'getQuestions'])->name('api.questions');
    Route::post('/api/submit', [QuizController::class, 'submitAttempt'])->name('api.submit');
    Route::get('/api/leaderboard/{difficulty?}', [QuizController::class, 'getLeaderboardData'])->name('api.leaderboard');
    
});