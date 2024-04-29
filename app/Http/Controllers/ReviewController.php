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

        // Check if the user has already reviewed the book
        $existingReview = Review::where('book_id', $request->input('book_id'))
                                ->where('user_id', auth()->id())
                                ->first();

        // If the user has already reviewed the book, redirect back with an error message
        if ($existingReview) {
            return redirect()->back()->with('error', 'You have already submitted a review for this book.');
        }

        // Create a new review
        $review = new Review();
        $review->book_id = $request->input('book_id');
        $review->user_id = auth()->id(); 
        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');
        $review->save();

        return redirect()->route('books.show', $request->input('book_id'))->with('success', 'Review submitted successfully!');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully.');
    }

    public function edit($id)
{
        $review = Review::findOrFail($id);
        if (auth()->id() !== $review->user_id) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        
        return view('pages/review_edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $review = Review::findOrFail($id);
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();

        return redirect()->route('books.show', $review->book_id)->with('success', 'Review updated successfully');
    }

}
