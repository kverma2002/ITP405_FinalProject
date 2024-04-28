@extends('template/main')

@section('title', 'Home Page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset($book->cover_image) }}" alt="Cover image of {{ $book->title }}" class="img-fluid">
        </div>
        <div class="col-md-8">
            <h1>{{ $book->title }}</h1>
            <p><strong>ISBN:</strong> {{ $book->isbn }}</p>
            <p><strong>Published Date:</strong> {{ $book->published_date->toFormattedDateString() }}</p>
            <h3>Summary</h3>
            <p>{{ $book->summary }}</p>
            
            <h3>Author(s)</h3>
            <ul>
                @foreach ($book->authors as $author)
                <li>{{ $author->name }} </small></li>
                @endforeach
            </ul>

            <h3>Reviews</h3>
            @forelse ($book->reviews as $review)
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Rating: {{ $review->rating }}/5</h5>
                        <p class="card-text">{{ $review->comment }}</p>
                        <p class="card-text"><small class="text-muted">Reviewed by user {{ $review->user_id }} on {{ $review->created_at->toFormattedDateString() }}</small></p>
                    </div>
                </div>
            @empty
                <p>No reviews yet.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
