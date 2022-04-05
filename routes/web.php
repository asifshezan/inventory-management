<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerGroupController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;


//  User Controller
Route::group(['prefix' => 'admin','middleware' => ['auth']], function() {

    Route::get('/',[AdminController::class, 'index'])->name('dashboard');

    // USER ROUTE LIST
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/view/{slug}', [UserController::class, 'view'])->name('user.view');
    Route::get('/user/edit/{slug}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{slug}', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/soft-delete', [UserController::class, 'softdelete'])->name('user.softdelete');
    Route::get('/user/restore', [UserController::class, 'restore']);
    Route::delete('/users/{slug}', [UserController::class, 'destroy']);


    // Customer Route

    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/view/{slug}', [CustomerController::class, 'view'])->name('customer.view');
    Route::get('/customer/edit/{slug}', [customerController::class, 'edit'])->name('customer.edit');
    Route::put('/customer/{slug}', [CustomerController::class, 'update'])->name('customer.update');
    Route::post('/customer/soft-delete', [CustomerController::class, 'softdelete'])->name('customer.softdelete');

    // Supplier Route

    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/edit/{slug}', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::get('/supplier/view/{slug}', [SupplierController::class, 'view'])->name('supplier.view');
    Route::put('/supplier/{slug}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::post('/supplier/soft-delete', [SupplierController::class, 'softdelete'])->name('supplier.softdelete');























});


require __DIR__.'/auth.php';
