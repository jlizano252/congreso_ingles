<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Admin\Dashboard\AttendanceDashboard;
use Illuminate\Support\Facades\Route;

// ADMIN WEB ROUTES...
Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/certificate', [DashboardController::class, 'certificate'])->name('dashboard.certificate');

Route::get('/dashboard/attendance', function () {
    return view('dashboard-mod.attendance');
})->name('dashboard.attendance');

Route::get('/dashboard/attendance/report', [AttendanceDashboard::class, 'downloadReport'])
    ->name('dashboard.attendance.report');