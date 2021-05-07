<?php

use App\Http\Controllers\WalkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
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
    Route::get('/',[PetController::class, 'index'])->name('indexPet');
    Route::get('create', [PetController::class, 'create'])->name('createPet');
    Route::post('create', [PetController::class, 'store'])->name('storePet');
    Route::get('delete/{id}',[PetController::class, 'destroy'])->name('destroyPet');
});


Route::prefix('walk')->group(function () {
    Route::get('',[WalkController::class, 'index'])->name('indexWalks');
    Route::get('create', [WalkController::class, 'create'])->name('createWalk');
    Route::get('{walkId}',[WalkController::class, 'show'])->name('showWalk');
    Route::post('store', [WalkController::class, 'store'])->name('storeWalk');
});

Route::prefix('user')->group(function () {
    Route::get('edit/{id}',[UserController::class, 'edit'])->name('editAddress');
    Route::put('update/{id}', [UserController::class, 'update'])->name('updateAddress');
});

Route::get('edit/{id}',[PetController::class, 'edit'])->name('editPet');
Route::put('update/{id}', [PetController::class, 'update'])->name('updatePet');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
