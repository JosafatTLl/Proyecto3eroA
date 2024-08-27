<header>  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="resources\img\duo.png" alt="">
        <a class="navbar-brand" href="{{ url('/') }}">MiApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/productos') }}">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">Acerca de</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('logout') }}">Salir</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> Usuario
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/profile') }}">Perfil</a>
                        <a class="dropdown-item" href="{{ url('/settings') }}">Configuración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @yield('navbar')
    @vite('resources/js/app.js')
</header>
   
