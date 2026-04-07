<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

// Main Portfolio Page (Hero + Contact)
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Separate Pages
Route::get('/about', [PortfolioController::class, 'about'])->name('about');
Route::get('/skills', [PortfolioController::class, 'skills'])->name('skills');
Route::get('/experience', [PortfolioController::class, 'experience'])->name('experience');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('projects');

// Contact Form
Route::post('/contact', [PortfolioController::class, 'sendContact'])->name('contact.send');

// Authentication
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // About Management
    Route::get('/dashboard/about', [DashboardController::class, 'editAbout'])->name('dashboard.about.edit');
    Route::post('/dashboard/about', [DashboardController::class, 'updateAbout'])->name('dashboard.about.update');

    // Skills Management
    Route::get('/dashboard/skills', [DashboardController::class, 'skills'])->name('dashboard.skills');
    Route::post('/dashboard/skills', [DashboardController::class, 'storeSkill'])->name('dashboard.skills.store');
    Route::delete('/dashboard/skills/{id}', [DashboardController::class, 'destroySkill'])->name('dashboard.skills.destroy');
    Route::get('/dashboard/skills/{id}/edit', [DashboardController::class, 'editSkill'])->name('dashboard.skills.edit');
    Route::put('/dashboard/skills/{id}', [DashboardController::class, 'updateSkill'])->name('dashboard.skills.update');

    //Experience Management
    Route::get('/dashboard/experience', [DashboardController::class, 'experience'])->name('dashboard.experience');
    Route::post('/dashboard/experience', [DashboardController::class, 'storeExperience'])->name('dashboard.experience.store');
    Route::delete('/dashboard/experience/{id}', [DashboardController::class, 'destroyExperience'])->name('dashboard.experience.destroy');
    Route::get('/dashboard/experience/{id}/edit', [DashboardController::class, 'editExperience'])->name('dashboard.experience.edit');
    Route::put('/dashboard/experience/{id}', [DashboardController::class, 'updateExperience'])->name('dashboard.experience.update');

    // Projects
    Route::get('/dashboard/projects', [DashboardController::class, 'projects'])->name('dashboard.projects');
    Route::get('/dashboard/projects/{id}/edit', [DashboardController::class, 'editProject'])->name('dashboard.projects.edit');
    Route::post('/dashboard/projects', [DashboardController::class, 'storeProject'])->name('dashboard.projects.store');
    Route::put('/dashboard/projects/{id}', [DashboardController::class, 'updateProject'])->name('dashboard.projects.update');
    Route::delete('/dashboard/projects/{id}', [DashboardController::class, 'destroyProject'])->name('dashboard.projects.destroy');
});