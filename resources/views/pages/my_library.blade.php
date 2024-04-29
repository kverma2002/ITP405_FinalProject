@extends('template/main')

@section('title', 'Insights')

@section('content')
<div class="container">
    <h1>Insights</h1>
    <section class="profile-section">
        <div class="border p-3 mb-2">
        <h2 style="color: gold;">Favorited Books</h2>
            <div class="scrollable-list">
                @foreach ($favorites as $book)
                    <li> <a href="{{route('books.show', $book->id)}}">{{ $book->title }}</a> by {{ $book->authors->pluck('name')->join(', ') }}</li>
                @endforeach
            </div>
        </div>
    </section>
    <section class="profile-section">
        <div class="border p-3 mb-2">
        <h2 style="color: green;">Wishlisted Books</h2>
            <div class="scrollable-list">
                @foreach ($wishlists as $book)
                    <li><a href="{{route('books.show', $book->id)}}">{{ $book->title }}</a> by {{ $book->authors->pluck('name')->join(', ') }}</li>
                @endforeach
            </div>
        </div>
    </section>
    <section class="profile-section">
        <div class="border p-3 mb-2">
            <h2>Read Books</h2>
            <div class="scrollable-list">
                @foreach ($reads as $book)
                    <li><a href="{{route('books.show', $book->id)}}">{{ $book->title }}</a> by {{ $book->authors->pluck('name')->join(', ') }} - Rating: {{ $book->reviews->first()->rating ?? 'No rating' }}</li>
                @endforeach
            </div>
        </div>
    </section>
    <section class="profile-section">
        <div class="border p-3 mb-2">
            <h2>Ratings Per Genre</h2>
            <div class="scrollable-list">
                @foreach ($genreRatings as $rating)
                    <li><a href="{{ route('books.index', ['genre' => $rating->genre]) }}">{{ $rating->genre }}</a> - Average Rating: {{ round($rating->avg_rating, 1) }} over {{ $rating->count }} books</li>
                @endforeach
            </div>
        </div>
        <div class="border p-3 mb-2">
            <h4>Most Commonly Read Genres</h4>
            @foreach ($mostCommonGenres as $genre)
                <li><a href="{{ route('books.index', ['genre' => $genre->genre]) }}">{{ $genre->genre }}</a> ({{ $genre->count }} books)</li>
            @endforeach
        </div>
    </section>
</div>
@endsection

