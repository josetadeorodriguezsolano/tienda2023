<div>
    <aside class='filtros'><h3>Filtros</h3>
        <ul>
        @foreach ($filtros as $key => $filtro)
            <li><input type='checkbox'
                @if (isset($activos[$key]))
                    checked
                @endif
                wire:click="filtrar({{$key}})">{{$filtro['texto']}}</li>
        @endforeach
        </ul>
    @foreach ($productos as $producto)
        <article class="producto">
            <a href='/productos/detalle/{{$producto->id}}'>{{$producto->nombre}}</a><br>
            @if (file_exists(base_path()."/public/storage/imagenes/".$producto->id.".jpg"))
                <img src="/storage/imagenes/{{$producto->id}}.jpg" width="60px"><br>
            @else
                <img src="/img/producto.png" width="60px"><br>
            @endif
            {{$producto->precio}}
        </article>
    @endforeach
    {{$productos->links()}}
</div>
