<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerGroupController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;



Route::get('dashboard',[AdminController::class, 'index']);

require __DIR__.'/auth.php';
