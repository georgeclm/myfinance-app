<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UtangController;
use App\Http\Controllers\UtangtemanController;
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
    return redirect()->route('login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('rekenings', RekeningController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('utangs', UtangController::class);
    Route::resource('utangtemans', UtangtemanController::class);
});
