<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;

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

Route::get('/',[AdController::class, 'getIndex']);

Route::get('product',[AdController::class, 'getProduct']);
Route::get('product-{id}',[AdController::class, 'getProductUpdate']);
Route::post('product-{id}',[AdController::class, 'postProductUpdate']);

Route::get('cart/{action?}/{id?}',[AdController::class,'cart']);
Route::post('cart/{action?}/{id?}',[AdController::class,'cart']);

Route::get('order',[AdController::class, 'getOrder']);
Route::post('order',[AdController::class, 'postOrder']);
