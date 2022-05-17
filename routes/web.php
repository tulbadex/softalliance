<?php

use App\Http\Controllers\MovieCommentsController;
use App\Http\Controllers\MovieController;
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

/* Route::get('/', function () {
    // return view('welcome');
    return Route::redirect('/', '/api/movies');
}); */
Route::redirect('/', '/movies');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::controller(MovieController::class)->group(function ()
{
    Route::get('/movies', 'index')->name('movie.index');
    Route::get('/movies/create', 'showForm');
    Route::get('/movies/{movie:slug}', 'show')->name('movie.show');
    Route::post('/movies/create', 'create')->name('movie.create');
});

Route::post('movies/{movie:slug}/comments', [MovieCommentsController::class, 'store']);

require __DIR__.'/auth.php';
