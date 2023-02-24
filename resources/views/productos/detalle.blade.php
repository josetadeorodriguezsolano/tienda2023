@extends('layouts.general')

@section('titulo', 'Inicio')

@section('main')
    @parent
    <main>
        <h2>{{$producto->nombre}}</h2>
        <h3>Precio:{{$producto->precio}}</h3>
        <h3>Envio:{{$producto->envio}}</h3>
        <aside>Detalle:{{$producto->detalle}}</aside>
        <a href="/productos/eliminar/{{$producto->id}}">Eliminar</a>
        <a href="/productos/modificar/{{$producto->id}}">Modificar</a>
    </main>
@endsection

@section('aside')
@endsection
