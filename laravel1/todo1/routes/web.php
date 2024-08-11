<?php

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
    return view('welcome');
});

Route::get('/contact', function () {
    return view('welcome_contact'); // Change 'welcome_contact' to your actual view file name
});

Route::get('/product', function () {
    return view('product.product');
});

Route::get('/product/list', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/product/form', [\App\Http\Controllers\ProductController::class, 'formIndex']);

?>
