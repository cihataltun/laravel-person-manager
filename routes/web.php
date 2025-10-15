<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('/average-age', [PersonController::class, 'averageAge']);
