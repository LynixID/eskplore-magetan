    <?php

    use App\Http\Controllers\TitiklokasiController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\FeedbackController;
    use App\Http\Controllers\WisataKulinerController;
    use App\Http\Controllers\WisataPembelanjaanController;

    // Gading Start
    Route::get('/', function () {
        return view('home');
    });
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
    Route::get('/rektempat', function () {
        return view('rektempat');
    });
    Route::get('/lokasiwisata', [TitiklokasiController::class, 'outputLokasiWisata']);
    Route::post('/lokasiwisata', [TitiklokasiController::class, 'inputLokasiWisata']);
    Route::get('/lokasikuliner', [WisataKulinerController::class, 'outputLokasiKuliner']);
    Route::post('/lokasikuliner', [WisataKulinerController::class, 'inputLokasiKuliner']);
    Route::get('/lokasipembelanjaan', [WisataPembelanjaanController::class, 'outputLokasiPembelanjaan']);
    Route::post('/lokasipembelanjaan', [WisataPembelanjaanController::class, 'inputLokasiPembelanjaan']);

    // Gading End
