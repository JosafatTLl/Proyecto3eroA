@extends('body.cuerpo')
@extends('header.navbar')

@section('title', 'Creando Venta')

@section('navbar')
@section('cuerpo')

<div class="container">
    <h2 class="text-center my-4">Registrar Nueva Venta</h2>
    <!-- Mostrar mensajes de error si los hay -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf
        <!-- Selección de Producto -->
        <div class="mb-3">
            <label for="ProductoID" class="form-label">Producto</label>
            <select class="form-control" id="ProductoID" name="ProductoID" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->ProductoID }}" data-precio="{{ $producto->PrecioUnitario }}" data-stock="{{ $producto->stock }}">
                        {{ $producto->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Nombre del Cliente -->
        <div class="mb-3">
            <label for="NombreCliente" class="form-label">Nombre del Cliente</label>
            <input type="text" class="form-control" id="NombreCliente" name="NombreCliente" value="{{ old('NombreCliente') }}" required>
        </div>

        <!-- Cantidad -->
        <div class="mb-3">
            <label for="Cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="Cantidad" name="Cantidad" value="{{ old('Cantidad') }}" required>
        </div>

        <!-- Precio Total -->
        <div class="mb-3">
            <label for="PrecioTotal" class="form-label">Precio Total</label>
            <input type="number" step="0.01" class="form-control" id="PrecioTotal" name="PrecioTotal" value="{{ old('PrecioTotal') }}" required readonly>
        </div>

        <!-- Botón para Registrar la Venta -->
        <button type="submit" class="btn btn-primary">Registrar Venta</button>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const productoSelect = document.getElementById('ProductoID');
        const cantidadInput = document.getElementById('Cantidad');
        const precioTotalInput = document.getElementById('PrecioTotal');

        function calcularPrecioTotal() {
            const precioUnitario = parseFloat(productoSelect.selectedOptions[0].getAttribute('data-precio')) || 0;
            const cantidad = parseInt(cantidadInput.value) || 0;
            const precioTotal = precioUnitario * cantidad;
            precioTotalInput.value = precioTotal.toFixed(2);
        }

        function verificarStock() {
            const productoID = productoSelect.value;
            const cantidad = parseInt(cantidadInput.value) || 0;
            const stockDisponible = parseInt(productoSelect.selectedOptions[0].getAttribute('data-stock')) || 0;

            if (cantidad > stockDisponible) {
                alert(`No hay suficiente stock. Stock disponible: ${stockDisponible}`);
                cantidadInput.value = '';
                precioTotalInput.value = '';
            }
        }

        productoSelect.addEventListener('change', function () {
            calcularPrecioTotal();
            verificarStock();
        });

        cantidadInput.addEventListener('input', function () {
            calcularPrecioTotal();
            verificarStock();
        });
    });
</script>


@endsection
