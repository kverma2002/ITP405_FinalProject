@extends('template/main')

@section('title', 'Book')

@section('content')
<div class="container">
    <!-- New Post Form -->
    <div class="card mb-4">
        <div class="card-header">Create a New Post</div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="book" class="form-label">Book</label>
                    <select name="book" id="book" class="form-select">
                        <option value="">-- Select Book --</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}" 
                                {{ (string) $book->id === old('book') ? "selected" : ""}}
                            > 
                                {{ $book->title }} 
                            </option>
                        @endforeach
                    </select>
                    @error('book')
                        <small class="text-danger"> {{$message}} </small>
                    @enderror
                </div>        
                <button type="submit" class="btn btn-primary">Post</button>
            </form>
        </div>
    </div>

    <!-- Display Posts -->
    @foreach ($posts as $post)
        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('posts.show', [$post->id]) }}">
                        {{ $post->title }}
                    </a>
                    <span class="badge bg-secondary">{{ $post->comments_count }} Replies</span>
                </div>
            </div>
            <div class="card-body">
                <p>{{ $post->content }}</p>
                <small>Posted by {{ $post->user->username }}</small>
            </div>
        </div>
    @endforeach
</div>
@endsection