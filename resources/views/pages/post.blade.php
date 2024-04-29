@extends('template/main')

@section('title', 'Book')

@section('content')
<div class="container">
    <div>
        <h2 class="bg-primary text-white p-3 mb-3"> {{ $post->title }}</h2>
        <h4><strong></strong> {{ $post->content }}</p></h4>
        <p><strong>Posted by:</strong> {{ $post->user->username }}</p>
    </div>

    <!-- Comment Submission Form for the Post -->
    <div class="mt-3" id="comment-form-section">
        <h5>Add a comment:</h5>
        <form action="{{ route('comments.store' , [$post->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea class="form-control mb-2" name="content" required placeholder="Write your comment here..."></textarea>
            <input type="number" class="form-control mb-2" id="reply-comment-id" name="parent_id" placeholder="Reply to comment ID (optional)">
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    </div>

    @if ($post->comments->isNotEmpty())
        @foreach ($post->comments as $comment)
            <div class="card mt-3">
                <div class="card-body">
                    <p>{{ $comment->content }}</p>
                    <div class="d-flex justify-content-between">
                        <small>Commented by {{ $comment->user->username }}</small>
                        <small class="text-muted comment-id" data-comment-id="{{ $comment->id }}">Comment ID: {{ $comment->id }}</small>
                    </div>
                    @include('partials.comments', ['comments' => $comment->replies])
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-info mt-3">No comments... yet!</div>
    @endif

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add click event listener to comment ID elements
        document.querySelectorAll('.comment-id').forEach(function(commentIdElement) {
            commentIdElement.addEventListener('click', function() {
                // Get the comment ID
                var commentId = commentIdElement.dataset.commentId;
                // Fill out the comment ID in the form
                document.getElementById('reply-comment-id').value = commentId;
                // Scroll the screen to the comment form section
                document.getElementById('comment-form-section').scrollIntoView({ behavior: 'smooth' });
            });
        });
    });
    </script>
@endsection
