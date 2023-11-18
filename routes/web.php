<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SellsController;
use App\Http\Controllers\TypesController;



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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('categories/create', [App\Http\Controllers\CategoriesController::class, 'create']);
Route::resource('categories', CategoriesController::class);
Route::post('products/create', [App\Http\Controllers\ProductsController::class, 'create']);
Route::resource('products', ProductsController::class);
Route::post('sells/create', [App\Http\Controllers\SellsController::class, 'create']);
Route::resource('sells', SellsController::class);
Route::post('types/create', [App\Http\Controllers\TypesController::class, 'create']);
Route::resource('types', TypesController::class);

Route::get('/categories/{id}/editcategory', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::get('/products/{id}/editproduct', [ProductsController::class, 'edit'])->name('products.edit');
Route::get('/types/{id}/edittype', [TypesController::class, 'edit'])->name('type.edit');


Route::post('categories/delete/{id}',[CategoriesController::class, 'destroy']);
Route::post('products/delete/{id}',[ProductsController::class, 'destroy']);
Route::post('types/delete/{id}',[TypesController::class, 'destroy']);


Route::get('pdf1', [CategoriesController::class, 'pdf'])->name('listacategory.pdf');
Route::get('pdf2', [SellsController::class, 'pdf'])->name('listasell.pdf');
Route::get('pdf3', [ProductsController::class, 'pdf'])->name('listaproduct.pdf');


Route::get('/searchcategory', [CategoriesController::class, 'index'])->name('searchcategory');
Route::get('/searchproduct', [ProductsController::class, 'index'])->name('searchproduct');
Route::get('/searchsell', [SellsController::class, 'index'])->name('searchsell');