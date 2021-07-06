<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryMasukController;
use App\Http\Controllers\CicilanController;
use App\Http\Controllers\FinancialPlanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestationController;
use App\Http\Controllers\JenisuangController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UtangController;
use App\Http\Controllers\UtangtemanController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('home');
});


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('transactions', TransactionController::class);
    Route::resource('investations', InvestationController::class);
    Route::resource('stocks', StockController::class);
    Route::resource('cicilans', CicilanController::class);
    Route::put('stocks/{stock}/tujuan', [StockController::class, 'updateTujuan'])->name('stocks.update.tujuan');
    Route::post('stocks/{stock}/jual', [StockController::class, 'jual'])->name('stocks.jual');
    Route::resource('financialplans', FinancialPlanController::class)->except('destroy');
    Route::post('financialplans/danadarurat', [FinancialPlanController::class, 'storeDanaDarurat'])->name('financialplans.danadarurat');
    Route::post('financialplans/{financialplan}/danadarurat', [FinancialPlanController::class, 'updateDanaDarurat'])->name('financialplans.danadarurat.update');
    Route::post('financialplans/danabelibarang', [FinancialPlanController::class, 'storeDanaMembeliBarang'])->name('financialplans.danabelibarang');
    Route::post('financialplans/{financialplan}/danabelibarang', [FinancialPlanController::class, 'updateDanaMembeliBarang'])->name('financialplans.danabelibarang.update');
    Route::post('financialplans/danamenabung', [FinancialPlanController::class, 'storeDanaMenabung'])->name('financialplans.danamenabung');
    Route::post('financialplans/{financialplan}/danamenabung', [FinancialPlanController::class, 'updateDanaMenabung'])->name('financialplans.danamenabung.update');
    Route::get('financialplans/{financialplan}/destroy', [FinancialPlanController::class, 'destroy'])->name('financialplans.destroy');
    Route::resource('rekenings', RekeningController::class)->except('destroy');
    Route::get('rekenings/{id}/restore', [RekeningController::class, 'restore'])->name('rekenings.restore');
    Route::post('rekenings/{rekening}/adjust', [RekeningController::class, 'adjust'])->name('rekenings.adjust');
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
