<?php

use App\Http\Controllers\PostulationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WebPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/', [WebPageController::class, 'index'])->name('webpage.index');
Route::get('/congress-details', [WebPageController::class, 'details'])->name('webpage.details');

Route::get('/ui/register', [RegisterController::class, 'index'])->name('public.register.index');
Route::get('/ui/register/success', [RegisterController::class, 'emailViewTest'])->name('public.register.success');
Route::get('/ui/register/error', [RegisterController::class, 'emailViewError'])->name('public.register.error');

Route::get('/ui/register/view', [RegisterController::class, 'emailViewTest'])->name('public.email.view');

Route::get('/ui/postularse', [PostulationController::class, 'index'])->name('public.postularse.index');