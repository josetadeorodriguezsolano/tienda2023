@extends('layouts.general')

@section('titulo', 'Inicio')

@section('main')
    @parent
    <main>
        @foreach ($productos as $producto)
            <article>
                <a href='/productos/detalle/{{$producto->id}}'>{{$producto->nombre}}</a><br>
                <img src="/img/producto.png" width="60px"><br>
                {{$producto->precio}}
            </article>
        @endforeach
    </main>
@endsection
