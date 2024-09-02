@extends('body.cuerpo')
@extends('header.navbar')

@section('title', 'Editar Venta' .$datos)
@section('navbar')
@section('cuerpo')

<div class="container mt-5">
    <form action="{{ route('ventas.update', $datos->VentaID) }}" method="POST">
        @csrf
        @method('PUT') 
        <!-- Selección de Producto -->
        <div class="mb-3">
            <label for="ProductoID" class="form-label">Producto</label>
            <input class="form-control" id="ProductoID" name="ProductoID" required value="{{$datos->ProductoID}}">
            </select>
        </div>

        <!-- Nombre del Cliente -->
        <div class="mb-3">
            <label for="NombreCliente" class="form-label">Nombre del Cliente</label>
            <input type="text" class="form-control" id="NombreCliente" name="NombreCliente" required value="{{$datos->NombreCliente}}">
        </div>

        <!-- Cantidad -->
        <div class="mb-3">
            <label for="Cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="Cantidad" name="Cantidad" required value="{{$datos->Cantidad}}">
        </div>

        <!-- Precio Total -->
        <div class="mb-3">
            <label for="PrecioTotal" class="form-label">Precio Total</label>
            <input type="number" step="0.01" class="form-control" id="PrecioTotal" name="PrecioTotal" required value="{{$datos->PrecioTotal}}">
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
