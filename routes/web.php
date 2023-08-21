<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/','UserController@index');
// Route::post('/product',[UserController::class, 'store'])->name('store');

Route::post('/store-user', [UserController::class , 'store'])->name('store.user');

Route::get('/product', [ProductController::class, 'index']);

// Route::get('/product/view', [ProductController::class, ''])

