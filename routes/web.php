<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrabajadorController;



Route::get('/', [TrabajadorController::class, 'index']);


Route::resource('trabajadores', TrabajadorController::class);

