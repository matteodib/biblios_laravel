<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/books', [ApiController::class, 'index']);
Route::get('/args', [ApiController::class, 'args']);
Route::get('/arguments', [ApiController::class, 'arguments']);
Route::get('/publishers', [ApiController::class, 'publishers']);

Route::post('/add', [ApiController::class, 'store'])->middleware('auth:sanctum');
Route::delete('/delete/{id}', [ApiController::class, 'destroy'])->middleware('auth:sanctum');
Route::put('/put/{id}', [ApiController::class, 'put']);
Route::get('/book/{id}', [ApiController::class, 'show']);

Route::post('/angularlogin', [ApiController::class, 'angularlogin']);
Route::post('/setprestito', [ApiController::class, 'setPrestito']);
Route::get('/getprestiti/{id}', [ApiController::class, 'getPrestiti']);
Route::post('/notify', [ApiController::class, 'notifyPrestito']);