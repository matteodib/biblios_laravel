<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminBooksController;
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
    return view('layouts.template');
});
Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/book/create', function () {
    return view('books.create');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function(){
    return view('admin.index');
})->middleware(['admin']);

Route::resource('books', BookController::class);
Route::resource('admin', AdminController::class);
Route::resource('abooks', AdminBooksController::class);

require __DIR__.'/auth.php';
