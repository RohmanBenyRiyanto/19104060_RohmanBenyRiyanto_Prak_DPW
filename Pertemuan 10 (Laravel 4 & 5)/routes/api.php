<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Menampilkan data siswa melalui API
Route::get('/mahasiswa', [studentApiController::class, 'index']);
Route::get('/mahasiswa/{id}', [studentApiController::class, 'getById']);
Route::get('/mahasiswa/by_nim/{nim}', [studentApiController::class, 'getByNim']);

// Menambah data siswa melalui API
Route::post('/mahasiswa', [studentApiController::class, 'save']);

// Mengubah data siswa melalui API
Route::put('/mahasiswa/{id}', [studentApiController::class, 'update']);

// Menghapus data siswa melalui API
Route::delete('/mahasiswa/{id}', [studentApiController::class, 'delete']);