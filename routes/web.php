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

Route::get('/', [ProductosController::class, 'consultar']
)->name('home');
Route::get('/productos',function(){
    return view('productos.alta');
})->name('catalogo_productos');
Route::post('/productos/alta',[ProductosController::class,'alta']);
Route::get('/productos/detalle/{id}',[ProductosController::class,'detalle']);
