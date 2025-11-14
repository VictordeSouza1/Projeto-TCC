<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlantaController;

Route::get('/', function () {
    return (view('index'));
});

Route::get('/encyclopedia', function () {
    return (view('encyclopedia'));
});

Route::resource('/planta', PlantaController::class);

