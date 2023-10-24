<?php

use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Admin;
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
    Route::get('/users', [App\Http\Controllers\Admin::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [App\Http\Controllers\Admin::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}/update', [App\Http\Controllers\Admin::class, 'update'])->name('users.update');
    Route::delete('/users/{user}/delete', [App\Http\Controllers\Admin::class, 'destroy'])->name('users.destroy');
    Route::get('/users/create', [App\Http\Controllers\Admin::class, 'create'])->name('users.create');
    Route::post('/users/store', [App\Http\Controllers\Admin::class, 'store'])->name('users.store');
    Route::resource('reviews', ReviewController::class);
    Route::get('reviews/{review}/show', [ReviewController::class, 'show'])->name('reviews.show');
    Route::resource('requests', RequestController::class);




    Route::get('/commandes', [App\Http\Controllers\CommandeController::class, 'index'])->name('commandes.index');
    Route::get('/commandes/create', [App\Http\Controllers\CommandeController::class, 'create'])->name('commandes.create');
    Route::post('/commandes', [App\Http\Controllers\CommandeController::class, 'store'])->name('commandes.store');
    Route::get('/commandes/{commande}', [App\Http\Controllers\CommandeController::class, 'show'])->name('commandes.show');
    Route::get('/commandes/{commande}/edit', [App\Http\Controllers\CommandeController::class, 'edit'])->name('commandes.edit');
    Route::put('/commandes/{commande}', [App\Http\Controllers\CommandeController::class, 'update'])->name('commandes.update');
    Route::delete('/commandes/{commande}', [App\Http\Controllers\CommandeController::class, 'delete'])->name('commandes.delete');
    Route::get('tagschart', [ReviewController::class, 'tagsChart'])->name('tags.chart');
    Route::get('averagenotechart', [ReviewController::class, 'averageNoteChart'])->name('average.note.chart');
    Route::get('/charts', [ReviewController::class, 'combinedCharts'])->name('charts');
});

Route::middleware(['auth', 'artist'])->group(function () {
    //eli bech yzid urelet fel front yzidhom te7t hedhi ya bbiet
    Route::get('review', [ReviewController::class, 'test']);
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::post('/storeprod', [\App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
    Route::post('/store-custom-prod/{requestt}', [\App\Http\Controllers\ProductController::class, 'storeCustomProd'])->name('store-custom-prod');
    Route::get('addprod', [\App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::get('/create-custom-product/{requestt}', [\App\Http\Controllers\ProductController::class, 'createCustomProd'])->name('create-custom-product');
    Route::put('/accept-request/{request}', [RequestController::class, 'acceptRequest'])->name('accept-request');
    Route::delete('/delete-request/{request}', [RequestController::class, 'deleteRequest'])->name('delete-request');
    Route::get('/artist-requests', [RequestController::class, 'displayArtistRequests'])->name('artist-requests');
    Route::put('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('{product}/show', [ProductController::class, 'show'])->name('products.show');
    Route::delete('products/{product}/delete', [ProductController::class, 'delete'])->name('products.delete');
    Route::put('products/{product}/update', [ProductController::class, 'update'])->name('products.update');
    Route::put('/products/{product}/stop-bidding', [ProductController::class, 'stopBidding'])->name('products.stopBidding');
});
Route::middleware(['auth', 'client'])->group(function () {
    Route::get('/frontartist', [App\Http\Controllers\ArtistFrontController::class, 'index']);
    Route::get('/style', [App\Http\Controllers\ProductController::class, 'displayStyledProducts'])->name('produits');
    Route::get('{product}/getprod', [ProductController::class, 'getprod'])->name('products.getprod');
    Route::post('/bids/place/{product}', [\App\Http\Controllers\BidController::class, 'placeBid'])->name('bids.place');
    Route::post('/bids/participate/{product}', [BidController::class, 'participate'])->name('bids.participate');
    Route::get('/bidding', [BidController::class, 'showBiddingInterface']);
    Route::get('/artistes', [Admin::class, 'showArtistUsers'])->name('artist-users');
    Route::post('/store/{artist}', [RequestController::class, 'store'])->name('requests.store');
    Route::get('/requests-list', [RequestController::class, 'index'])->name('requests-list');
    Route::get('/requests/create/{artist}', [RequestController::class, 'create'])->name('requests.create');
    Route::get('artist-portfolio/{artist}', [ProductController::class, 'portfolio'])->name('artist-portfolio');
    Route::get('/custom-product/{request}', [RequestController::class, 'showCustomProduct'])->name('custom-product');
    Route::get('/send', function () {
        \Mail::to('anistagoug@gmail.com')->send(new \App\Mail\TestEmail());
        return 'Test email sent!';
    });
    Route::get('/test', [ReviewController::class, 'testReview'])->name('reviews.review');
    Route::post('reviews/store', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('reviews/{review}/edit',  [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::patch('reviews/{review}',  [ReviewController::class, 'update'])->name('reviews.update');
    Route::get('/chattt', [\App\Http\Controllers\PusherController::class, 'index']);
    Route::post('/broadcast', [\App\Http\Controllers\PusherController::class, 'broadcast'])->name('broadcast');
    Route::post('/receive', [\App\Http\Controllers\PusherController::class, 'receive'])->name('receive');
});
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// routes/web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/send/{receiver}', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/{artist}', [ChatController::class, 'loadConversation'])->name('chat.conversation');
});
