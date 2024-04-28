@extends('template/main')

@section('title', 'Home Page')

@section('content')
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop:false,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });
});
</script>
<div class="container">
    <h3>Highest Rated Books</h3>
    <div id="highestRatedCarousel" class="owl-carousel owl-theme">
        @foreach ($highestRatedBooks as $book)
            <div class="item">
                <a href="{{ route('books.show', [$book->id]) }}">
                    <img src="{{ asset($book->cover_image) }}" alt="{{ $book->title }}" style="width: 100%; max-height: 450px; object-fit: cover;">
                </a>
                <h5>{{ $book->title }}</h5>
                <p>Average Rating: {{ round($book->reviews_avg_rating, 1) }}</p>
            </div>
        @endforeach
    </div>

    <h3>Newest Books</h3>
    <div id="newestBooksCarousel" class="owl-carousel owl-theme">
        @foreach ($newestBooks as $book)
            <div class="item">
                <a href="{{ route('books.show', [$book->id]) }}">
                    <img src="{{ asset($book->cover_image) }}" alt="{{ $book->title }}" style="width: 100%; max-height: 450px; object-fit: cover;">
                </a>
                <h5>{{ $book->title }}</h5>
                <p>Released on: {{ $book->published_date->format('M d, Y') }}</p>
            </div>
        @endforeach
    </div>
</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script> --}}
@endsection