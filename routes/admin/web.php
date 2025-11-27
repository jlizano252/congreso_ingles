<?php

use App\Http\Controllers\AttendanceReportController;
use App\Http\Controllers\PostulationController;
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

Route::get('/certificate/download/{id}', [DashboardController::class, 'downloadCertificate'])
    ->name('certificate.download');

Route::get('/postularse', [PostulationController::class, 'index'])->name('public.postularse.index');

Route::get('/dashboard/attendance/report', [AttendanceReportController::class, 'download'])
    ->name('dashboard.attendance.report');

Route::get('/dashboard/reports/troubleshooters', [AttendanceReportController::class, 'downloadTroubleshootersReport'])
    ->name('dashboard.troubleshooters.report');
