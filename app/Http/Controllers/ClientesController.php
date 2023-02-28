<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClientesController extends Controller
{
    public function login(LoginRequest $request)
    {
        //Collection
        $cliente = Cliente::where('correo',$request->correo)->get()->first();
        if ($cliente)
        {
            if (Hash::check($request->password,$cliente->password))
            {
                Session::put('cliente',$cliente);
                //session('cliente',$cliente);
                return redirect()->route('home');
            }
            else
            {
                session('errors','Nombre de usuario o contraseña invalidos');
                return redirect()->back()->withInput();
            }
        }
    }

    public function loginMovil(LoginRequest $request)
    {
        //Collection
        $cliente = Cliente::where('correo',$request->correo)->get()->first();
        if ($cliente)
        {
            if (Hash::check($request->password,$cliente->password))
            {
                $cliente->token = Hash::make($cliente->id.date("Y-m-d h:i:s"));
                $cliente->vigencia = date("Y-m-d h:i:s");
                $cliente->save();
                return json_encode(['token'=>$cliente->token]);
            }
            else
            {
                return false;
            }
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
