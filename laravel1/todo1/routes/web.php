<?php

use App\Http\Conrollers\ProfileController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () { */
/*     return view('backend.main'); */
/* }); */
/**/
/* Route::get('/backend', function () { */
/*     return view('backend.includes.footer'); */
/* }); */
/**/
/* Route::get('/', function () { */
/*     return view('welcome'); */
/* }); */
/**/
/* Route::get('/contact', function () { */
/*     return view('welcome_contact'); // Change 'welcome_contact' to your actual view file name */
/* }); */
/**/
/* Route::get('/product', function () { */
/*     return view('product.product'); */
/* }); */
/**/
/* Route::get('/product/list', [\App\Http\Controllers\ProductController::class, 'index']); */
/* Route::get('/product/form', [\App\Http\Controllers\ProductController::class, 'formIndex']); */
/**/

// Route::get('/category', function () {
//     return view('backend.category.index');
// });

// Route::post('/category/store', [\App\Http\Controllers\CategoryController::class, 'store']);
// Route::post('/category/index', [\App\Http\Controllers\CategoryController::class, 'show']);

Route::get('/category/create', [\App\Http\Controllers\CategoryController::class, 'create']);
Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::post('/category/create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit']);
Route::post('/category/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update']);
Route::get('/category/delete/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy']);

/* Route::get('/category/create', function () { */
/*     return view('backend.category.create'); */
/* }); */

Route::get('/brand/create', [\App\Http\Controllers\BrandController::class, 'create']);
Route::get('/brand', [\App\Http\Controllers\BrandController::class, 'index']);
Route::post('/brand/create', [\App\Http\Controllers\BrandController::class, 'store'])->name('brand.store');
Route::get('/brand/edit/{id}', [\App\Http\Controllers\BrandController::class, 'edit']);
Route::post('/brand/update/{id}', [\App\Http\Controllers\BrandController::class, 'update']);
Route::get('/brand/delete/{id}', [\App\Http\Controllers\BrandController::class, 'destroy']);

// Route::post('/brand/create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
// Route::post('/brand/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit']);

Route::get('/product/create', [\App\Http\Controllers\ProductController::class, 'create']);
Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index']);
Route::post('/product/create', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::get('/product/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit']);
Route::put('/product/update/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::get('/product/delete/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/', [\App\Http\Controllers\FrontendController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
