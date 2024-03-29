<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

 // เมนู User
Route::get('admin/user/index',[UserController::class, 'index']);

// เมนู Category
Route::get('admin/category/index',[CategoryController::class, 'index']);
Route::get('admin/category/createfrom',[CategoryController::class, 'createfrom']);
Route::get('admin/category/edit/{id}',[CategoryController::class, 'edit']);
Route::post('admin/category/insert',[CategoryController::class, 'insert']);
Route::post('admin/category/update/{id}',[CategoryController::class, 'update']);
Route::get('admin/category/delete/{id}',[CategoryController::class, 'delete']);


// เมนู Product
Route::get('admin/product/index',[ProductController::class, 'index']);
Route::get('admin/product/createfrom',[ProductController::class, 'createfrom']);
Route::get('admin/product/edit',[ProductController::class, 'edit']);
Route::post('admin/product/insert',[ProductController::class, 'insert']);
