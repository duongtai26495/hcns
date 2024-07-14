<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will.
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [UserController::class, 'index'])->name('home');

Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::get('/nghi-phep',[UserController::class, 'xem_nghi_phep'])->name('user.nghi-phep');

Route::get('/nghi-phep/{id}',[UserController::class, 'xem_don_nghi_phep'])->name('user.xem-don-nghi');

Route::get('/nghi-phep/them',[UserController::class, 'them_nghi_phep'])->name('user.them-nghi-phep');

Route::get('/cai-dat',[UserController::class, 'cai_dat'])->name('cai-dat');

Route::get('/tin-tuc',[UserController::Class, 'tintuc'])->name('tin-tuc');

Route::get('/bang-luong',[UserController::Class, 'bangluong'])->name('bang-luong');



Route::group(['middleware' => 'role:admin,root'], function () {
    Route::get('/user/create', [AdminController::class, 'createUser'])->name('create-user');
    Route::post('/user/store', [AdminController::class, 'store'])->name('user.store');
    Route::get('/user/list', [AdminController::class, 'employees'])->name('user.list');
    Route::get('/user/{id}', [AdminController::class, 'show'])->name('user.show');
    Route::post('/user/update', [AdminController::class, 'update'])->name('user.update');

});