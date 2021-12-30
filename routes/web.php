<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DvdController;

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

Route::prefix('admin')->group(function () {
    Route::get('/panel', function () {
        return view('admin.dashboard');
    })->middleware(['auth'])->name('admin.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/list/movies', [DvdController::class, 'movieList'])
            ->middleware('auth')
            ->name('movies.list');

Route::get('/movies/{id}/rent', [DvdController::class, 'movieFormRent'])
            ->middleware('auth');
Route::post('/movies/{id}/rent', [DvdController::class, 'movieRent'])
            ->middleware('auth')
            ->name('movies.rent');

require __DIR__.'/auth.php';
