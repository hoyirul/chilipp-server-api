<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\api\DatasetController;
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
        Route::get('/', 'index');
        Route::get('sort_permintaan/{berita}', 'sort_permintaan');
        Route::get('sort_ketersediaan/{berita}', 'sort_ketersediaan');
        Route::get('sort_harga/{berita}', 'sort_harga');
        Route::get('probabilitas_kelas', 'probabilitas_kelas');
    });
});

Route::controller(UserController::class)->group(function(){
    Route::get('/user', 'index');
    Route::get('/user/{id}/show', 'show');
    Route::post('/login', 'auth');
    Route::post('/register', 'register')->name('register');
});