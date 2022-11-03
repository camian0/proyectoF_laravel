<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
    return redirect('/products');
});

Route::get('products/admin', function () {
    $productController = new ProductController();
    $products          = $productController->getProducts();
    return view('products.admin.index', [
        'products' => $products,
    ]);
})->name('productsAdmin');

Route::get('categories/admin', function () {
    $categoryController = new CategoryController();
    $categories         = $categoryController->getCategories();
    return view('categories.admin.index', [
        'categories' => $categories,
    ]);
})->name('categoriesAdmin');

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
