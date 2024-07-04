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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body>
    <header class = "bg-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-2 d-lg-block d-none text-center">
                    <img src="{{ asset('images/logo_adapt.png') }}" alt="Descripción de la imagen" class="logo mt-4">
                </div>
                
                <div class="col-8 col-lg-8 col-sm-6 mx-auto ">
                    <div class="row  mt-3">
                        <div class="col  text-center text-light">
                            <h1 class="title mt-4">
                                AdaptAcción
                            </h1> 
                            <h3 class="title d-none">
                                Plataforma para el involucramiento del sector privado en la adaptación al cambio climático.
                            </h3> 
                            <h5>
                                Herramienta para el involucramiento de actores en la adaptación al cambio climático en el Perú
                            </h5>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <nav class="navbar navbar-expand-sm  navbar-dark">
                                <div class="container-fluid">
                                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>                                      
                                    </button>
                                    

                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <span class="close-menu d-md-none my-2">&times;</span>
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/participantes') }}">Participantes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/estadisticas') }}">Estadisticas</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Servicios</a>
                                                
                                                <ul class="dropdown-menu fondo-main ">
                                                    <li class="nav-item">
                                                        <a class="dropdown-item text-light link-menu" href="{{ url('/consultas') }}">Consultas & Sugerencias</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="dropdown-item text-light link-menu" href="{{ url('/herramientas') }}">Caja de Herramientas</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " href="{{ url('/blog') }}">Blog</a>
                                            </li>
                                            @if($usuario_id =="")
                                            <li class="nav-item ">
                                                <a class="nav-link nav-link-login ms-3" href="{{ url('/ingreso') }}">Login</a>
                                            </li>
                                            @else
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Empresa</a>
                                                <ul class="dropdown-menu fondo-main ">                                                    
                                                    <li class="nav-item">
                                                        <a class="nav-link " href="{{ route('user.index') }}" >Panel de Control</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            <li class="nav-item ">
                                                <a class="nav-link nav-link-login ms-3 " href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                            @endif
                                        </ul>
                                        
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>

                </div>
                <div class="col-2 d-lg-block d-none p-0 d-flex align-items-center justify-content-center">
                    
                    <img src="{{ asset('images/logo_ministerio.png') }}" alt="Descripción de la imagen" class="img-fluid mt-5">
                </div>
            </div>
                <!--
                    <div class="row mt-5 d-none">
                        <div class="col ">
                            <nav class="navbar navbar-expand-lg  navbar-dark  p-0">
                                <ul class="navbar-nav">
                                    <li class="nav-item ">
                                        <a class="nav-link text-nowrap" href="#collapseExample" data-bs-toggle="collapse"  aria-expanded="false" aria-controls="collapseExample">Iniciar Sesión</a>
                                    </li>
                                    
                                </ul>
                                <a href="{{ url('/registro') }}" class="btn btn-light rounded-pill py-0">Registrate</a>
                                
                            </nav>
                        </div>
                    </div>
                -->
            </div>            
        </div>
    </header>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="row fondo-main ">
            <div id="collapseExample" class="collapse  fondo-main py-3 rounded border" style="z-index:1">
                <div class="card card-body fondo-verde">
                    <a class="btn btn-success btn-close" href="#collapseExample" data-bs-toggle="collapse"  aria-expanded="false" aria-controls="collapseExample"></a>
                    <form>
                        <div class="mb-1">
                          <label for="email" class="form-label text-light">Usuario:</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        <div class="mb-1">
                          <label for="exampleInputPassword1" class="form-label text-light">Password:</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div>
                        
                        <button type="submit" class="btn btn-success rounded-pill fondo-main">Entrar</button>
                      </form>
                    
                </div>
            </div>
        </div>
    </form>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    @error('error')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    
                                
    <div class="">
        @if( $usuario_id != "" )
        <div class="container">

            <div class="row">
                <div class="col  ">
                    <div aria-label="breadcrumb" class="mt-1 ">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">1. Identificación</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">2. Implementación</a></li>
                            <li class="breadcrumb-item">3. Monitoreo</li>
                            <li class="breadcrumb-item">4. Evaluación</li>
                            <li class="breadcrumb-item">5. Actualización</li>
                        </ol>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @yield('content')
    </div>

