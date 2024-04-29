<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Auth;

class FavoriteController extends Controller
{
    public function toggleFavorite(Request $request)
    {
        $book = Book::findOrFail($request->book_id);
        $user = Auth::user();

        if ($user->favoriteBooks()->where('book_id', $book->id)->exists()) {
            // Remove the favorite
            $user->favoriteBooks()->detach($book->id);
            $message = 'Book removed from favorites.';
        } else {
            // Add the favorite
            $user->favoriteBooks()->attach($book->id);
            $message = 'Book added to favorites.';
        }

        return back()->with('success', $message);
    }
}
