<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminBooksController;
use App\Http\Controllers\PrestitiController;
use App\Http\Controllers\AdminLoansController;
use App\Http\Controllers\AdminAuthorsController;
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
    return redirect('/login');
})->middleware(['auth']);
//Route::get('/admin', function () {
//    return view('admin.index');
//});
Route::get('/book/create', function () {
    return view('books.create');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
//
//Route::get('/admin', function(){
//    return view('admin.index');
//})->middleware(['admin']);

Route::get('/admin/books', [AdminBooksController::class, 'index']);
Route::get('/admin/loans', [AdminLoansController::class, 'index']);
Route::get('/admin/authors', [AdminAuthorsController::class, 'index']);
Route::resource('books', BookController::class);
Route::resource('admin', AdminController::class);
Route::resource('abooks', AdminBooksController::class);
Route::resource('loans', PrestitiController::class);
Route::resource('/admin/aloans', AdminLoansController::class);
Route::resource('/admin/authors', AdminAuthorsController::class);

Route::get('/{id}/restituisci', [AdminLoansController::class, 'restituisci'])->name('loans.resituisci');
require __DIR__.'/auth.php';
