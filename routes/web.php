<?php

use App\Http\Controllers\InformationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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

require __DIR__.'/admin_auth.php';
require __DIR__.'/auth.php';

Route::view('/', 'welcome');

Route::view('/dashboard','dashboard')->middleware(['auth'])->name('dashboard');

Route::prefix('/admin')->name('admin.')->middleware(['admin'])->group(function(){
    Route::view('/dashboard','admin.dashboard')->name('dashboard');

    // middleware('role:admin') ****** Protect module using role middleware
    Route::prefix('/information')->name('info.')->group(function(){
        Route::get('/show',[InformationController::class,'index'])->middleware('permission:read-info')->name('show');
        Route::get('/create',[InformationController::class,'create'])->middleware('permission:create-info')->name('add');
        Route::post('/store',[InformationController::class,'store'])->middleware('permission:create-info')->name('store');
        Route::get('/edit/{id}',[InformationController::class,'edit'])->middleware('permission:update-info')->name('edit');
        Route::get('/delete/{id}',[InformationController::class,'destroy'])->middleware('permission:delete-info')->name('delete');
    });
    Route::prefix('/role')->name('role.')->middleware(['role:admin'])->group(function(){
        Route::get('/show',[RoleController::class,'index'])->name('show');
        Route::get('/create',[RoleController::class,'create'])->name('add');
        Route::post('/store',[RoleController::class,'store'])->name('store');
        Route::get('/edit/{id}',[RoleController::class,'edit'])->name('edit');
        Route::get('/delete{id}',[RoleController::class,'destroy'])->name('delete');
    });
    Route::prefix('/permission')->name('permission.')->middleware(['role:admin'])->group(function(){
        Route::get('/show',[PermissionController::class,'index'])->name('show');
        Route::get('/create',[PermissionController::class,'create'])->name('add');
        Route::post('/store',[PermissionController::class,'store'])->name('store');
        Route::get('/edit/{id}',[PermissionController::class,'edit'])->name('edit');
        Route::get('/delete{id}',[PermissionController::class,'destroy'])->name('delete');
    });
});
