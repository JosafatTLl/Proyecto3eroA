@extends('header.navbar')
@extends('body.cuerpo')

@section('title', 'Inicio')

@section('navbar')
@section('cuerpo')
<div class="container">
    <div class="jumbotron text-center my-4">
        <h1 class="display-4">Bienvenido a Nuestro Sitio</h1>
        <p class="lead">Tu lugar para encontrar lo mejor en productos y servicios.</p>
        <a href="{{ route('productos.index') }}" class="btn btn-primary btn-lg">Ver Productos</a>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Nuestros Servicios</h2>
            <p>Ofrecemos una amplia gama de servicios para satisfacer tus necesidades.</p>
        </div>
        <div class="col-md-6">
            <h2>Contáctanos</h2>
            <p>¿Tienes preguntas? ¡Estamos aquí para ayudarte! <a>Contáctanos</a></p>
        </div>
    </div>
</div>
@endsection()
