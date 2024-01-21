<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AkaController;
use App\Http\Controllers\MoveController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\WhatController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryItemController;
use App\Http\Controllers\HeadlineController;
use App\Http\Controllers\OtherController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MailController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::post('send-mail', [MailController::class, 'index'])->name('send.mail');


Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                    ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});


Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {

    Route::resources([
        '' => AkaController::class,
        'aka' => AkaController::class,
        'meta' => MetaController::class,
        'what' => WhatController::class,
        'signature' => SignatureController::class,
        'media' => MediaController::class,
        'quote' => QuoteController::class,
        'portfolio' => PortfolioController::class,
        'other' => OtherController::class,
        'item' => GalleryItemController::class,
    ]);

    Route::get('/gallery/{category}/{order_id}', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/move/{category}/{order_id}/{where}', [MoveController::class, 'index'])->name('move');
    Route::get('/headline/{item_id}', [HeadlineController::class, 'index'])->name('headline');
    
});



/*
require __DIR__.'/auth.php';
*/



