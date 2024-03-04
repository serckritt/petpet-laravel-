<?php

use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('home');

Route::resource('products', ProductController::class);
Route::resource('reviews', ReviewController::class);

Route::middleware('auth')->group(function () {
    Route::get('/mypage', MyPageController::class)->name('mypage');
    Route::resource('carts', CartController::class);
    Route::get('buy', [PurchaseController::class, 'buy'])->name('buy');
    Route::post('purchase', [PurchaseController::class, 'purchase'])->name('purchase');
    Route::delete('records', [RecordController::class, 'destroy'])->name('records.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
