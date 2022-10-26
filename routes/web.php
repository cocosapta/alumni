<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Role;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:user']], function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/home', 'index');
            Route::get('/pesan', 'pesan');
            Route::get('/data1', 'data');
            Route::get('/kirim', 'kirim');
            Route::get('/reply', 'reply');
            Route::post('/pesan.post', 'update');
        });
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->middleware('auth');
        Route::get('/alumni', 'alumni')->middleware('auth');
        Route::get('/admin', 'admin')->middleware('auth');
        Route::get('/him', 'him')->middleware('auth');
        Route::get('/data', 'data')->middleware('auth');
        Route::get('/user', 'user')->middleware('auth');
        Route::get('/pesan1', 'pesan')->middleware('auth');
        Route::get('/delete.alumni/{id}', 'delete_alumni');
        Route::get('/delete.pesan/{id_broadcast}', 'delete_pesan');
        Route::get('/delete/{id}', 'delete');
        Route::post('/store', 'store');
        Route::post('/store.alumni', 'store_alumni');
        Route::post('/update.alumni/{id}', 'update_alumni');
        Route::post('/update/{id}', 'update');
        Route::post('/add.pesan', 'add_pesan');
        Route::post('/edit.pesan/{id}', 'edit_pesan');
        Route::post('/add', 'add');
    });
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
