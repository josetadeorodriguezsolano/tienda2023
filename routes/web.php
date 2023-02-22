<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

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



Route::get('/productos',function(){
    return view('productos.alta');
})->name('catalogo_productos');
Route::controller(ProductosController::class)->group(function () {
    Route::get('/', 'consultar')->name('home');;
    Route::post('/productos/alta','alta');
    Route::get('/productos/detalle/{id}','detalle');
    Route::get('/productos/show','show');
});
