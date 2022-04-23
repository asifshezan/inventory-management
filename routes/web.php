<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerGroupController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\BillerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PurchaseUnitController;
use App\Http\Controllers\WareHouseController;

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

    // Role Route

    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/edit/{slug}', [RoleController::class, 'edit'])->name('role.edit');
    Route::get('/role/view/{slug}', [RoleController::class, 'view'])->name('role.view');
    Route::put('/role/{slug}', [RoleController::class, 'update'])->name('role.update');
    Route::post('/role/soft-delete', [RoleController::class, 'softdelete'])->name('role.softdelete');

    // Brand Route

    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{slug}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::get('/brand/view/{slug}', [BrandController::class, 'view'])->name('brand.view');
    Route::put('/brand/{slug}', [BrandController::class, 'update'])->name('brand.update');
    Route::post('/brand/soft-delete', [BrandController::class, 'softdelete'])->name('brand.softdelete');

    // Customer Group Route

    Route::get('/customer-group', [CustomerGroupController::class, 'index'])->name('cg.index');
    Route::get('/customer-group/create', [CustomerGroupController::class, 'create'])->name('cg.create');
    Route::post('/customer-group', [CustomerGroupController::class, 'store'])->name('cg.store');
    Route::get('/customer-group/edit/{slug}', [CustomerGroupController::class, 'edit'])->name('cg.edit');
    // Route::get('/customer-group/view/{slug}', [CustomerGroupController::class, 'view'])->name('cg.view');
    Route::put('/customer-group/{slug}', [CustomerGroupController::class, 'update'])->name('cg.update');
    Route::post('/customer-group/soft-delete', [CustomerGroupController::class, 'softdelete'])->name('cg.softdelete');

     // Product Category Route

    Route::get('product/category', [ProductCategoryController::class, 'index'])->name('product.category.index');
    Route::get('product/category/create', [ProductCategoryController::class, 'create'])->name('product.category.create');
    Route::post('product/category', [ProductCategoryController::class, 'store'])->name('product.category.store');
    Route::get('product/category/view/{slug}', [ProductCategoryController::class, 'view'])->name('product.category.view');
    Route::get('product/category/edit/{slug}', [ProductCategoryController::class, 'edit'])->name('product.category.edit');
    Route::put('product/category/{slug}', [ProductCategoryController::class, 'update'])->name('product.category.update');
    Route::post('product/category/soft-delete', [ProductCategoryController::class, 'softdelete'])->name('product.category.softdelete');

    // Product Type Route

    Route::get('product/type', [ProductTypeController::class, 'index'])->name('product.type.index');
    Route::get('product/type/create', [ProductTypeController::class, 'create'])->name('product.type.create');
    Route::post('product/type', [ProductTypeController::class, 'store'])->name('product.type.store');
    Route::get('product/type/view/{slug}', [ProductTypeController::class, 'view'])->name('product.type.view');
    Route::get('product/type/edit/{slug}', [ProductTypeController::class, 'edit'])->name('product.type.edit');
    Route::put('product/type/{slug}', [ProductTypeController::class, 'update'])->name('product.type.update');
    Route::post('product/type/soft-delete', [ProductTypeController::class, 'softdelete'])->name('product.type.softdelete');

    // Expense Category Route

    Route::get('expense/category', [ExpenseCategoryController::class, 'index'])->name('expense.category.index');
    Route::get('expense/category/create', [ExpenseCategoryController::class, 'create'])->name('expense.category.create');
    Route::post('expense/category', [ExpenseCategoryController::class, 'store'])->name('expense.category.store');
    Route::get('expense/category/view/{slug}', [ExpenseCategoryController::class, 'view'])->name('expense.category.view');
    Route::get('expense/category/edit/{slug}', [ExpenseCategoryController::class, 'edit'])->name('expense.category.edit');
    Route::put('expense/category/{slug}', [ExpenseCategoryController::class, 'update'])->name('expense.category.update');
    Route::post('expense/category/soft-delete', [ExpenseCategoryController::class, 'softdelete'])->name('expense.category.softdelete');

    // Tax Route

    Route::get('tax', [TaxController::class, 'index'])->name('tax.index');
    Route::get('tax/create', [TaxController::class, 'create'])->name('tax.create');
    Route::post('tax', [TaxController::class, 'store'])->name('tax.store');
    Route::get('tax/view/{slug}', [TaxController::class, 'view'])->name('tax.view');
    Route::get('tax/edit/{slug}', [TaxController::class, 'edit'])->name('tax.edit');
    Route::put('tax/{slug}', [TaxController::class, 'update'])->name('tax.update');
    Route::post('tax/soft-delete', [TaxController::class, 'softdelete'])->name('tax.softdelete');

     // Tax Route

    Route::get('biller', [BillerController::class, 'index'])->name('biller.index');
    Route::get('biller/create', [BillerController::class, 'create'])->name('biller.create');
    Route::post('biller', [BillerController::class, 'store'])->name('biller.store');
    Route::get('biller/view/{slug}', [BillerController::class, 'view'])->name('biller.view');
    Route::get('biller/edit/{slug}', [BillerController::class, 'edit'])->name('biller.edit');
    Route::put('biller/{slug}', [BillerController::class, 'update'])->name('biller.update');
    Route::post('biller/soft-delete', [BillerController::class, 'softdelete'])->name('biller.softdelete');

    // WareHouse Route

    Route::get('warehouse', [WareHouseController::class, 'index'])->name('warehouse.index');
    Route::get('warehouse/create', [WareHouseController::class, 'create'])->name('warehouse.create');
    Route::post('warehouse', [WareHouseController::class, 'store'])->name('warehouse.store');
    Route::get('warehouse/view/{slug}', [WareHouseController::class, 'view'])->name('warehouse.view');
    Route::get('warehouse/edit/{slug}', [WareHouseController::class, 'edit'])->name('warehouse.edit');
    Route::put('warehouse/{slug}', [WareHouseController::class, 'update'])->name('warehouse.update');
    Route::post('warehouse/soft-delete', [WareHouseController::class, 'softdelete'])->name('warehouse.softdelete');

    // Department Route

    Route::get('department', [DepartmentController::class, 'index'])->name('department.index');
    Route::get('department/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('department', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('department/view/{slug}', [DepartmentController::class, 'view'])->name('department.view');
    Route::get('department/edit/{slug}', [DepartmentController::class, 'edit'])->name('department.edit');
    Route::put('department/{slug}', [DepartmentController::class, 'update'])->name('department.update');
    Route::post('department/soft-delete', [DepartmentController::class, 'softdelete'])->name('department.softdelete');

    // Purchase Unit Route

    Route::get('purchase-unit', [PurchaseUnitController::class, 'index'])->name('purchase.unit.index');
    Route::get('purchase-unit/create', [PurchaseUnitController::class, 'create'])->name('purchase.unit.create');
    Route::post('purchase-unit', [PurchaseUnitController::class, 'store'])->name('purchase.unit.store');
    Route::get('purchase-unit/view/{slug}', [PurchaseUnitController::class, 'view'])->name('purchase.unit.view');
    Route::get('purchase-unit/edit/{slug}', [PurchaseUnitController::class, 'edit'])->name('purchase.unit.edit');
    Route::put('purchase-unit/{slug}', [PurchaseUnitController::class, 'update'])->name('purchase.unit.update');
    Route::post('purchase-unit/soft-delete', [PurchaseUnitController::class, 'softdelete'])->name('purchase.unit.softdelete');

    // Basic Info Route

    Route::get('basic-setting', [BasicController::class, 'index'])->name('basic.index');
    Route::post('basic-setting', [BasicController::class, 'update'])->name('basic.update');

    // Social Media Route

    Route::get('social-setting', [SocialController::class, 'index'])->name('social.index');
    Route::post('social-update', [SocialController::class, 'update'])->name('social.update');

    // Contact Info Route

    Route::get('contact-setting', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contact-update', [ContactController::class, 'update'])->name('contact.update');




});


require __DIR__.'/auth.php';
