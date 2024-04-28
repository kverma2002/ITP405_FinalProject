@extends('template/main')

@section('title', 'Book')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="col">
                <div class="col-md-10">
                    <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="img-fluid">
                </div>
                <div class="col-md-10">
                    <h2>{{ $book->title }}</h2>
                    <!-- Display average rating -->
                    <p>Average Rating: {{ $avgRating }} / 5</p>
                    <!-- Review form -->
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating:</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h1>{{ $book->title }}</h1>
            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
            <p><strong>Published Date:</strong> {{ $book->published_date->toFormattedDateString() }}</p>
            <h3>Summary</h3>
            <p>{{ $book->summary }}</p>
            
            <h3>Author(s)</h3>
            <ul>
                @foreach ($book->authors as $author)
                <a href="{{ route('authors.show', [$author->id]) }}">
                    <li>{{ $author->name }} </small></li>
                </a>
                @endforeach
            </ul>

            <h3>Reviews</h3>

            @forelse ($book->reviews as $review)
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Rating: {{ $review->rating }}/5</h5>
                        <p class="card-text">{{ $review->comment }}</p>
                        <p class="card-text"><small class="text-muted">Reviewed by user {{ $review->user->username }} on {{ $review->created_at->toFormattedDateString() }}</small></p>
                    </div>
                </div>
            @empty
                <p>No reviews yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection