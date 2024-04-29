@extends('template/main')

@section('title', $author->name)

@section('content')
<div class="container">
    <h1>{{ $author->name }}</h1>
    <p>{{ $author->biography }}</p>
    <hr>
    <h3>Books by {{ $author->name }}</h3>
    <div class="list-group">
        @foreach ($author->books as $book)
            <a href="{{route('books.show', [$book->id])}}" class="list-group-item list-group-item-action">
                <strong>{{ $book->title }}</strong> - Published on: {{ $book->published_date->format('M d, Y') }}
                <br>
                <small>ISBN: {{ $book->isbn }}</small>
            </a>
        @endforeach
    </div>
</div>
@endsection