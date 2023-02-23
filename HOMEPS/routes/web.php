<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\PcController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkAdminLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [OrderController::class, 'create'])->name('admin.home');
    //Admin route

    // Order route
    Route::get('/bills', [OrderController::class, 'index'])->name('admin.bill.list');
    Route::get('/bills/{id}', [OrderController::class, 'show'])->name('admin.bill.detail');
    Route::post('/bills/update', [OrderController::class, 'update'])->name('admin.bill.update');
    Route::post('/bills/delete', [OrderController::class, 'destroy'])->name('admin.bill.delete');
    //Product route
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.product.list');
    Route::get('/products/{id}', [AdminProductController::class, 'show'])->name('admin.product.detail');
    Route::post('/products/update', [AdminProductController::class, 'update'])->name('admin.product.update');
    Route::post('/products/delete', [AdminProductController::class, 'destroy'])->name('admin.product.delete');
    Route::post('/products/create', [AdminProductController::class, 'create'])->name('admin.product.create');
    //PS route
    Route::get('/PSmanager', [PcController::class, 'index'])->name('admin.pc.list');
    Route::get('/PSmanager/{id}', [PcController::class, 'show'])->name('admin.pc.detail');
    Route::post('/PSmanager/delete', [PcController::class, 'destroy'])->name('admin.pc.delete');
    Route::post('/PSmanager/create', [PcController::class, 'create'])->name('admin.pc.create');
    Route::post('/PSmanager/update', [PcController::class, 'update'])->name('admin.pc.update');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminController::class, 'indexLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.post');
    Route::get('/register', [AdminController::class, 'indexRegister'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'register'])->name('admin.register.post');
    Route::get('/forgot-password', [AdminController::class, 'forgotPassword'])->name('admin.forgot-password');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/Adminlist', [AdminController::class, 'show'])->name('admin.Adminlist');
    Route::post('/{admin}', [AdminController::class, 'update'])->name('admin.update');
});
