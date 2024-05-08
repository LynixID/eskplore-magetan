    <?php

    use App\Http\Controllers\TitiklokasiController;
    use Illuminate\Support\Facades\Route;


    Route::get('/', function () {
        return view('home');
    });

    Route::get('/feedback', function () {
        return view('feedback');
    });


    Route::get('/maps', [TitiklokasiController::class, 'index']);
    Route::get('/tambahlokasi', [TitiklokasiController::class, 'read']);
    Route::post('/tambahlokasi', [TitiklokasiController::class, 'create']);
    Route::delete('/tambahlokasi/{id}', [TitiklokasiController::class, 'destroy']);


    Route::get('/rektempat', function () {
        return view('rektempat');
    });
