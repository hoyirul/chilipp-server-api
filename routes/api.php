<?php

use App\Http\Controllers\api\DatasetController;
use App\Http\Controllers\Api\PredictController;
use App\Http\Controllers\api\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(DatasetController::class)->group(function(){
    Route::prefix('dataset')->group(function(){
        Route::get('/', 'index'); // Untuk menampilkan grafik
        Route::get('sort_permintaan/{berita}', 'sort_permintaan');
        Route::get('sort_ketersediaan/{berita}', 'sort_ketersediaan');
        Route::get('sort_harga/{berita}', 'sort_harga');
        Route::get('probabilitas_kelas', 'probabilitas_kelas');
        Route::get('sampel_data', 'sampel_data');
        Route::get('ketersediaan', 'ketersediaan'); // untuk halaman HOME -> Volume
    });
});

// Ini untuk halaman prediksi harga dan prediksi berita
Route::controller(PredictController::class)->group(function(){
    Route::prefix('predict')->group(function(){
        Route::get('news', 'news_predict');
        Route::get('price', 'price_predict');
    });
});

Route::post('dataset/{id}/berita', [DatasetController::class, 'update']);

// Ini untuk halaman login, register, profil dan ubah password
Route::controller(UserController::class)->group(function(){
    Route::get('/user', 'index');
    Route::post('/user/{id}/password', 'update_password');
    Route::post('/user/{id}/profile', 'update_profile');
    Route::get('/user/{id}/show', 'show');
    Route::post('/stop_loss/{id}', 'stop_loss');
    Route::post('/login', 'auth');
    Route::post('/register', 'register')->name('register');
});