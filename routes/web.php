<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes (Only for Guests)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Protected Routes (Only for Authenticated Users)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/live-feed', [DashboardController::class, 'showLiveFeed'])->name('live_feed');
    Route::get('/smart-surveillance', [DashboardController::class, 'showSmartSurveillance'])->name('smart_surveillance');
    Route::get('/facial-recognition', [DashboardController::class, 'showFacialRecognition'])->name('facial_recognition');
});
