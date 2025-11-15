<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlantaController;
use App\Http\Controllers\ProductsController;

// Página inicial
Route::get('/', function () {
    return view('index');
});

// Enciclopédia
Route::get('/encyclopedia', function () {
    return view('encyclopedia');
});

// Página estática antiga (se quiser manter)
Route::get('/product', function () {
    return view('product');
});

// CRUD PLANTAS
Route::resource('/planta', PlantaController::class);

// CRUD PRODUTOS
Route::resource('/product', ProductsController::class);
