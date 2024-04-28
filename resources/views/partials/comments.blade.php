@foreach ($comments as $comment)
    <div style="margin-left: 20px;">
        <div class="card mt-2">
            <div class="card-body">
                <p>{{ $comment->content }}</p>
                <div class="d-flex justify-content-between">
                    <small>Commented by {{ $comment->user->username }}</small>
                    <small class="text-muted comment-id" data-comment-id="{{ $comment->id }}">Comment ID: {{ $comment->id }}</small>
                </div>
                @if ($comment->replies->isNotEmpty())
                    @include('partials.comments', ['comments' => $comment->replies])
                @endif
            </div>
        </div>
    </div>
@endforeach
