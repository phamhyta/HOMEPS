<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PcController;
use Illuminate\Support\Facades\Route;

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
//Admin route
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::get('/admin/forgot-password', [AdminController::class, 'forgotPassword'])->name('admin.forgot-password');

// Home route 
Route::get('/admin', [OrderController::class, 'create'])->name('admin.home');

// Order route
Route::get('/admin/bills', [OrderController::class, 'index'])->name('admin.bill.list');
Route::get('/admin/bills/{id}', [OrderController::class, 'show'])->name('admin.bill.detail');
Route::post('/admin/bills/update', [OrderController::class, 'update'])->name('admin.bill.update');
Route::post('/admin/bills/delete', [OrderController::class, 'destroy'])->name('admin.bill.delete');

//PS route
Route::get('/admin/PSmanager', [PcController::class, 'index'])->name('admin.pc.list');
Route::get('/admin/PSmanager/{id}', [PcController::class, 'show'])->name('admin.pc.detail');
Route::post('/admin/PSmanager/delete', [PcController::class, 'destroy'])->name('admin.pc.delete');
Route::post('/admin/PSmanager/create', [PcController::class, 'create'])->name('admin.pc.create');
Route::post('/admin/PSmanager/update', [PcController::class, 'update'])->name('admin.pc.update');