<?php

use App\Http\Controllers\OrderController;
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

Route::get('/admin', function () {
    return view('home');
}) -> name('admin.home');
Route::get('/admin/login', function () {
    return view('back-end.admin.login');
});
Route::get('/admin/register', function () {
    return view('back-end.admin.register');
});
Route::get('/admin/forgot-password', function () {
    return view('back-end.admin.forgot-password');
});
Route::get('/template-table', function () {
    return view('back-end.template-table');
});

// Order route
Route::get('/admin/bills', [OrderController::class, 'index'])->name('admin.bill.list');
Route::get('/admin/bills/{id}', [OrderController::class, 'show'])->name('admin.bill.detail');
Route::post('/admin/bills/update', [OrderController::class, 'update'])->name('admin.bill.update');
Route::post('/admin/bills/delete', [OrderController::class, 'destroy'])->name('admin.bill.delete');