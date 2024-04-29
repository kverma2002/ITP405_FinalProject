@extends('template/main')

@section('title', 'Profile')

@section('content')
<div class="container">
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>You joined on {{ $user->created_at->toFormattedDateString() }}</p>

    <hr>

    <!-- Form for creating a new book -->
    <div class="border p-3 mb-4">
        <h2>Create a New Book</h2>
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                @error('title')
                    <small class="text-danger"> {{$message}} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <input type="text" name="summary" id="summary" class="form-control" value="{{ old('summary') }}">
                @error('summary')
                    <small class="text-danger"> {{$message}} </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" id="isbn" class="form-control" value="{{ old('isbn') }}">
                @error('isbn')
                    <small class="text-danger"> {{$message}} </small>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="authors">Authors:</label>
                    <select class="form-control" id="authors" name="authors[]" multiple>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('authors')
                    <small class="text-danger"> {{$message}} </small>
                @enderror
            </div>        
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <select name="genre" id="genre" class="form-select">
                    <option value="">-- Select Genre --</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" 
                            {{ (string) $genre->id === old('genre') ? "selected" : ""}}
                        > 
                            {{ $genre->name }} 
                        </option>
                    @endforeach
                </select>
                @error('genre')
                    <small class="text-danger"> {{$message}} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="published_date" class="form-label">Published Date</label>
                <input type="date" class="form-control" id="published_date" name="published_date" value="{{ old('published_date') }}>
                @error('published_date')
                    <small class="text-danger"> {{$message}} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image">
                @error('cover_image')
                    <small class="text-danger"> {{$message}} </small>
                @enderror
            </div>     
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <hr>

    <!-- Form for creating a new author -->
    <div class="border p-3 mb-4">
        <h2>Create a New Author</h2>
        <form action="{{ route('authors.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
                @error('name')
                    <small class="text-danger"> {{$message}} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="biography" class="form-label">Biography</label>
                <textarea class="form-control" id="biography" name="biography"></textarea>
                @error('biography')
                    <small class="text-danger"> {{$message}} </small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection