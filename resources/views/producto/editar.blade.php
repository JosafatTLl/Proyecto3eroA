@extends('body.cuerpo')
@extends('header.navbar')
@section('title', 'Ver Producto'.$datos)
@section('navbar')
@section('cuerpo')

<div class="container mt-5">
    <h2>Editar Producto</h2>
    <form action="{{ route('productos.edit', $datos->ProductoID) }}" method="POST">
        @csrf
        @method('PUT') 
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required value="{{$datos->Nombre}}">
        </div>
        <div class="form-group">
            <label for="precio">Precio Unitario</label>
            <input type="number" class="form-control" id="PrecioUnitario" name="PrecioUnitario" step="0.01" required value="{{$datos->PrecioUnitario}}">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required value="{{$datos->stock}}">
        </div>
        <div class="form-group">
            <label for="Descripcion">Descripción</label>
            <input type="text" class="form-control" id="Descripcion" name="Descripcion" rows="4" required value="{{$datos->Descripcion}}">
        </div>
        <button type="submit" class="btn btn-primary">Editar Producto</button>
    </form>

</div>


@endsection()