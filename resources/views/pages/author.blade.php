@extends('template/main')

@section('title', 'Author')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $author->name }}</div>
                    <div class="card-body">
                        @if ($author->biography)
                            <p>{{ $author->biography }}</p>
                        @else
                            <p>No biography available.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- You can add a photo here if needed -->
                {{-- @if ($author->photo_url)
                    <img src="{{ $author->photo_url }}" alt="{{ $author->name }}" class="img-fluid">
                @endif --}}
            </div>
        </div>
    </div>
@endsection