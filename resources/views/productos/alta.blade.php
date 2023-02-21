<style>
    .is-invalid{
        background-color: red;
    }
</style>
<!--@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif-->
<form name='altaProductos' method="post" action="/productos/alta">
    @csrf
    <label>Nombre</label><input class="@error('nombre') is-invalid @enderror"
    type='text' name='nombre' value="{{ old('nombre') }}"/>
    @error('nombre')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    <br>
    <label>Precio</label><input type='number' name='precio' step=".01" value="{{ old('precio') }}"/>
    @error('precio')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    <br>
    <label>Existencia</label><input type='number' name='existencia' value="{{ old('existencia') }}"/>
    @error('existencia')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    <br>
    <label>Consto de envio</label><input type='number' name='envio' step=".01" value="{{ old('envio') }}"/>
    @error('envio')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    <br>
    <label>Detalle</label><textarea name='detalle' cols="100" rows="10">{{ old('detalle') }}</textarea>
    @error('detalle')
        <span class="alert alert-danger">{{ $message }}</span>
    @enderror
    <br>
    <input type='submit' value='Dar de alta'/>
</form>
