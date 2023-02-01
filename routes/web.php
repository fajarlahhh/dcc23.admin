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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', \App\Http\Livewire\Dashboard::class);
    Route::get('/', \App\Http\Livewire\Dashboard::class);
    Route::get('/balance', \App\Http\Livewire\Balance::class);
    Route::get('/downline', \App\Http\Livewire\Downline::class);
    Route::get('/bonus', \App\Http\Livewire\Bonus::class);
    Route::get('/renewal', \App\Http\Livewire\Renewal::class);
    Route::group(['middleware' => ['administrator']], function () {
        Route::get('/dailybonus', \App\Http\Livewire\Dailybonus::class);
        Route::get('/requestdeposit', \App\Http\Livewire\Requestdeposit::class);
        Route::get('/requestwd', \App\Http\Livewire\Requestwd::class);
        Route::get('/requestactivation', \App\Http\Livewire\Requestactivation::class);
        Route::get('/datamember', \App\Http\Livewire\Datamember\Datamember::class);
        Route::get('/datakasbon', \App\Http\Livewire\Datamember\Datakasbon::class);
    });
});
