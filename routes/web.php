<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\App\AppProductController;
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

// Route for app
Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('/about', [AppController::class, 'about'])->name('about');
Route::get('/admin', function () {
    return redirect('/admin/home');
})->middleware('is_admin');
Route::get('admin/home', [AppController::class, 'admin_home'])->name('admin.home')->middleware('is_admin');

// Route for products
Route::get('/products', [AppProductController::class, 'index'])->name('products.index');

Route::prefix('products')->group(function() {
    Route::get('category/lego-city', [AppProductController::class, 'category_city'])->name('category.city');
    Route::get('category/lego-classic', [AppProductController::class, 'category_classic'])->name('category.classic');
    Route::get('category/lego-batman', [AppProductController::class, 'category_batman'])->name('category.batman');
    Route::get('category/lego-architecture', [AppProductController::class, 'category_architecture'])->name('category.architecture');
    Route::get('/category', function () {
        return redirect('/products');
    });
});

Route::name('admin.')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('products', ProductController::class);

        // Route::resource('orders', 'Admin\OrderController');
    });
});

// view image routes
Route::get('/images/image/{imageName}', [ProductController::class], 'image')->name('products.image');



//example
Route::get('ajax-crud-image-upload', [AjaxCRUDImageController::class, 'index']);
Route::post('add-update-book', [AjaxCRUDImageController::class, 'store']);
Route::post('edit-book', [AjaxCRUDImageController::class, 'edit']);
Route::post('delete-book', [AjaxCRUDImageController::class, 'destroy']);

