<<<<<<< HEAD
    <?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\BuatAkunController;
    use App\Http\Controllers\FeedbackController;
    use App\Http\Controllers\TitiklokasiController;
=======
<?php
use App\Http\Controllers\TitiklokasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
>>>>>>> 42a9000c09afd5f27553260852157307e578c2ba

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/feedback', function () {
        return view('feedback');
    });

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::post('/proses_tambah)', [FeedbackController::class, 'proses_tambah'])->name('tambah.feedback');
    Route::delete('/proses_hapus/{id})', [FeedbackController::class, 'proses_hapus'])->name('hapus.feedback');

<<<<<<< HEAD
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

    Route::get('/login', [BuatAkunController::class, 'login'])->name('login');
    Route::post('/login', [BuatAkunController::class, 'loginPost'])->name('login.post');
    Route::get('/buat-akun', [BuatAkunController::class, 'buat-akun'])->name('buat-akun');
    Route::post('/buat-akun', [BuatAkunController::class, 'buatAkunPost'])->name('buat-akun.post');

    Route::post('/feedback', [FeedbackController::class, 'proses_tambah'])->name('tambah.feedback');
    Route::get('/feedback', [FeedbackController::class, 'index']);
    Route::post('/feedback', [FeedbackController::class, 'proses_hapus'])->name('hapus.feedback');

    Route::get('/buat-akun', [TitiklokasiController::class, 'buatAkunPost']);
=======
    Route::get('/maps', [TitiklokasiController::class, 'index']);
    Route::get('/tambahlokasi', [TitiklokasiController::class, 'read']);
    Route::post('/tambahlokasi', [TitiklokasiController::class, 'create']);
    Route::delete('/tambahlokasi/{id}', [TitiklokasiController::class, 'destroy']);


    Route::get('/rektempat', function () {
        return view('rektempat');
    });

>>>>>>> 42a9000c09afd5f27553260852157307e578c2ba
