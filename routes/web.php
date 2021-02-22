<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SalesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the Rout eServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('Layout/main');
// });

// auth -> admin & employee
Route::group(['middleware'=>['auth']], function(){
    Route::group(['middleware'=>['Cek_Login:admin']], function(){
        Route::get('admin', [AdminController::class, 'index']);
        Route::get('admin/product', [ProductsController::class, 'index']);
        Route::post('admin/product', [ProductsController::class, 'store']);
        Route::delete('product/{product_id}', [ProductsController::class, 'destroy']);
        Route::match(['get','post'], 'product/edit/{product_id}', [ProductsController::class, 'update']);
        Route::get('admin/sales', [SalesController::class, 'index']);
    });
    Route::group(['middleware'=>['Cek_Login:employee']], function(){
        Route::get('employee', [EmployeeController::class, 'index']);
        Route::get('employee/product', [ProductsController::class, 'indexEmp']);
        Route::get('employee/order', [OrderController::class, 'index']);
        Route::post('employee/order', [OrderController::class, 'store']);
        Route::get('employee/customer', [CustomerController::class, 'index']);
        Route::post('employee/customer',[CustomerController::class, 'store']);
        Route::delete('customer/{customer_id}',[CustomerController::class, 'destroy']);
        Route::match(['get','post'], 'customer/edit/{customer_id}', [CustomerController::class, 'update']);
    });
});

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/proses_login',[AuthController::class, 'proses_login']);
Route::get('logout',[AuthController::class, 'logout']);