<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DaftarulangController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KepalasekolahController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LulusController;
use App\Http\Controllers\PendaftaranController;
use App\Models\Daftarulang;
use App\Models\Galeri;
use App\Models\Kepalasekolah;
use App\Models\Lulus;
use App\Models\Pendaftaran;
use Illuminate\Auth\Events\Login;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Tampilan siswa
Route::get('/index',[HomeController::class, 'index']);
Route::get('/prestasi',[HomeController::class, 'prestasi']);
Route::get('/profil',[HomeController::class, 'profil']);
Route::get('/form',[HomeController::class, 'form']); 
Route::get('/daftarulang',[HomeController::class, 'daftarulang']);
Route::get('/tampilguru',[HomeController::class, 'tampilguru']); 
Route::get('/keterangan',[HomeController::class, 'keterangan']);    
Route::get('/galery',[HomeController::class, 'galery']);
Route::get('/saran',[HomeController::class, 'saran']);
Route::get('/visimisi',[HomeController::class, 'visimisi']);

// Tampilan Admin
Route::get('/indexadmin',[AdminController::class, 'indexadmin']);
Route::get('/index',[AdminController::class, 'index']);
Route::get('/kepalasekolah',[KepalasekolahController::class, 'kepalasekolah']);
Route::get('/siswa',[AdminController::class, 'siswa']);
Route::get('/guru',[AdminController::class, 'guru']);

// Tampilan kepala sekolah
Route::get('/kepsek',[HomeController::class, 'kepsek'])->name('kepsek');
Route::get('/tambahkepsek',[KepalasekolahController::class, 'tambahkepsek'])->name('tambahkepsek');
Route::post('/insertdatakepsek',[KepalasekolahController::class, 'insertdatakepsek'])->name('insertdatakepsek');
Route::get('/deletekepsek/{id}',[KepalasekolahController::class, 'deletekepsek'])->name('deletekepsek');

// Tampilan guru
Route::get('/guru',[GuruController::class, 'guru'])->name('guru');
Route::get('/tambahguru',[GuruController::class, 'tambahguru'])->name('tambahguru');
Route::post('/insertdataguru',[GuruController::class, 'insertdataguru'])->name('insertdataguru');
Route::get('/tampilkandata/{id}',[GuruController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}',[GuruController::class, 'updatedata'])->name('updatedata');
Route::get('/delete/{id}',[GuruController::class, 'delete'])->name('delete');

// Pendaftaran Admin
Route::get('/pendaftaran',[PendaftaranController::class, 'pendaftaran'])->name('pendaftaran');
Route::get('/deletedaftar/{id}',[PendaftaranController::class, 'deletedaftar'])->name('deletedaftar');
Route::post('/tambahdaftar',[PendaftaranController::class, 'tambahdaftar'])->name('tambahdaftar');
Route::post('/insertdataform',[PendaftaranController::class, 'insertdataform'])->name('insertdataform');
Route::get('/tampildaftar/{id}',[PendaftaranController::class, 'tampildaftar'])->name('tampildaftar');

// Daftar Ulang
Route::get('/index',[DaftarulangController::class, 'index'])->name('index');
Route::get('/dafulang',[DaftarulangController::class, 'dafulang'])->name('dafulang');
Route::get('/deletedafulang/{id}',[DaftarulangController::class, 'deletedafulang'])->name('deletedafulang');
Route::post('/tambahdaftarulang',[DaftarulangController::class, 'tambahdaftarulang'])->name('tambahdaftarulang');
Route::post('/insertdata',[DaftarulangController::class, 'insertdata'])->name('insertdata');
// Route::get('/insertdata', [HomeController::class, 'insertdata'])->name('Home.index1');

// Galeri siswa
Route::get('/galeri',[GaleriController::class, 'galeri'])->name('galeri');
Route::get('/tambahgaleri',[GaleriController::class, 'tambahgaleri'])->name('tambahgaleri');
Route::post('/insertgaleri',[GaleriController::class, 'insertgaleri'])->name('insertgaleri');
Route::get('/deletegaleri/{id}',[GaleriController::class, 'deletegaleri'])->name('deletegaleri');


// Siswa Lulus
Route::get('/siswa',[LulusController::class, 'siswa'])->name('siswa');
Route::get('/tambahsiswa',[LulusController::class, 'tambahsiswa'])->name('tambahsiswa');
Route::post('/insertdatasiswa',[LulusController::class, 'insertdatasiswa'])->name('insertdatasiswa');
Route::get('/tampilkandatasiswa/{id}',[LulusController::class, 'tampilkandatasiswa'])->name('tampilkandatasiswa');
Route::post('/updatedatasiswa/{id}',[LulusController::class, 'updatedatasiswa'])->name('updatedatasiswa');
Route::get('/deletedatasiswa/{id}',[LulusController::class, 'deletedatasiswa'])->name('deletedatasiswa');



// Tampilan login Admin
Route::get('/loginadmin',[LoginController::class, 'loginadmin'])->name('loginadmin');

// Tampilan login Siswa
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/formlogin',[LoginController::class, 'formlogin'])->name('formlogin');
Route::get('/registrasi',[LoginController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasiuser',[LoginController::class, 'registrasiuser'])->name('registrasiuser');