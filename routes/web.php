<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletGroupController;
use App\Http\Controllers\CategoryController;


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

// login & register route
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', [IndexController::class, 'index'])->middleware('auth');

//transaction route
Route::resource('/transaction', TransactionController::class)->middleware('auth');

Route::resource('/category', CategoryController::class)->middleware('auth');

//wallet reoute
Route::resource('/walletgroup', WalletGroupController::class)->middleware('auth');

Route::resource('/wallet', WalletController::class)->middleware('auth');