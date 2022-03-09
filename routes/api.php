<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// //Chiamo il JSON di Restaurant
// Route::get('ristoranti','Api\RestaurantController@index');


//Chiamo il JSON di Type
Route::get('tipo','Api\TypeController@index');

//Chiamata Json Ristoranti
// Chiamata Json Ristoranti cliccando su Type
Route::namespace('Api')
    ->prefix('ristoranti')
    ->group(function(){
    Route::get('/','RestaurantController@index');
    Route::get('/{slug}', 'RestaurantController@show');
    Route::get('tiporistorante/{slug}', 'RestaurantController@getRestaurantsByTypes');
    });


    //Rotte per l'Api Orders Pagamenti BrainTree
    Route::get('orders/generate', 'Api\OrderController@generate');
    Route::post('orders/makepayment', 'Api\OrderController@makePayment');