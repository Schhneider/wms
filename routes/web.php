<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartsController;
use App\Http\Controllers\Parts2Controller;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ImagesController;
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





Route::redirect('/', 'home');
Route::resource('home', PartsController::class); 
Route::resource('/allstock', Parts2Controller::class);
Route::get('/partin', 'App\Http\Controllers\PartsController@Create');
Route::resource('partout', Parts2Controller::class);
Route::get('/partout', 'App\Http\Controllers\Parts2Controller@Create');
Route::resource('image', ImagesController::class);
Route::get('/partin/image/{part_nr}', 'App\Http\Controllers\ImagesController@Create');
Route::get('/partin/image/{part_nr}/edit', 'App\Http\Controllers\ImagesController@Edit');
Route::put('/partin/image/{part_nr}/update', 'App\Http\Controllers\ImagesController@Update');
Route::get('/stockrep', 'App\Http\Controllers\PartsController@show');
Route::get('/stockrep', 'App\Http\Controllers\HistoryController@show');
Route::get('/search_stock', 'App\Http\Controllers\PartsController@search');