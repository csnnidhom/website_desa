<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\LoginController;
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
    Route::resource('/admin/kategori', CategoryController::class);
    // Route::resource('/admin/image', ImageController::class);
    // Route::resource('/admin/video', VideoController::class);
});


//user
Route::get('/', [UserController::class, 'home']);
Route::get('/berita/detail/{id}', [UserController::class, 'detail']);
Route::get('/visi_misi', [UserController::class, 'visi_misi']);
Route::get('/struktur_organisasi', [UserController::class, 'struktur_organisasi']);
Route::get('/organisasi', [UserController::class, 'organisasi']);
Route::get('/organisasi/kartar', [UserController::class, 'kartar']);
Route::get('/kontak', [UserController::class, 'kontak']);
