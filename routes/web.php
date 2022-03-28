<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;



Route::get('dashboard',[AdminController::class, 'index']);

require __DIR__.'/auth.php';
