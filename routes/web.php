<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\DatasetController as AdminDatasetController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\BookController as UserBookController;
use App\Http\Controllers\User\CartController as UserCartController;
use App\Http\Controllers\User\HomeController as UserHomeController;
use App\Http\Controllers\User\SettingController as UserSettingController;
use App\Http\Controllers\User\TransactionController as UserTransactionController;
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
// Route::get('/', [UserBookController::class, 'index']);
// Route::get('/book', [UserBookController::class, 'index']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role'])->group(function(){
    
    Route::prefix('/u')->group(function(){
        Route::controller(HomeController::class)->group(function(){
            Route::get('dashboard', 'index');
            Route::put('update_profile', 'update_profile');
            Route::get('change_password', 'change_password');
            Route::put('update_password', 'update_password');
        });

        Route::controller(UserController::class)->group(function(){
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
        });
    });
});
