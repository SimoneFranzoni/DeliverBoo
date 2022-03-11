<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('guest.home');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('index');
        
        // Rotte dei ristoranti
        Route::resource('miei-ristoranti','RestaurantsController');

        // Rotte dei piatti in relazione al singolo ristorante
        Route::resource('miei-ristoranti.piatti','RestaurantPlatesController');

        // Rette ordini
        
    });

    Route::namespace('Admin')
    ->name('admin.')
    ->prefix('review')
    ->group(function(){
        Route::resource('miei-ristoranti.ordini','OrdersController');
    });


Route::get('{any?}', function() {
  return view('guest.home');
})->where('any', '.*')->name('home');
