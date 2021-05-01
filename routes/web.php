<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Auth;

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

Route::prefix('pet')->group(function () {
    Route::get('create', [PetController::class, 'create'])->name('createPet');
    Route::post('create', [PetController::class, 'store'])->name('storePet');
});


Route::get('index',[PetController::class, 'index']);
Route::get('delete/{id}',[PetController::class, 'destroy']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
