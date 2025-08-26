<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// ADMIN WEB ROUTES...
Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/certificate', [DashboardController::class, 'certificate'])->name('dashboard.certificate');
