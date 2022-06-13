<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/',[ProductController::class,'index'])->name('index');
Route::get('/products',[ProductController::class,'products'])->name('products');
Route::post('/products',[ProductController::class,'store'])->name('product.store');
Route::get('/product-edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product-update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('/product-delete/{id}',[ProductController::class,'delete'])->name('product.delete');
