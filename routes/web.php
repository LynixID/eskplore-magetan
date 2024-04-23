<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('maps');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/maps', function () {
    return view('maps');
});
