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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::post('login', 'UserController@login');
Route::post('loginAdmin', 'AdminController@login');

Route::post('register', 'UserController@register');
Route::get('allUsers', 'UserController@getAllUsers');
Route::post('deleteUser', 'UserController@delete');
Route::post('deleteProduct', 'ProduitController@delete');
Route::get('allProduct', 'ProduitController@getAll');
Route::post('updateProduct', 'ProduitController@update');
Route::post('addImage/{id}', 'ImageController@addImage');
Route::get('Product/{id}', 'ProduitController@getProductByid');

Route::post('acheterProduct/{idUser}/{idProduct}', 'ItemController@acheterProduit');
Route::post('addProduct', 'ProduitController@addProduct');
Route::group(['middleware' => 'auth.jwt'], function () {

});
