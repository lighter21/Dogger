<?php

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
    return view('welcome');
});

Route::get('pages/create',  [
    'uses' => 'PetController@create' ,
    'as' => 'pages.create'
]);
Route::post('pages/store',  [
    'uses' => 'PetController@store' ,
    'as' => 'pages.store'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

