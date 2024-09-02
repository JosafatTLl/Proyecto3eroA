@extends('body.cuerpo')

@section('title', 'Login')

@section('cuerpo')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Fondo de la página para darle contraste -->
<div class="bg-light vh-100">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="row w-100">
            <div class="col-md-8 col-lg-6 col-xl-4 mx-auto">
                <div class="card shadow-lg border-light rounded-lg">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4">Iniciar sesión</h3>
                        <form id="login-form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember" class="form-check-label">Recordar contraseña</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>¿No tienes una cuenta? <a href="/register" class="text-primary">Regístrate aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const emailField = document.getElementById('email');
    const passwordField = document.getElementById('password');
    const rememberMeCheckbox = document.getElementById('remember');

    // Cargar datos guardados en localStorage
    if (localStorage.getItem('savedEmail')) {
        emailField.value = localStorage.getItem('savedEmail');
        rememberMeCheckbox.checked = true;
    }
    if (localStorage.getItem('savedPassword') && rememberMeCheckbox.checked) {
        passwordField.value = localStorage.getItem('savedPassword');
    }

    // Guardar datos en localStorage al enviar el formulario
    document.getElementById('login-form').addEventListener('submit', () => {
        if (rememberMeCheckbox.checked) {
            localStorage.setItem('savedEmail', emailField.value);
            localStorage.setItem('savedPassword', passwordField.value);  // Nota: Inseguro
        } else {
            localStorage.removeItem('savedEmail');
            localStorage.removeItem('savedPassword');
        }
    });
});
</script>

@endsection
