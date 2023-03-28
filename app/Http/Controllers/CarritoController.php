<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AgregarCarritoRequest;
use App\Models\Carrito;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    function show(Request $request)
    {
        /*$carrito = DB::table('carritos')
            ->select('productos.nombre','productos.precio')
            ->join('productos','carritos.producto_id','=','productos.id')
            ->where('cliente_id', session('cliente')->id)->get();*/
        //$carrito = Carrito::where('cliente_id',session('cliente')->id)->get();
        $carritos = session('cliente')->carrito;
        foreach ($carritos as $carrito) {
            $carrito->producto;
        }
        return $carritos;
    }

    function agregarGet($producto_id)
    {
        $cliente = session('cliente');
        Carrito::agregarProducto($producto_id,$cliente->id);
        return redirect()->route('carrito');
    }

    //function agregarPost(AgregarCarritoRequest $request)
    function agregarPost($request)
    {
        $producto_id = $request['producto_id'];
        $token = $request['token'];
        $cliente = Cliente::where('token',$token)->get()->first();
        if ($cliente)
        {
            Carrito::agregarProducto($producto_id,$cliente->id);
            return redirect()->route('carrito');
        }
        return abort(404);
    }
}
