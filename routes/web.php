<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuatAkunController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\TitiklokasiController;
use App\Http\Controllers\WisataKulinerController;
use App\Http\Controllers\WisataPembelanjaanController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('/proses_tambah)', [FeedbackController::class, 'proses_tambah'])->name('tambah.feedback');
Route::delete('/proses_hapus/{id})', [FeedbackController::class, 'proses_hapus'])->name('hapus.feedback');

Route::get('/maps', [TitiklokasiController::class, 'index']);
Route::get('/tambahlokasi', [TitiklokasiController::class, 'read']);
Route::post('/tambahlokasi', [TitiklokasiController::class, 'create']);
Route::delete('/tambahlokasi/{id}', [TitiklokasiController::class, 'destroy']);


Route::get('/ganti-password', function () {
    return view('ganti-password');
});

Route::get('/verifikasi', function () {
    return view('verifikasi');
});

Route::get('/login', [BuatAkunController::class, 'login'])->name('login');
Route::post('/login', [BuatAkunController::class, 'loginPost'])->name('login.post');
Route::get('/buat-akun', [BuatAkunController::class, 'buatAkun'])->name('buat-akun');
Route::post('/buat-akun', [BuatAkunController::class, 'buatAkunPost'])->name('buat-akun.post');

Route::get('/rektempat', function () {
    return view('rektempat');
});

Route::get('/lokasiwisata', [TitiklokasiController::class, 'outputLokasiWisata'])->name('lokasiwisata');
Route::get('/lokasikuliner', [WisataKulinerController::class, 'outputLokasiKuliner'])->name('lokasikuliner');
Route::get('/lokasipembelanjaan', [WisataPembelanjaanController::class, 'outputLokasiPembelanjaan'])->name('lokasipembelanjaan');

Route::post('/lokasiwisata', [TitiklokasiController::class, 'inputLokasiWisata']);
Route::post('/lokasikuliner', [WisataKulinerController::class, 'inputLokasiKuliner']);
Route::post('/lokasipembelanjaan', [WisataPembelanjaanController::class, 'inputLokasiPembelanjaan']);

Route::post('/lokasiwisata/{id}', [TitiklokasiController::class, 'destroy'])->name('hapus.wisata');
Route::post('/lokasikuliner/{id}', [WisataKulinerController::class, 'destroy'])->name('hapus.kuliner');
Route::post('/lokasipembelanjaan/{id}', [WisataPembelanjaanController::class, 'destroy'])->name('hapus.pembelanjaan');
