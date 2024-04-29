<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;



class HomeController extends Controller
{

    // private function resizeCoverImages($books)
    // {
    //     foreach ($books as $book) {
    //         $coverImagePath = public_path($book->cover_image);
    //         if (file_exists($coverImagePath)) {
    //             Image::make($coverImagePath)->resize(300, null, function ($constraint) {
    //                 $constraint->aspectRatio();
    //             })->save($coverImagePath);
    //         }
    //     }
    // }
    public function index()
    {
        // Get the highest-rated books
        $highestRatedBooks = Book::with('reviews')
            ->withAvg('reviews', 'rating') 
            ->orderByDesc('reviews_avg_rating')
            ->take(10)
            ->get();

        // Get the newest books
        $newestBooks = Book::orderBy('published_date', 'desc') // Order by published_date in descending order
            ->take(10)
            ->get();

        // $this->resizeCoverImages($highestRatedBooks);
        // $this->resizeCoverImages($newestBooks);

        return view('pages/home', compact('highestRatedBooks', 'newestBooks'));
    }
}
