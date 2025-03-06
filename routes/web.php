<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para encuestas
    Route::resource('surveys', SurveyController::class);
    Route::get('surveys/{survey}/results', [SurveyController::class, 'results'])->name('surveys.results');

    // Rutas para preguntas
    Route::post('surveys/{survey}/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::put('surveys/{survey}/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('surveys/{survey}/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');

    // Rutas para respuestas
    Route::post('surveys/{survey}/responses', [ResponseController::class, 'store'])->name('responses.store');
});

require __DIR__.'/auth.php';
