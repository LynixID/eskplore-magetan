    <?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\BuatAkunController;
    use App\Http\Controllers\TitiklokasiController;
    use App\Http\Controllers\WisataKulinerController;
    use App\Http\Controllers\WisataPembelanjaanController;
    use App\Http\Controllers\FeedbackController;
    
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

Route::get('/login', function () {
    return view('hlmn-login');
});

Route::get('/beranda', [BuatAkunController::class,'berandaadmin'])->name('beranda');
Route::get('/login',[BuatAkunController::class, 'login'])->name('login');
Route::post('/login',[BuatAkunController::class, 'loginPost'])->name('login.post');
Route::get('/buat-akun', [BuatAkunController::class, 'buatAkun'])->name('buat-akun');
Route::post('/buat-akun',[BuatAkunController::class, 'buatAkunPost'])->name('buat-akun.post');

// Route::get('/verifikasi', [BuatAkunController::class, 'verifikasi'])->name('verifikasi');
// Route::post('/verifikasi', [BuatAkunController::class, 'verifikasiKode'])->name('verifikasi.post');
Route::get('/ganti-password', [BuatAkunController::class,'gantiPassword'])->name('gantiPassword');
Route::post('/ganti-password', [BuatAkunController::class, 'gantiPasswordPost'])->name('gantiPassword.post');
Route::get('/berandaadmin', function () {
    return view('berandaadmin');
});

Route::get('/rektempat', function () {
    return view('rektempat');
});

Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('/proses_tambah)', [FeedbackController::class, 'proses_tambah'])->name('tambah.feedback');
Route::delete('/proses_hapus/{id})', [FeedbackController::class, 'proses_hapus'])->name('hapus.feedback');

Route::get('/lokasiwisata', [TitiklokasiController::class, 'outputLokasiWisata'])->name('lokasiwisata');
Route::get('/lokasikuliner', [WisataKulinerController::class, 'outputLokasiKuliner'])->name('lokasikuliner');
Route::get('/lokasipembelanjaan', [WisataPembelanjaanController::class, 'outputLokasiPembelanjaan'])->name('lokasipembelanjaan');


