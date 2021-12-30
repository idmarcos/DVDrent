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
    return redirect('login');
});


Route::middleware(['auth'])->group(function () {

    Route::middleware(['isAdmin'])->group(function () {

        Route::get('/admin/panel', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/movies/inrent', [DvdController::class, 'moviesInRent'])
            ->name('movies.inrent');

        Route::get('/movies/returned', [DvdController::class, 'moviesReturned'])
            ->name('movies.returned');

        Route::post('/movies/{id}/available', [DvdController::class, 'movieAvailable'])
            ->name('movies.available');

        Route::resource('movies', 'App\Http\Controllers\DvdController', [
            'names' => [
                'index' => 'movies.index',
            ]
        ]);
        
        Route::resource('clients', 'App\Http\Controllers\ClientController', [
            'names' => [
                'index' => 'clients.index',
            ]
            ]);
        
        Route::resource('sales', 'App\Http\Controllers\SaleController', [
            'names' => [
                'index' => 'sales.index',
            ]
        ]);

    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/list/movies', [DvdController::class, 'movieList'])
            ->name('movies.list');

    Route::get('/list/myrents', [DvdController::class, 'userRents'])
            ->name('user.movies.rent');
        
    Route::get('/movies/{id}/rent', [DvdController::class, 'movieFormRent']);

    Route::post('/movies/{id}/rent', [DvdController::class, 'movieRent'])
            ->name('movies.rent');

    Route::post('/rent/{id}/return', [DvdController::class, 'returnMovie'])
            ->name('movies.return');

});

require __DIR__.'/auth.php';