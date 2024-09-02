@extends('header.navbar')
@extends('body.cuerpo')
@section('title', 'Productos')
@section('navbar')


<div class="container">
  <h1>PRODUCTOS</h1>
  <hr>
  <a href="{{route('productos.crear')}}" class="btn btn-primary">Agregar Producto</a>
  <hr>
  LISTA DE PRODUCTOS
    <table class="table">
        <thead>
          <tr>
            
            <th scope="col">#</th>
            <th scope="col">nombre</th>
            <th scope="col">stock</th>
            <th scope="col">Precio Unitario</th>
            <th scope="col">Descripcion</th>
          </tr>
        </thead>
        
        <tbody>
          @php $i = 1 ;@endphp
            @foreach ($productos as $producto)
            <tr>
                <th scope="row"></th>
                <th scope="col">{{$i++}}</th>
                <td>{{$producto->Nombre}}</td>
                <td>{{$producto->stock}}</td>
                <td>{{$producto->PrecioUnitario}}</td>
                <td>{{$producto->Descripcion}}</td>
                <td>
                  <a href="{{route ('productos.show', $producto ->ProductoID)}}" class="btn btn-primary">Editar</a>
                  <form action="{{route('productos.destroy', $producto->ProductoID)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                  </form>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
</div>
    
    
@endsection()