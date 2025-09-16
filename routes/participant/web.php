<?php

use App\Http\Controllers\DashboardParticipantController;
use Illuminate\Support\Facades\Route;

// PARTICIPANTS WEB ROUTES...

Route::get('/', [DashboardParticipantController::class, 'index'])->name('home');

// Buscar participante por cédula y mostrar temas
Route::post('/find', [DashboardParticipantController::class, 'findParticipant'])->name('participant.find');

// Registrar inscripción de los temas seleccionados
Route::post('/register', [DashboardParticipantController::class, 'register'])->name('participant.register');