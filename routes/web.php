<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;

Route::get('/', [QrController::class, 'index']);

Route::post('/generate', [QrController::class, 'generate']);