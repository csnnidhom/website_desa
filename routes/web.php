<?php

use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Controllers\Admin\VideoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//login
Route::get('/admin', [LoginController::class, 'login'])->name('login');
Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    Route::resource('/admin/berita', BeritaController::class);
    Route::get('/admin/berita/status/{id}', [BeritaController::class, 'ubahStatus']);
    // Route::resource('/admin/kategori', CategoryController::class);
    Route::resource('/admin/anggota', AnggotaController::class);
    Route::resource('/admin/pesan', PesanController::class);
    // Route::resource('/admin/image', ImageController::class);
    // Route::resource('/admin/video', VideoController::class);
});


//user
Route::get('/', [UserController::class, 'home']);
Route::get('/berita/detail/{id}', [UserController::class, 'detail']);
Route::get('/visi_misi', [UserController::class, 'visi_misi']);
Route::get('/struktur_organisasi', [UserController::class, 'struktur_organisasi_desa']);
Route::get('/organisasi', [UserController::class, 'organisasi']);

Route::get('/organisasi/kartar', [UserController::class, 'kartar'])->name('kartar');
Route::get('/organisasi/kartar/struktur_organisasi', [UserController::class, 'struktur_organisasi_kartar'])->name('struktur_organisasi_kartar');
Route::get('/organisasi/kartar/galeri', [UserController::class, 'galeri_kartar'])->name('galeri_kartar');
Route::get('/organisasi/kartar/berita', [UserController::class, 'berita_kartar'])->name('berita_kartar');

Route::get('/organisasi/remas', [UserController::class, 'remas'])->name('remas');
Route::get('/organisasi/remas/struktur_organisasi', [UserController::class, 'struktur_organisasi_remas'])->name('struktur_organisasi_remas');
Route::get('/organisasi/remas/galeri', [UserController::class, 'galeri_remas'])->name('galeri_remas');
Route::get('/organisasi/remas/berita', [UserController::class, 'berita_remas'])->name('berita_remas');

Route::get('/organisasi/asm_putra', [UserController::class, 'asm_putra'])->name('asm_putra');
Route::get('/organisasi/asm_putra/struktur_organisasi', [UserController::class, 'struktur_organisasi_asm_putra'])->name('struktur_organisasi_asm_putra');
Route::get('/organisasi/asm_putra/galeri', [UserController::class, 'galeri_asm_putra'])->name('galeri_asm_putra');
Route::get('/organisasi/asm_putra/berita', [UserController::class, 'berita_asm_putra'])->name('berita_asm_putra');

Route::get('/kontak', [UserController::class, 'kontak']);
Route::post('/kontak', [UserController::class, 'kirim_pesan'])->name('kirim_pesan');
