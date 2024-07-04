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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="  crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
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

                    <div class="row ">
                        <div class="col d-flex justify-content-center">

                            <nav class="navbar navbar-expand-lg  navbar-dark border rounded fondo-main">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="{{ route('identificacion') }}">Identificación</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo $cliente->etapa_actual < 2 ? 'disabled' : ''; ?>" href="{{ url('/cliente/implementacion') }}">Implementación</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo $cliente->etapa_actual < 3 ? 'disabled' : ''; ?>" href="{{ url('/cliente/monitoreo') }}">Monitoreo</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo $cliente->etapa_actual < 4 ? 'disabled' : ''; ?>" href="{{ url('/cliente/evaluacion') }}">Evaluación</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo $cliente->etapa_actual < 5 ? 'disabled' : ''; ?>" href="{{ url('/cliente/actualizacion') }}">Actualización</a>
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
                <a class="navbar-brand text-white" href="{{ url('/user/dashboard') }}">
                    Dashboard
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


    </footer><script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
    
        
        toastr.{{Session::get('alert-class', 'alert-info') }}(" {{ Session::get('message') }}")
        @endif
        
        </script>
    <!-- Bootstrap JS!-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <script src="{{ asset('js/toastr.js') }}" type="text/javascript"></script>
   
    <!-- Bootstrap JS!-->
</body>
</html>