<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $book = new Book; 
        $author = new Author; 
        $genres = Genre::all();
        $authors = Author::all(); // Fetch all authors

        return view('profile/index', compact('user', 'book', 'author', 'genres', 'authors'));
    }
}
