<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:100', // Adjust max length as needed
        ]);

        // Create a new review
        $review = new Review();
        $review->book_id = $request->input('book_id');
        $review->user_id = auth()->id(); 
        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');
        $review->save();

        return redirect()->route('books.show', $request->input('book_id'))->with('success', 'Review submitted successfully!');
    }
}
