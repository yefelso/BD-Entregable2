<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/trabajadores', [ApiController::class, 'index']);
Route::post('/trabajador', [ApiController::class, 'store']);
Route::get('/trabajador/{id}', [ApiController::class, 'show']);
Route::put('/trabajador/{id}', [ApiController::class, 'update']);
Route::delete('/trabajador/{id}', [ApiController::class, 'destroy']);