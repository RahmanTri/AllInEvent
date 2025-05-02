<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Register\RegisterController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Event\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['web'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});


Route::get('/register', [RegisterController::class, 'IndexPages']);
Route::post('/register-event', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/home', [HomeController::class, 'IndexPages'])->middleware('auth');
Route::get('/home', [HomeController::class, 'IndexPages'])->name('home');
Route::get('/events', [HomeController::class, 'IndexPages'])->name('event.index');
Route::get('/event/{nama_event}', [EventController::class, 'show'])->name('event.detail');