<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::with('authors')->findOrFail($id);

        return view('pages/book', compact('book'));
    }

}
