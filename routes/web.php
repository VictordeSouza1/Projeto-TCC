<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlantasController;

Route::get('/', function () {
    return (view('index'));
});
