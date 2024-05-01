<?php

use App\Http\Controllers\TitiklokasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('/tambahlokasi', function () {
    return view('tambahlokasi');
});

Route::get('/maps', [TitiklokasiController::class, 'index']);
