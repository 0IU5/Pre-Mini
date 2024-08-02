<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('/landing-page', function () {
    return view('landing-page');    
}); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', function () {
    return view('profile');    
}); 

// Rute untuk registrasi
Route::get('register', [AuthController::class, 'register'])
    ->middleware('guest')->name('register');
Route::post('register', [AuthController::class, 'registerSave'])
    ->middleware('guest')->name('register.save');

// Rute untuk login
Route::get('login', [AuthController::class, 'login'])
    ->middleware('guest')->name('login');
Route::post('login', [AuthController::class, 'loginAction'])
    ->middleware('guest')->name('login.action');

// Rute untuk logout
Route::get('logout', [AuthController::class, 'logout'])
    ->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('profile', [AuthController::class, 'profile'])->name('profile');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update'); 
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('register', RegisteredUserController::class);
    Route::resource('login', AuthenticatedSessionController::class);

    Route::resource('jadwal', JadwalController::class);
    Route::resource('feedback', FeedbackController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('student', StudentController::class);

    Route::get('/search', [SearchController::class, 'index'])->name('search');
});


require __DIR__.'/auth.php';