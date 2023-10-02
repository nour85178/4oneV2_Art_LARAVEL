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
Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Dashboard::class, 'index']);
    //eli bech yzid urelet fel back yzidhom te7t hedhi ya bbiet
});

Route::middleware(['auth', 'client'])->group(function () {
    Route::get('/front', [App\Http\Controllers\TemplateController::class, 'index']);
    //eli bech yzid urelet fel front yzidhom te7t hedhi ya bbiet
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
