<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/home');
});

Route::get('/library', function () {
    return view('pages/my_library');
});

Route::get('/community', function () {
    return view('pages/community');
});