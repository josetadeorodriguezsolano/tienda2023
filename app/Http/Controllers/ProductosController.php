<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function consultar()
    {
        //$productos = Producto::all();
        $productos = Producto::take(20)->get();
        //return $productos;
        return view('principal',["productos"=>$productos]);
    }
}
