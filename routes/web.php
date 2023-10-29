<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('categories/create', [App\Http\Controllers\CategoriesController::class, 'create']);
Route::resource('categories', CategoriesController::class);
Route::post('products/create', [App\Http\Controllers\ProductsController::class, 'create']);
Route::resource('products', ProductsController::class);


Route::get('/categories/{id}/editcategory', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::get('/products/{id}/editproduct', [ProductsController::class, 'edit'])->name('products.edit');


Route::post('categories/delete/{id}',[CategoriesController::class, 'destroy']);
Route::post('products/delete/{id}',[ProductsController::class, 'destroy']);
