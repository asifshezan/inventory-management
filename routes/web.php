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
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/view/{slug}', [UserController::class, 'view']);
    Route::get('/user/edit/{slug}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{slug}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/soft-delete', [UserController::class, 'softdelete']);
    Route::get('/user/restore', [UserController::class, 'restore']);
    Route::delete('/users/{slug}', [UserController::class, 'destroy']);
});


require __DIR__.'/auth.php';
