<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReadController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/register', [RegistrationController::class, 'register'])->name('registration.create');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::middleware(['auth'])->group(function () {

    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{id}', [BookController::class, "show"] )->name('books.show');
    Route::post('/books/store', [BookController::class, 'store'])->name('books.store');

    Route::post('/books/toggle-favorite', [FavoriteController::class, 'toggleFavorite'])->name('books.toggleFavorite');
    Route::post('/books/toggle-wishlist', [WishlistController::class, 'toggleWishlist'])->name('books.toggleWishlist');
    Route::post('/books/toggle-read', [ReadController::class, 'toggleRead'])->name('books.toggleRead');

    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');


    Route::get('/authors/{id}', [AuthorController::class, "show"] )->name('authors.show');
    Route::post('/authors/store', [AuthorController::class, 'store'])->name('authors.store');

    Route::get('/library', [LibraryController::class, "index"] )->name('library.index');
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index'); 
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/community', [DiscussionController::class, 'index'])->name('posts.index');
    Route::post('/community', [DiscussionController::class, 'storePost'])->name('posts.store');

    Route::get('/community/{id}', [DiscussionController::class, "show"] )->name('posts.show');
    Route::post('/community/{id}', [DiscussionController::class, "storeComment"] )->name('comments.store');

});


