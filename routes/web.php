<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/landing-page', function () {
    return view('landing-page');    
}); 

Route::get('/profile', function () {
    return view('profile');    
}); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update'); 
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('jadwal', JadwalController::class);
    Route::resource('feedback', FeedbackController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('mapel', MapelController::class);
    Route::resource('student', StudentController::class);

    Route::get('/search', [SearchController::class, 'index'])->name('search');
});


require __DIR__.'/auth.php';