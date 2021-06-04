<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryMasukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisuangController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UtangController;
use App\Http\Controllers\UtangtemanController;
use App\Models\Category;
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
    return view('portfolio.english');
})->name('english');
Route::get('/in', function () {
    return view('portfolio.indonesia');
})->name('indo');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('transactions', TransactionController::class);
    Route::resource('rekenings', RekeningController::class)->except('destroy');
    Route::get('rekenings/{id}/restore', [RekeningController::class, 'restore'])->name('rekenings.restore');
    Route::get('rekenings/{rekening}/destroy', [RekeningController::class, 'destroy'])->name('rekenings.destroy');
    Route::get('jenisuangs/{jenisuang}', [JenisuangController::class, 'show'])->name('jenisuangs.show');
    Route::resource('utangs', UtangController::class);
    Route::resource('utangtemans', UtangtemanController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('category_masuks', CategoryMasukController::class);
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('categories/{category}/remove', [CategoryController::class, 'remove'])->name('categories.remove');
    Route::get('category_masuks/{category}/remove', [CategoryMasukController::class, 'remove'])->name('category_masuks.remove');
});
