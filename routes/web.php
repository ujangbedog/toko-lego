<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('admin/form', [HomeController::class, 'form'])->name('form')->middleware('is_admin');

Route::get('admin/product', [ProductController::class, 'index']);
Route::get('admin/product/{id}/edit', [ProductController::class, 'edit']);
Route::post('admin/product/store', [ProductController::class, 'store']);
Route::get('admin/product/delete/{id}', [ProductController::class, 'destroy']);

