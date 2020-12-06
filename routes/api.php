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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/teste', function ($id) {
    
});

Route::post('login'   , 'Acesso\\ApiController@login');
Route::post('register', 'Acesso\\ApiController@register');


Route::group(['middleware' => 'auth.jwt'], function () {

    Route::post('logout', 'Acesso\\ApiController@logout');
    Route::get ('me'    , 'Acesso\\ApiController@me');
    
    // ------------------------------------------------
    // Integrações
    // ------------------------------------------------
    Route::put ('integracao/clientes'    , 'Integracao\\IntegracaoController@integrarClientes');

    // ------------------------------------------------
    // Dados
    // ------------------------------------------------
    Route::resource('clientes', 'ClienteController');
    Route::resource('dividas' , 'DividaController');

});


