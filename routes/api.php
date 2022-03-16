<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BeritaController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('admin/berita', [BeritaController::class, 'index']);
    Route::post('admin/create', [BeritaController::class, 'store']);
    Route::get('admin/edit/{id}', [BeritaController::class, 'edit']);
    Route::post('admin/edit/{id}', [BeritaController::class, 'update']);
    Route::get('admin/delete/{id}', [BeritaController::class, 'destroy']);
    Route::get('admin/logout', [AuthController::class, 'logout']);
});

Route::post('/admin/login', [AuthController::class, 'login'])->name('login');
