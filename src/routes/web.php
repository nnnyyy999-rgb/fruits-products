<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;




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


Route::get('/products', [ProductsController::class, 'index'])->name('products.index');

Route::get('/products/detail/{id}', [ProductsController::class, 'detail'])->name('products.detail');

Route::get('/products/register', [ProductsController::class, 'showRegister'])->name('products.register');

Route::post('/products/register', [ProductsController::class, 'store'])->name('products.store');

Route::get('/products/{id}/update', [ProductsController::class, 'edit'])->name('products.edit');

Route::post('/products/{id}/update', [ProductsController::class, 'update'])->name('products.update');

Route::get('/products/search', [ProductsController::class, 'search'])->name('products.search');

Route::post('/products/{id}/delete', [ProductsController::class, 'delete'])->name('products.delete');

Route::get('/', [ProductsController::class, 'index']);