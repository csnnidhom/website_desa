<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BeritaController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function () {



    Route::get('admin/logout', [AuthController::class, 'logout']);
});

Route::post('admin/login', [AuthController::class, 'login'])->name('login');

//vue
Route::resource('admin/berita', BeritaController::class);
Route::resource('admin/kategori', CategoryController::class);
Route::resource('admin/image', ImageController::class);
Route::resource('admin/video', VideoController::class);
