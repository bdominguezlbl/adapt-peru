<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap Icons!-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}">
<!--jQUERY-->
<script
src="https://code.jquery.com/jquery-3.7.1.slim.js"
integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc="
crossorigin="anonymous"></script>
<!--DATATABLES-->    
<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<!--DATATABLES EXPORT-->   
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>


  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<body>

    <header class = "fondo-verde">
        <div class="container">
            <div class="row">
                <div class="col  ">
                    <img src="{{ asset('images/rec2.png') }}" alt="Descripción de la imagen" class="logo mt-4">
                </div>
                
                <div class="col-6 ">
                    <div class="row  my-3">
                        <div class="col  text-center text-light">
                            <h1 class="sombra">
                                Adapt Perú
                            </h1> 
                        </div>
                    </div>
                    <div class="row  my-3">
                        <div class="col  text-center text-light">
                            <h1 class="sombra">
                                Manager
                            </h1> 
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col d-flex justify-content-center">

                            <nav class="navbar navbar-expand-lg  navbar-dark">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="{{ url('/manager/dashboard') }}">Home</a>
                                            </li>
                                            
                                        </ul>
                                        
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="row  mt-3 ">
                        <div class="col ">
                            <img src="{{ asset('images/logo_ministerio.png') }}" alt="Descripción de la imagen">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col  ">
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </header>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    Manager
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Solicitudes
                                </a>
                                <ul class="dropdown-menu bg-dark">
                                    <li class="nav-item">
                                        <a class="nav-link text-light " href="{{ route('manager.registradas') }}">Pendientes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="{{ route('manager.rechazados') }}">Rechazadas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="{{ route('manager.aceptadas') }}">Aprobadas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="{{ route('manager.observadas') }}">Observadas</a>
                                    </li>
                                    
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
    </div>

    

    <div class="">
        @yield('content')
    </div>

    <footer>
        <div class="container-fluid my-4 fondo-verde p-2">
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('images/rec2.png') }}" alt="Descripción de la imagen" class="logo ms-4">
                </div>
                <div class="col">
                    <div class="card" >
                        <div class="card-body">
                            <h5 class="card-title">Landing</h5>
                            <p>
                                <a href="#" class="footer_a">Principal</a>
                            </p>
                            <p>
                                <a href="#" class="footer_a">Servicios</a>
                            </p>
                            <p>
                                <a href="#" class="footer_a">Reconocimientos</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" >
                        <div class="card-body">
                            <h5 class="card-title">Empresas</h5>
                            <p>
                                <a href="#" class="footer_a">Principal</a>
                            </p>
                            <p>
                                <a href="#" class="footer_a">Servicios</a>
                            </p>
                            <p>
                                <a href="#" class="footer_a">Reconocimientos</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card me-3" >
                        <div class="card-body">
                            <h5 class="card-title">Recursos</h5>
                            <p>
                                <a href="#" class="footer_a">Principal</a>
                            </p>
                            <p>
                                <a href="#" class="footer_a">Servicios</a>
                            </p>
                            <p>
                                <a href="#" class="footer_a">Reconocimientos</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </footer>
    <!-- Bootstrap JS!-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>