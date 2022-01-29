<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AjaxCRUDImageController;

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
Route::get('/admin', function () {
    return redirect('/admin/home');
})->middleware('is_admin');
Route::get('admin/home', [HomeController::class, 'admin_home'])->name('admin.home')->middleware('is_admin');

Route::name('admin.')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('products', ProductController::class);

        // Route::resource('orders', 'Admin\OrderController');
    });
});

// view image routes
Route::get('/images/image/{imageName}', [ProductController::class], 'image')->name('products.image');

Route::get('ajax-crud-image-upload', [AjaxCRUDImageController::class, 'index']);
Route::post('add-update-book', [AjaxCRUDImageController::class, 'store']);
Route::post('edit-book', [AjaxCRUDImageController::class, 'edit']);
Route::post('delete-book', [AjaxCRUDImageController::class, 'destroy']);

