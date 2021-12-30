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
Route::get('/list/myrents', [DvdController::class, 'userRents'])
            ->middleware('auth')
            ->name('user.movies.rent');

Route::get('/movies/{id}/rent', [DvdController::class, 'movieFormRent'])
            ->middleware('auth');
Route::post('/movies/{id}/rent', [DvdController::class, 'movieRent'])
            ->middleware('auth')
            ->name('movies.rent');
Route::get('/movies/inrent', [DvdController::class, 'moviesInRent'])
            ->middleware('auth')
            ->name('movies.inrent');
Route::get('/movies/returned', [DvdController::class, 'moviesReturned'])
            ->middleware('auth')
            ->name('movies.returned');

Route::post('/rent/{id}/return', [DvdController::class, 'returnMovie'])
            ->middleware('auth')
            ->name('movies.return');

Route::resource('movies', 'App\Http\Controllers\DvdController', [
    'names' => [
        'index' => 'movies.index',
    ]
])->middleware('auth');

Route::resource('clients', 'App\Http\Controllers\ClientController', [
    'names' => [
        'index' => 'clients.index',
    ]
])->middleware('auth');

Route::resource('sales', 'App\Http\Controllers\SaleController', [
    'names' => [
        'index' => 'sales.index',
    ]
])->middleware('auth');

require __DIR__.'/auth.php';
