    <?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\BuatAkunController;

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

// Route::get('/home', function () {
//     return view('home');
// });
Route::get('/maps', function () {
    return view('maps');
});

Route::get('/ganti-password', function () {
    return view('ganti-password');
});

Route::get('/verifikasi', function () {
    return view('verifikasi');
});

Route::get('/buatAkun', function () {
    return view('buat-akun');
});

Route::get('/berandaadmin', [BuatAkunController::class,'berandaadmin'])->name('beranda');
Route::get('/login',[BuatAkunController::class, 'login'])->name('login');
Route::post('/login',[BuatAkunController::class, 'loginPost'])->name('login.post');
Route::get('/buat-akun', [BuatAkunController::class, 'buatAkun']);
Route::post('/buat-akun',[BuatAkunController::class, 'buatAkunPost'])->name('buat-akun.post');

Route::get('/rektempat', function () {
    return view('rektempat');
});

Route::get('/lokasiwisata', [TitiklokasiController::class, 'outputLokasiWisata'])->name('lokasiwisata');
Route::get('/lokasikuliner', [WisataKulinerController::class, 'outputLokasiKuliner'])->name('lokasikuliner');
Route::get('/lokasipembelanjaan', [WisataPembelanjaanController::class, 'outputLokasiPembelanjaan'])->name('lokasipembelanjaan');


