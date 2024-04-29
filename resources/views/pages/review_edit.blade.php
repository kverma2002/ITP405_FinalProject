@extends('template/main')

@section('title', 'Edit Review')

@section('content')
<div class="container">
    <h1>Edit Review</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Important for Laravel to recognize it as an update operation -->
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating" value="{{ $review->rating }}" required min="1" max="5">
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required>{{ $review->comment }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Review</button>
            </form>
        </div>
    </div>
</div>
@endsection
