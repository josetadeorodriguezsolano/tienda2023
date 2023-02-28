<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AgregarCarritoRequest;
use App\Models\Carrito;
use App\Models\Producto;

class CarritoController extends Controller
{
    function show(Request $request)
    {
        return Carrito::where('cliente_id', session('cliente')->id)->get();
    }

    function agregarGet($producto_id)
    {
        $cliente = session('cliente');
        Carrito::agregarProducto($producto_id,$cliente->id);
        return redirect()->route('carrito');
    }

    //function agregarPost(AgregarCarritoRequest $request)
    function agregarPost($producto_id,$cliente_id)
    {
        Carrito::agregarProducto($producto_id,$cliente_id);
        return redirect()->route('carrito');
    }
}
