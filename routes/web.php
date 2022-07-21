<?php

use App\Http\Controllers\Admin\DatasetController as AdminDatasetController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', [PageController::class, 'index']);
// Route::get('/book', [UserBookController::class, 'index']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role'])->group(function(){
    
    Route::prefix('/u')->group(function(){
        Route::controller(AdminHomeController::class)->group(function(){
            Route::get('dashboard', 'index');
            Route::put('update_profile', 'update_profile');
            Route::get('change_password', 'change_password');
            Route::put('update_password', 'update_password');
        });

        Route::controller(AdminUserController::class)->group(function(){
            // Route::get('add_profile', 'add');
            
            Route::get('admins', 'get_admin');
            Route::get('markets', 'get_market');
            Route::get('collectors', 'get_collector');
            Route::get('farmers', 'get_farmer');

            Route::post('admins', 'add_admin');
            Route::get('admins/{id}/edit', 'edit_admin');
            Route::put('admins/{id}', 'update_admin');
            
            Route::get('customers', 'get_customer');

            Route::get('users/create', 'create');
            Route::post('users', 'store');
            Route::delete('users/{id}', 'destroy');
        });

        Route::controller(AdminDatasetController::class)->group(function(){
            Route::get('/dataset', 'index');
            Route::get('/dataset/create', 'create');
            Route::post('/dataset', 'store');
            Route::get('/dataset/{id}/edit', 'edit');
            Route::put('/dataset/{id}', 'update');
        });

        Route::resource('news', AdminNewsController::class);
    });
});
