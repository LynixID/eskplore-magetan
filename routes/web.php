<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuatAkunController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/home', function () {
//     return view('home');
// });
Route::get('/maps', function () {
    return view('maps');
});

Route::get('/beranda-admin', function () {
    return view('berandaadmin')->name('beranda');
});


Route::get('/buat', function () {
    return view('buat-akun');
});

Route::get('/ganti-password', function () {
    return view('ganti-password');
});

Route::get('/verifikasi', function () {
    return view('verifikasi');
});

Route::get('/login',[BuatAkunController::class, 'login'])->name('login');
Route::post('/login',[BuatAkunController::class, 'loginPost'])->name('login.post');
Route::get('/buat-akun',[BuatAkunController::class, 'buat-akun'])->name('buat-akun');
Route::post('/buat-akun',[BuatAkunController::class, 'buatAkunPost'])->name('buat-akun.post');
