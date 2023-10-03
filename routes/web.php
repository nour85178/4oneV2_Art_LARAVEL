<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;



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
// Route to display the list of Commandes (Index)
Route::get('/commandes', [App\Http\Controllers\CommandeController::class, 'index'])->name('commandes.index');

// Route to display the form for creating a new Commande (Create)
Route::get('/commandes/create', [App\Http\Controllers\CommandeController::class, 'create'])->name('commandes.create');

// Route to store a newly created Commande in the database (Store)
Route::post('/commandes', [App\Http\Controllers\CommandeController::class, 'store'])->name('commandes.store');

// Route to display details of a specific Commande (Show)
Route::get('/commandes/{commande}', [App\Http\Controllers\CommandeController::class, 'show'])->name('commandes.show');

// Route to display the form for editing an existing Commande (Edit)
Route::get('/commandes/{commande}/edit', [App\Http\Controllers\CommandeController::class, 'edit'])->name('commandes.edit');

// Route to update an existing Commande in the database (Update)
Route::put('/commandes/{commande}', [App\Http\Controllers\CommandeController::class, 'update'])->name('commandes.update');

// Route to delete an existing Commande (Delete)
Route::delete('/commandes/{commande}', [App\Http\Controllers\CommandeController::class, 'delete'])->name('commandes.delete');
