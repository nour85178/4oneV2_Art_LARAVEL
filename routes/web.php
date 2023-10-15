<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ProductController;
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
    Route::get('/users', [App\Http\Controllers\Admin::class,'index'])->name('users.index');
    Route::get('/users/{user}/edit', [App\Http\Controllers\Admin::class,'edit'])->name('users.edit');
    Route::put('/users/{user}/update', [App\Http\Controllers\Admin::class,'update'])->name('users.update');
    Route::delete('/users/{user}/delete', [App\Http\Controllers\Admin::class,'destroy'])->name('users.destroy');
    Route::get('/users/create', [App\Http\Controllers\Admin::class,'create'])->name('users.create');
    Route::post('/users/store', [App\Http\Controllers\Admin::class,'store'])->name('users.store');
    Route::resource('reviews', ReviewController::class);
    Route::get('reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::put('reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::get('reviews/{review}/show', [ReviewController::class, 'show'])->name('reviews.show');
    Route::delete('reviews/{review}/delete', [ReviewController::class, 'delete'])->name('reviews.delete');
    Route::post('reviews/store', [ReviewController::class, 'store'])->name('reviews.store');
    Route::put('reviews/{review}/update', [ReviewController::class, 'update'])->name('reviews.update');
    Route::resource('requests', RequestController::class);
    Route::get('requests/create', [RequestController::class, 'create'])->name('requests.create');
    Route::put('requests/{request}/edit', [RequestController::class, 'edit'])->name('requests.edit');
    Route::get('requests/{request}/show', [RequestController::class, 'show'])->name('requests.show');
    Route::delete('requests/{request}/delete', [RequestController::class, 'delete'])->name('requests.delete');
    Route::post('requests/store', [RequestController::class, 'store'])->name('requests.store');

    Route::get('/commandes', [App\Http\Controllers\CommandeController::class, 'index'])->name('commandes.index');
    Route::get('/commandes/create', [App\Http\Controllers\CommandeController::class, 'create'])->name('commandes.create');
    Route::post('/commandes', [App\Http\Controllers\CommandeController::class, 'store'])->name('commandes.store');
    Route::get('/commandes/{commande}', [App\Http\Controllers\CommandeController::class, 'show'])->name('commandes.show');
    Route::get('/commandes/{commande}/edit', [App\Http\Controllers\CommandeController::class, 'edit'])->name('commandes.edit');
    Route::put('/commandes/{commande}', [App\Http\Controllers\CommandeController::class, 'update'])->name('commandes.update');
    Route::delete('/commandes/{commande}', [App\Http\Controllers\CommandeController::class, 'delete'])->name('commandes.delete');
});

Route::middleware(['auth', 'client'])->group(function () {
    //eli bech yzid urelet fel front yzidhom te7t hedhi ya bbiet
    Route::get('review', [ReviewController::class, 'test']);
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::post('/storeprod', [\App\Http\Controllers\ProductController::class, 'store'])->name('products.store');

    Route::get('addprod', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::put('requests/{request}/update', [RequestController::class, 'update'])->name('requests.update');
    Route::put('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('{product}/show', [ProductController::class, 'show'])->name('products.show');
    Route::delete('products/{product}/delete', [ProductController::class, 'delete'])->name('products.delete');
    Route::put('products/{product}/update', [ProductController::class, 'update'])->name('products.update');


});
Route::middleware(['auth', 'artist'])->group(function () {
    Route::get('/frontartist', [App\Http\Controllers\ArtistFrontController::class, 'index']);

});
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
