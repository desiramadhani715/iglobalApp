<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;


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
    });
    Route::group(['middleware'=>['Cek_Login:employee']], function(){
        Route::get('employee', [EmployeeController::class, 'index']);
        Route::get('employee/product', [ProductsController::class, 'indexEmp']);
        Route::get('employee/order', [OrderController::class, 'indexEmp']);
    });
});

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/proses_login',[AuthController::class, 'proses_login']);
Route::get('logout',[AuthController::class, 'logout']);