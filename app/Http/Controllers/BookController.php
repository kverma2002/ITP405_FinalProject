<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::with('authors', 'genre')->findOrFail($id);

        $avgRating = round($book->reviews->avg('rating'), 1);

        return view('pages/book', compact('book', 'avgRating'));
    }

    public function index(Request $request) {
        $query = Book::query();

        // Search by title
        if ($request->has('title') && $request->title != '') {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Search by author
        if ($request->has('author') && $request->author != '') {
            $query->whereHas('authors', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->author . '%');
            });
        }

        // Search by genre
        if ($request->has('genre') && $request->genre != '') {
            $query->whereHas('genre', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->genre . '%');
            });
        }

        $genres = Genre::all();
        $authors = Author::all();

        switch ($request->sort) {
            case 'rating':
                $query->leftJoin('reviews', 'books.id', '=', 'reviews.book_id')
                      ->selectRaw('books.*, AVG(reviews.rating) as average_rating')
                      ->groupBy('books.id')
                      ->orderBy('average_rating', $request->get('order', 'desc'));
                break;
            case 'published_date':
                $query->orderBy('published_date', $request->get('order', 'desc'));
                break;
            default:
                break;
        }

        $books = $query->with('authors', 'genre')->paginate(9);

        return view('pages/books', compact('books', 'genres', 'authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'genre' => 'required|exists:genres,id',
            'isbn' => 'required|numeric',
            'summary' => 'required|max:255',
            'authors' => 'required|array|min:1', // At least one author must be selected
            'authors.*' => 'exists:authors,id', // Validate each author ID
            'published_date' => 'required|date',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 2MB Max
        ]);

        $book = new Book();
        $book->title = $request->input('title');
        $book->genre_id = $request->input('genre');
        $book->isbn = $request->input('isbn');
        $book->summary = $request->input('summary');
        $firstAuthor = $request->input('authors')[0];
        $book->author_id = $firstAuthor;
        $book->published_date = $request->input('published_date');

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            if ($request->hasFile('cover_image')) {
                $coverImage = $request->file('cover_image');
                // Store the image in the public disk
                $coverImagePath = $coverImage->store('cover_images', 'public');
                // Save the relative path in the database
                $book->cover_image = 'storage/' . $coverImagePath;
            }
        } else {
            $book->cover_image = 'storage/book-cover-placeholder.png';
        }

        $book->save();

        // Attach selected authors to the book
        $book->authors()->attach($request->input('authors'));

        return redirect()->route('profile.index')->with('success', "Book - $book->title - created successfully!");
    }

}
