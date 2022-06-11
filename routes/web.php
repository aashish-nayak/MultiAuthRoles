<?php

use App\Http\Controllers\InformationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/admin')->name('admin.')->group(function(){
    Route::view('/dashboard','admin.dashboard')->middleware(['admin'])->name('dashboard');
    Route::prefix('/information')->name('info.')->group(function(){
        Route::get('/show',[InformationController::class,'index'])->name('show');
        Route::get('/create',[InformationController::class,'create'])->name('add');
        Route::post('/store',[InformationController::class,'store'])->name('store');
        Route::get('/edit/{id}',[InformationController::class,'edit'])->name('edit');
        Route::get('/delete{id}',[InformationController::class,'destroy'])->name('delete');
    });
});
require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';
