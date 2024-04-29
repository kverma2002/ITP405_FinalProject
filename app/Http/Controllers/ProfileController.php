<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        $book = new \App\Models\Book; 
        $author = new \App\Models\Author; 
        $genres = \App\Models\Genre::all(); // Assuming you have a Genre model
        $authors = \App\Models\Author::all(); // Fetch all authors

        return view('profile/index', compact('user', 'book', 'author', 'genres', 'authors'));
    }
}
