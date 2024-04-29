<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Auth;

class ReadController extends Controller
{
    public function toggleRead(Request $request)
    {
        $book = Book::findOrFail($request->book_id);
        $user = Auth::user();

        if ($user->readBooks()->where('book_id', $book->id)->exists()) {
            // Remove the favorite
            $user->readBooks()->detach($book->id);
            $message = 'Book removed from read list.';
        } else {
            // Add the favorite
            $user->readBooks()->attach($book->id);
            $message = 'Book added to read list.';
        }

        return back()->with('success', $message);
    }
}
