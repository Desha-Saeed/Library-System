<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',  [BooksController::class,"show"]);
Route::resource('books', BooksController::class);
Route::resource('categories', App\Http\Controllers\CategoryController::class)->middleware(['auth','admin']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('Author', AuthorsController::class)->middleware(['auth','admin']);
Route::get('dashboard', function() {return view('dashborder');})->middleware(['auth','admin']);
Route::resource('admin', adminController::class)->middleware(['auth','admin']);

// Route::put('/post/{id}', function (string $id) {
    // ...