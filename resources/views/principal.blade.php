<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <main>
        @foreach ($productos as $producto)
            <article>
                {{$producto->nombre}}<br>
                <img src="/img/producto.png" width="60px"><br>
                {{$producto->precio}}
            </article>
        @endforeach
    </main>
</body>
</html>
