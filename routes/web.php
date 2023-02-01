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
    Route::get('/dailybonus', \App\Http\Livewire\Dailybonus::class);
    Route::get('/requestdeposit', \App\Http\Livewire\Requestdeposit::class);
    Route::get('/requestwd', \App\Http\Livewire\Requestwd::class);
    Route::get('/requestactivation', \App\Http\Livewire\Requestactivation::class);
    Route::get('/datamember', \App\Http\Livewire\Datamember\Datamember::class);
    Route::get('/dataadmin', \App\Http\Livewire\Dataadmin::class);
    Route::get('/datakasbon', \App\Http\Livewire\Datamember\Datakasbon::class);
    Route::get('/changepassword', \App\Http\Livewire\Changepassword::class);
});
