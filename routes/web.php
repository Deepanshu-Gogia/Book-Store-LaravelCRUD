<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('books', [App\Http\Controllers\BookController::class, 'index']);
Route::get('create-book', [App\Http\Controllers\BookController::class, 'create']);
Route::post('store-book', [App\Http\Controllers\BookController::class, 'store']);
Route::get('create-book', [App\Http\Controllers\BookController::class, 'create']);
Route::get('edit-book/{id}', [App\Http\Controllers\BookController::class, 'edit']);
Route::post('update-book/{id}', [App\Http\Controllers\BookController::class, 'update']);
Route::get('destroy-book/{id}', [App\Http\Controllers\BookController::class, 'destroy']);

