<?php
//rida
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\tahunController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\NotifikasiController;
use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    if (Auth::check()) {
        return view('welcome');
    } else {
        return view('login');
    }
});
Route::get('/', function () {
    return view('pengguna.index');
});
Route::get('/informasi', function () {
    return view('pengguna/informasi');
});
Route::get('/hubungikami', function () {
    return view('pengguna/hubungikami');
});
Route::get('/', function () {
    return view('pengguna/index');
});

//home umum
//Route::get('/pengguna/index', [PenggunaController::class, 'index'])->name('pengguna.index');

Route::group(['middleware' => ['auth','hakakses:admin']], function(){
    Route::resource('users', UserController::class);
});

Route::group(['middleware' => 'auth'], function() {
    //kelola data
    Route::get('/olahdata', [RekapController::class, 'index'])->name('olahdata')->middleware('auth');
    Route::get('/desa-per-kecamatan/{kecamatan}', [RekapController::class, 'DesaPerKecamatan']);

    Route::get('/tambahdata', [RekapController::class, 'tambahdata'])->name('tambahdata');
    Route::post('/tambahdesa', [RekapController::class, 'tambahdesa'])->name('tambahdesa');
    Route::post('/tambahkecamatan', [RekapController::class, 'tambahkecamatan'])->name('tambahkecamatan');
    Route::post('/insertdata', [RekapController::class, 'insertdata'])->name('insertdata');
    Route::get('/getDesas/{kecamatan_id}', [RekapController::class, 'getDesasByKecamatan']);
    //Route::get('/getDesas/{kecamatanId}', [RekapController::class, 'getDesas']);

    //import
    Route::post('/import', [RekapController::class, 'import'])->name('import');

    // Rute untuk menampilkan form edit data
    Route::get('/tampilkandata/{id}', [RekapController::class, 'tampilkandata'])->name('tampilkandata');
    // Rute untuk memproses pembaruan data
    Route::put('/updatedata/{id}', [RekapController::class, 'updatedata'])->name('updatedata');

    Route::delete('/hapusdata/{id}', [RekapController::class, 'hapusdata'])->name('hapusdata');

    Route::get('/tahundata', [tahunController::class, 'datatahun']);

    //HakAkses
    /* Route::resource('users', UserController::class); */

    //edit profil
    Route::get('/profile/edit', [EditProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
    // Memproses perubahan profil
    Route::post('/profile/update', [EditProfileController::class, 'update'])->name('profile.update')->middleware('auth');

    //cetak pdf
    Route::get('/cetakpdf', [RekapController::class, 'cetakpdf'])->name('cetakpdf');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//PenggunaUmum
Route::get('/home',[PenggunaController::class, 'index']);
//notifikasi
Route::get('/hubungikami', [NotifikasiController::class, 'hubungikami'])->name('contact.form');
Route::post('/hubungikami', [NotifikasiController::class, 'store'])->name('contact.submit');
Route::get('/notifications', [NotifikasiController::class, 'index'])->name('notification.notifikasi');
Route::patch('/notifications/respond/{id}', [NotifikasiController::class, 'markAsResponded'])->name('notification.respond');

/* Route::get('/', function () {
    return view('pengguna.index');
}); */

