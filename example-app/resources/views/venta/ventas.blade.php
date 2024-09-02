@extends('header.navbar')
@extends('body.cuerpo')
@section('title', 'Productos')
@section('navbar')
<div class="container">
    <h1>VENTAS</h1>
    <hr>
    <a href="{{ route('ventas.crear') }}" class="btn btn-primary">Agregar Venta</a>
    <hr>
    <h4>LISTA DE VENTAS</h4>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th scope="col">Producto ID</th>
                <th scope="col">Nombre Cliente</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio Total</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach ($ventas as $venta)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $venta->ProductoID }}</td>
                <td>{{ $venta->NombreCliente }}</td>
                <td>{{ $venta->Cantidad }}</td>
                <td>{{ $venta->PrecioTotal }}</td>
                <td>
                    <a href="{{ route('ventas.show', $venta->VentaID) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('ventas.destroy', $venta->VentaID) }}" method="POST" style="display:inline;">
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
