<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/register', [RegistrationController::class, 'register'])->name('registration.create');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::middleware(['auth'])->group(function () {
    Route::get('/library', function () {
        return view('pages/my_library');
    });
    
    Route::get('/community', function () {
        return view('pages/community');
    });

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/books/{id}', [BookController::class, "show"] )->name('books.show');

});


