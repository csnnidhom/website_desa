<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\VideoController;
use GuzzleHttp\Middleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/admin/login', [LoginController::class, 'login'])->name('login');
Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('/admin/dashboard', DashboardController::class);
    Route::resource('/admin/berita', BeritaController::class);
    Route::resource('/admin/kategori', CategoryController::class);
    Route::resource('/admin/image', ImageController::class);
    Route::resource('/admin/video', VideoController::class);
});


//user
Route::get('/', [UserController::class, 'home']);
Route::get('/home', [UserController::class, 'home']);
Route::get('/sejarah_desa', [UserController::class, 'sejarah_desa']);
Route::get('/berita', [BeritaController::class, 'tampil_berita']);
Route::get('/berita_detail/{id}', [BeritaController::class, 'detail_berita']);
