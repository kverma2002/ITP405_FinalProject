<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LibraryController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Get user's favorited books
        $favorites = $user->favoriteBooks()->with('authors')->get();

        // Get user's wishlisted books
        $wishlists = $user->wishlist()->with('authors')->get();

        // Get user's read books with ratings
        $reads = $user->readBooks()->with(['authors', 'reviews' => function ($query) use ($user) {
            $query->where('user_id', $user->id); // Filter to get only the user's reviews
        }])->get();

        // Calculate insights
        $genreRatings = DB::table('books')
            ->join('reviews', 'reviews.book_id', '=', 'books.id')
            ->join('genres', 'genres.id', '=', 'books.genre_id')
            ->where('reviews.user_id', auth()->id())  // Ensure only the logged-in user's reviews
            ->select(
                'genres.id as genre_id',
                'genres.name as genre', 
                DB::raw('AVG(reviews.rating) as avg_rating'), 
                DB::raw('COUNT(DISTINCT books.id) as count')
            )
            ->groupBy('genres.id', 'genres.name')
            ->get();
        // dd($genreRatings);
        
        $mostCommonGenres = DB::table('books')
            ->join('reviews', 'reviews.book_id', '=', 'books.id')
            ->join('genres', 'genres.id', '=', 'books.genre_id')
            ->where('reviews.user_id', $user->id)
            ->select('genres.name as genre', DB::raw('COUNT(books.id) as count'))
            ->groupBy('genres.name')
            ->orderBy('count', 'desc')
            ->get();

        
        return view('pages/my_library', compact('favorites', 'wishlists', 'reads', 'genreRatings', 'mostCommonGenres'));
    }
}
