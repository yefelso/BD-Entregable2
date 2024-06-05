<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\TrabajadorController;

Route::resource('trabajadores', TrabajadorController::class);

