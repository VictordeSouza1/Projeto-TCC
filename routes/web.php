<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\PlantaController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TreatmentsController;

// Página inicial
Route::get('/', function () {
    return view('index');
});

// CRUD PLANTAS
Route::resource('/planta', PlantaController::class);

// CRUD PRODUTOS
Route::resource('/product', ProductsController::class);

// CRUD TRATAMENTOS
Route::resource('/treatment', TreatmentsController::class);

// CRUD ARTIGOS
Route::resource('/article', ArticlesController::class);

