<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletGroupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\forgotPasswordController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// login, forgot password, & register route
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/forgot-password', [forgotPasswordController::class, 'index'])->middleware('guest');
Route::post('/forgot-password', [forgotPasswordController::class, 'email']);
Route::get('/reset-password/{fpas:code}', [forgotPasswordController::class, 'edit']);
Route::post('/reset-password/{fpas}', [forgotPasswordController::class, 'update']);

Route::get('/update-password', [forgotPasswordController::class, 'check'])->middleware('auth');
Route::post('/update-password', [forgotPasswordController::class, 'change']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//dashboard route
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/month/{month}', [DashboardController::class, 'month'])->middleware('auth');


//transaction route
Route::resource('/transaction', TransactionController::class)->middleware('auth');

Route::resource('/category', CategoryController::class)->middleware('auth');

//wallet reoute
Route::resource('/walletgroup', WalletGroupController::class)->middleware('auth');

Route::resource('/wallet', WalletController::class)->middleware('auth');