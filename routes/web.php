<?php

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



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::prefix('/admin')->middleware('can:update-products')->group(function(){
    Route::get('/','App\Http\Controllers\AdminsController@index')->name('admin.index');


    Route::resource('/products', 'App\Http\Controllers\ProductsController');
    Route::resource('/codes', 'App\Http\Controllers\CodesController');
    Route::resource('/users','App\Http\Controllers\UsersController')->middleware('can:update-users');
});




Route::get(' / ', [ \App\Http\Controllers\GalleryController::class, 'index' ])->name(' gallery.index ');
Route::get('/search', [ \App\Http\Controllers\GalleryController::class, 'search' ])->name('search');
Route::get('/product/{product}' ,[ \App\Http\Controllers\GalleryController::class, 'details' ])->name('product.details');

Route::post('/order', [\App\Http\Controllers\OrderController::class, 'addToOrder'])->name('order.add');
Route::get('/order', [\App\Http\Controllers\OrderController::class, 'viewOrder'])->name('order.view');
Route::post('removeOne/{product}', [\App\Http\Controllers\OrderController::class, 'removeOne'])->name('order.remove_one');
Route::post('removeAll/{product}', [\App\Http\Controllers\OrderController::class, 'removeAll'])->name('order.remove_all');


Route::resource('/purchases', 'App\Http\Controllers\PurchasesController');