<style>
    .f-body{
        background-color: #055e6d;
            color: white;
            font-family: 'Montserrat', sans-serif;
    }
    .logo1 {
            width: 350px;
            height: auto;
        }
        .logo2 {
          width: 100px;
          height: auto;
      }
        .header-text {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .sub-header-text {
            font-size: 1rem;
        }
        .info-section {
            margin-top: 20px;
        }
        .info-section img {
            width: 300px;
        }
        .contact-info {
            margin-top: 20px;
            font-size:0.7em;
        }
        .contact-info i {
            margin-right: 10px;
        }
        .email-section {
            margin-top: 50px;
        }
        .email-section input {
            border-radius: 20px;
            padding: 10px 20px;
            border: none;
            margin-right: 10px;
        }
        .email-section button {
            border-radius: 20px;
            padding: 10px 20px;
            border: none;
            background-color: #5EE99C;
            color: white;
        }
        .footer {
            margin-top: 20px;
            border-top: 1px solid #00796B;
            padding-top: 10px;
           
        }
        .footer a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .footer .row {
            margin-top: 20px;
        }
        .footer .col-md-12 {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .footer .col-md-12 a {
            margin: 0 10px;
        }
        .copyright {
            margin-top: 10px;
            font-size: 0.8rem;
        }
</style>

    <footer class="f-body mt-5">
        <div class="container text-center">
            <div class="row ">
             <div class="col-md-6 text-start">
              
              <img
                            class="logo1 mt-3"
                            src="{{ asset('images/adapt_logo.png') }}"
                            alt="Ministerio del Ambiente Logo"
                          />
              <div class="info-section">
                <img
                            class="logo2"
                            src="{{ asset('images/minam.png') }}"
                            alt="Ministerio del Ambiente Logo"
                          />
              
              </div>
              <div class="contact-info">
               <div>
                <i class="fas fa-map-marker-alt">
                </i>
                Av. Antonio Miroquesada 425, Magdalena del Mar, Lima – Perú
               </div>
               <div>
                <i class="fas fa-phone-alt">
                </i>
                Central telefónica: (+511) 611 6000
               </div>
              </div>
             </div>
             <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
              <div class="email-section text-center">
               <h2>
                Quiero recibir información
               </h2>
               <input placeholder="Correo electrónico" type="email"/>
               <button>
                Enviar
               </button>
              </div>
             </div>
            </div>
            <div class="footer">
             <div class="row">
              <div class="col-md-12">
               <a href="#">
                INICIO
               </a>
               <a href="#">
                PARTICIPANTES
               </a>
               <a href="#">
                ESTADISTICAS
               </a>
               <a href="#">
                SERVICIOS
               </a>
               <a href="#">
                BLOG
               </a>
              </div>
             </div>
             <div class="copyright">
              Copyright © 2024• AdaptAcción - Todos los derechos reservados
             </div>
            </div>
           </div>
    </footer>

    <footer class="d-none">
        <div class="container-fluid my-4  p-2">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 mb-3 d-none d-lg-block">

                    <div class="footer-logo">
                        <div class="top-row">
                          
                        </div>
                        <div>
                          <img
                            class="sec-logo"
                            src="{{ asset('images/govt-logo.png') }}"
                            alt="Ministerio del Ambiente Logo"
                          />
                          
                        </div>
                      </div>
                
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-3">
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
                <div class="col-lg-3 col-md-6 col-12 mb-3">
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
                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <div class="card " >
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))       
        toastr.{{Session::get('alert-class', 'alert-info') }}(" {{ Session::get('message') }}")
        @endif
        
    </script>
    <!-- Bootstrap JS!-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <script src="{{ asset('js/toastr.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('.nav-item.dropdown').hover(
                function () {
                    $(this).find('.dropdown-toggle').addClass('show');
                    $(this).find('.dropdown-menu').addClass('show');
                },
                function () {
                    $(this).find('.dropdown-toggle').removeClass('show');
                    $(this).find('.dropdown-menu').removeClass('show');
                }
            );
        
            $('.navbar-toggler').click(function() {
            $('#navbarNav').toggleClass('show');
            });

            $('.close-menu').click(function() {
            $('#navbarNav').removeClass('show');
            });

            // Opcional: Cerrar el menú al hacer clic fuera del menú
            $(document).click(function(event) {
            if (!$(event.target).closest('.navbar-collapse, .navbar-toggler').length) {
                $('#navbarNav').removeClass('show');
            }
            });
        });
    </script>
    </body>
</html>