<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\App\AppProductController;
use App\Http\Controllers\App\AppCartController;
use App\Http\Controllers\App\AppCheckoutController;

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

# Route for admin
Route::name('admin.')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('products', ProductController::class);
        Route::resource('users', UserController::class);
    });
});
Route::get('/admin', function () {
    return redirect('/admin/home');
})->middleware('is_admin');
Route::get('admin/home', [AppController::class, 'admin_home'])->name('admin.home')->middleware('is_admin');


# Route for app
Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('/about', [AppController::class, 'about'])->name('about');
Route::get('/contact', [AppController::class, 'contact'])->name('contact');


# Route for products
Route::get('/products', [AppProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [AppProductController::class, 'show'])->name('products.show');
Route::get('/images/image/{imageName}', [AppProductController::class, 'image'])->name('products.image');
# Route for products by Categories
Route::prefix('products')->group(function() {
    Route::get('category/lego-city', [AppProductController::class, 'category_city'])->name('category.city');
    Route::get('category/lego-classic', [AppProductController::class, 'category_classic'])->name('category.classic');
    Route::get('category/lego-batman', [AppProductController::class, 'category_batman'])->name('category.batman');
    Route::get('category/lego-architecture', [AppProductController::class, 'category_architecture'])->name('category.architecture');
    Route::get('/category', function () {
        return redirect('/products');
    });
});


# Route for carts
Route::get('/carts', [AppCartController::class, 'index'])->name('carts.index');
Route::get('/carts/add/{id}', [AppCartController::class, 'add'])->name('carts.add');
Route::patch('carts/update', [AppCartController::class, 'update'])->name('carts.update');
Route::delete('carts/remove', [AppCartController::class, 'remove'])->name('carts.remove');

# Route for checkout
Route::get('/checkout', [AppCheckoutController::class, 'create'])->name('checkout.index');
Route::post('/checkout', [AppCheckoutController::class, 'store'])->name('orders.store');
Route::get('/checkout/success', [AppCheckoutController::class, 'success'])->name('orders.success');


# view image routes
Route::get('/images/image/{imageName}', [ProductController::class], 'image')->name('products.image');


