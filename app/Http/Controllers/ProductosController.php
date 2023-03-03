<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\AltaProductoRequest;

class ProductosController extends Controller
{
    public function show()
    {
        return Producto::select(['id','nombre','precio'])->take(20)->get();
    }

    public function consultar()
    {
        //$productos = Producto::all();
        $productos = Producto::take(20)->get();
        //return $productos;
        return view('principal',["productos"=>$productos]);
    }

    public function alta(AltaProductoRequest $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->existencia = $request->input('existencia');
        $producto->envio = $request->input('envio');
        $producto->detalle = $request->input('detalle');
        $producto->save();
        //return view('productos.alta');
        route('catalogo_productos');
    }

    public function detalle($id)
    {
        $producto = Producto::find($id);
        if ($producto)
            return view('productos.detalle',['producto'=>$producto]);
        else
            abort(404);
    }

    public function catalogo()
    {
        $productos = Producto::paginate(20);
        return view('productos.catalogo',["productos"=>$productos]);
    }
//////////////////////////LIVEWIRE//////////////////////////
    public function catalogoLivewire()
    {
        return view('productos.livewire.catalogo');
    }

//////////////////////////ANGULAR///////////////////////////
    public function catalogoAngular()
    {
        return view('productos.angular.catalogo');
    }

    public function catalogoAngularShow($pagina,$elementosPorPagina)
    {
        return Producto::offset(($pagina-1)*$elementosPorPagina)->take($elementosPorPagina)->get();
    }

    public function catalogoAngularEliminar($id)
    {
        $producto = Producto::find($id);
        if ($producto)
        {
            $producto->delete();
            return 1;
        }
        return 0;
    }
//////////////////////////JQUERY///////////////////////////
    public function catalogoJquery()
    {
        return view('productos.jquery.catalogo');
    }

    public function catalogoJqueryShow($pagina,$elementosPorPagina)
    {
        return Producto::offset(($pagina-1)*$elementosPorPagina)->take($elementosPorPagina)->get();
    }
//////////////////////////////////////////////////////////////
    public function eliminar($id)
    {
    }
}
