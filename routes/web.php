<?php

use App\Controllers\HomeController;
use PhpLite\Http\Route;

Route::get('/', [HomeController::class, 'index']);
