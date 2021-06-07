<?php

use App\Http\Controllers\AgreementController;
use App\Http\Controllers\WalkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;
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

Route::prefix('pet')->middleware('auth')->group(function () {
    Route::get('/',[PetController::class, 'index'])->name('indexPet');
    Route::get('create', [PetController::class, 'create'])->name('createPet');
    Route::post('create', [PetController::class, 'store'])->name('storePet');
    Route::get('delete/{id}',[PetController::class, 'destroy'])->name('destroyPet');
    Route::get('edit/{id}',[PetController::class, 'edit'])->name('editPet');
    Route::put('update/{id}', [PetController::class, 'update'])->name('updatePet');
});

Route::prefix('walk')->middleware('auth')->group(function () {
    Route::get('',[WalkController::class, 'index'])->name('indexWalks');
    Route::get('create', [WalkController::class, 'create'])->name('createWalk');
    Route::get('{walkId}',[WalkController::class, 'show'])->name('showWalk');
    Route::post('store', [WalkController::class, 'store'])->name('storeWalk');
    Route::get('{walkId}/edit', [WalkController::class, 'edit'])->name('editWalk');
    Route::delete('{walkId}/destroy', [WalkController::class, 'destroy'])->name('destroyWalk');
});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('edit',[UserController::class, 'edit'])->name('editAddress');
    Route::put('update', [UserController::class, 'update'])->name('updateAddress');
    Route::get('my-walks', [AgreementController::class, 'myWalks'])->name('myWalks');
    Route::get('my-agreements', [AgreementController::class, 'myAgreements'])->name('myAgreements');
    Route::get('addCoins',[UserController::class, 'addCoins'])->name('addCoins');
});

Route::prefix('agreement')->middleware('auth')->group(function () {
    Route::get('{walkId}/book',[AgreementController::class, 'bookWalk'])->name('bookWalk');
    Route::get('{walkId}/accept',[AgreementController::class, 'acceptWalk'])->name('acceptWalk');
    Route::get('{walkId}/decline',[AgreementController::class, 'declineWalk'])->name('declineWalk');
});

Route::prefix('wallet')->middleware('auth')->group(function () {
    Route::get('/',[WalletController::class, 'show'])->name('showWallet');
    Route::put('updateMyWallet', [WalletController::class, 'updateMyWallet'])->name('updateWallet');
});

Route::prefix('transaction')->middleware('auth')->group(function () {
    Route::get('create',[TransactionController::class, 'create'])->name('createTransaction');
    Route::post('store', [TransactionController::class, 'store'])->name('storeTransaction');
    Route::get('payWalk/{id}/{email}/{payment}', [TransactionController::class, 'payWalk'])->name('payWalk');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
