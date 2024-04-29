<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Auth;

class WishlistController extends Controller
{
    public function toggleWishlist(Request $request)
    {
        $book = Book::findOrFail($request->book_id);
        $user = Auth::user();

        if ($user->wishlist()->where('book_id', $book->id)->exists()) {
            // Remove the favorite
            $user->wishlist()->detach($book->id);
            $message = 'Book removed from favorites.';
        } else {
            // Add the favorite
            $user->wishlist()->attach($book->id);
            $message = 'Book added to favorites.';
        }

        return back()->with('success', $message);
    }
}
