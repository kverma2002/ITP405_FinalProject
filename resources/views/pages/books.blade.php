@extends('template/main')

@section('title', 'All Books')

@section('content')
<div class="container mt-4">
    <h1>Book List</h1>
    <!-- Search and sort form -->
    <form method="GET" action="{{ route('books.index') }}" class="mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <input type="text" class="form-control" name="title" placeholder="title" value="{{ request('title') }}">
            </div>
            <div class="col-md-3">
                <select class="form-control" name="author" id="author">
                    <option value="">Author</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->name }}" {{ request('author') == $author->name ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-control" name="genre" id="genre">
                    <option value="">Genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->name }}" {{ request('genre') == $genre->name ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-1">
                <select class="form-control" name="sort">
                    <option value="">Sort by</option>
                    <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Rating</option>
                    <option value="published_date" {{ request('sort') == 'published_date' ? 'selected' : '' }}>Published Date</option>
                </select>
            </div>
            <div class="col-md-1">
                <select class="form-control" name="order">
                    <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>asc.</option>
                    <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>desc.</option>
                </select>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset($book->cover_image) }}" class="card-img-top" alt="{{ $book->title }}" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ $book->summary }}</p>
                        <a href="{{ route('books.show', [$book->id])}}" class="btn btn-primary">More Details</a> <!-- Link to a detailed view if necessary -->
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Published on {{ $book->published_date->toFormattedDateString() }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center pt-1">
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection

