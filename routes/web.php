<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\PlantaController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TreatmentsController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// CRUD PLANTAS
Route::resource('/planta', PlantaController::class);

// CRUD ARTIGOS
Route::resource('/article', ArticlesController::class);

// CRUD PRODUTOS
Route::resource('/product', ProductsController::class);

// CRUD TRATAMENTOS
Route::resource('/treatment', TreatmentsController::class);

// CARRINHO
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
