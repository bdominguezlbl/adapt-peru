@extends('theme.publicbase')

@section('content')
<div class="container">
    @if(Session::has('error'))
        <div class="alert alert-sucess">
            {{ Session::get('error') }}
        </div>
    @endif

</div>

<div class="container-fluid  p-0" >
    <div class="row text-light ">
        <div class="col-12">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  
                    <div class="carousel-item active p-5" style="background-image: url('{{ asset('images/carrusel01.jpg') }}');">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 col-lg-8 col-sm-6 mx-auto ">
                                <h1 class="px-5 text-justify">El cambio climático es un desafío para todas las empresas.</h1>
                                <p class="my-5 px-5">¡Súmate al reto de la adaptación al cambio climático!</p>
                                <p class="px-5">
                                    <a href="{{ url('/registro') }}" class="btn btn-success  btn_carrusel btn_registro">Registrarme</a>
                                </p>  
        
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>
                    <div class="carousel-item  p-5" style="background-image: url('{{ asset('images/carrusel02.jpg') }}');">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 col-lg-8 col-sm-6 mx-auto ">
                                <h1 class="px-5 text-justify">¿Cómo una empresa logra reducir su vulnerabilidad ante el cambio climático?</h1>
                                <p class="my-5 px-5">¡Súmate al reto de la adaptación al cambio climático!</p>
                                <p  class="px-5">
                                    <a href="{{ url('/registro') }}" class="btn btn-success  btn_carrusel btn_registro">Registrarme</a>
                                </p>  
                            </div>
                            <div class="col-2"></div>
                        </div>                    
                    </div>
                    <div class="carousel-item  p-5" style="background-image: url('{{ asset('images/carrusel03.jpg') }}');">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 col-lg-8 col-sm-6 mx-auto ">
                                <h1 class="px-5 text-justify">Juntos nos adaptamos mejor al cambio climático.</h1>
                                <p class="my-5 px-5">¡Súmate al reto de la adaptación al cambio climático!</p>
                                <p  class="px-5">
                                    <a href="{{ url('/registro') }}" class="btn btn-success btn_carrusel btn_registro">Registrarme</a>
                                </p>  
                            </div>
                            <div class="col-2"></div>
                        </div>                    
                    </div>
                </div>                
            </div>
        </div>
    </div>    
</div>

<div class="container">
    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-12 px-5 me-auto col-md-8 ms-3 ">
            <div class="row text-container"> 
                <h3>¿Qué es esta iniciativa?</h3> 
            </div>
            <div class="row text-container">
                <p>
                    <strong>Plataforma para la adaptación al cambio climático
                    </strong>
                    <strong class="d-none">Plataforma para el involucramiento del sector privado en la adaptación al cambio climático
                    </strong>
                </p>
            </div>
            <div class="row"><p>Es un sistema de reconocimiento dirigido a las organizaciones del sector privado que aportan a la adaptación al cambio climático del país, mediante acciones focalizadas en la gestión de sus riesgos climáticos en todo el territorio.</p></div>
            <div class="row"></div>
            <div class="row my-4">
                <div class="col mx-auto text-container">
                    <a href="{{ url('/registro') }}" class="btn">EMPIEZA AQUÍ</a>
                </div>
            </div>
           
        </div>
        <div class="col-2"></div>
    </div>
</div>

<div class="container recognition-section">
    
    <div class="row mt-5 recognition-section">
        <div class="col-2"></div>
        <div class="col-8 mx-auto text-center">
            <h2 class="px-5 text-justify">
                ¿Cuáles son los pasos que la iniciativa le sugiere a la empresa para lograr su adaptación?
            </h2>            
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row recognition-section">
        <div class="col-2"></div>
        <div class="col-8 text-center">
            <p class="px-5">
                Las empresas que quieran sumarse al desafío de la adaptación frente al cambio climático siguen la siguiente ruta:
            </p>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-center">
    <!-- Tarjeta 1 -->
        <div class="col-md-2">
            <div class="card text-center fondo-tarjeta1" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-custom-class="tooltip1"
            data-bs-title="Mejore su comprensión sobre cómo el cambio climático afecta y afectará a su empresa, así como qué puede hacer al respecto">
                <div class="card-body">
                    <h5 class="card-title text-light titulo-tarjeta text-nowrap" >1. Identificación</h5>
                   
                    <img src="{{ asset('images/iconos_Identificacion.svg') }}" alt="Descripción de la imagen" class="logo mt-4">
                </div>
            </div>
        </div>
        <!-- Tarjeta 2 -->
        <div class="col-md-2">
            <div class="card text-center fondo-tarjeta2" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-custom-class="tooltip2"
            data-bs-title="Determine las acciones que llevarán a su empresa hacia la adaptación y cómo lo medirá">
            <div class="card-body">
                <h5 class="card-title text-light titulo-tarjeta text-nowrap">2. Implementación</h5>
                <img src="{{ asset('images/iconos_Implementacion.svg') }}" alt="Descripción de la imagen" class="logo mt-4">
            </div>
            </div>
        </div>
        <!-- Tarjeta 3 -->
        <div class="col-md-2">
            <div class="card text-center fondo-tarjeta3" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-custom-class="tooltip3"
            data-bs-title="Haga seguimiento a la implementación de las acciones que reducen su vulnerabilidad">
            <div class="card-body">
                <h5 class="card-title text-light titulo-tarjeta text-nowrap">3. Monitoreo</h5>
                <img src="{{ asset('images/iconos_Monitoreo.svg') }}" alt="Descripción de la imagen" class="logo mt-4">
            </div>
            </div>
        </div>
        <!-- Tarjeta 4 -->
        <div class="col-md-2">
            <div class="card text-center fondo-tarjeta4" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-custom-class="tooltip4"
            data-bs-title="Realice el reporte y evalúe la consecución de los resultados previstos con respecto a su línea base">
            <div class="card-body">
                <h5 class="card-title text-light titulo-tarjeta text-nowrap">4. Evaluación</h5>
                <img src="{{ asset('images/iconos_Evaluacion.svg') }}" alt="Descripción de la imagen" class="logo mt-4">
            </div>
            </div>
        </div>
        <!-- Tarjeta 5 -->
        <div class="col-md-2">
            <div class="card text-center fondo-tarjeta5" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-custom-class="tooltip5"
            data-bs-title="Gestione el conocimiento y replique las buenas prácticas de las acciones de adaptación que implementó">
                <div class="card-body">
                    <h5 class="card-title text-light titulo-tarjeta text-nowrap">5. Actualización</h5>
                    <img src="{{ asset('images/iconos_Actualizacion.svg') }}" alt="Descripción de la imagen" class="logo mt-4">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid container2">
    <div class="container  container2">
        <div class="row mt-5 ">
            <div class="col-2"></div>
            <div class="col-8 px-0 me-auto col-md-8 ms-3 mx-auto">
                <div class="row text-container2 text-light">
                    <h3 class="my-5">¿Por qué me beneficia participar?</h3>
                    <p class="text-light">Participando en esta iniciativa, la empresa logrará ajustar procesos internos y operaciones para reducir su vulnerabilidad frente al cambio climático. Algunos beneficios son:</p>
                    <div class="row">
                        <div class="col">
                            <div class="card text-center fondo-tarjeta5" >
                                <div class="card-body">
                                    <h5 class="card-title text-light titulo-tarjeta text-nowrap">Eficiencia Energética</h5>
                                    <img src="{{ asset('images/iconos_Eficiencia energetica.svg') }}" alt="Descripción de la imagen" class="logo mt-4">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-center fondo-tarjeta5" >
                                <div class="card-body">
                                    <h5 class="card-title text-light titulo-tarjeta text-nowrap">Consumo de agua</h5>
                                    <img src="{{ asset('images/iconos_Condumo de agua.svg') }}" alt="Descripción de la imagen" class="logo mt-4">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-center fondo-tarjeta5" >
                                <div class="card-body">
                                    <h5 class="card-title text-light titulo-tarjeta text-nowrap">Infraestructura resilente</h5>
                                    <img src="{{ asset('images/iconos_Infraestructura resiliente.svg') }}" alt="Descripción de la imagen" class="logo mt-4">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                   
                    

                    

                    <p class="text-light">Pero, la adaptación no se limita a solo sus instalaciones, es fundamental promoverla en toda la cadena de valor logrando:</p>
                    <div class="row">
                        <div class="col">
                            <div class="card text-center fondo-tarjeta5" >
                                <div class="card-body">
                                    <h5 class="card-title text-light titulo-tarjeta text-nowrap">Riesgos</h5>
                                    <img src="{{ asset('images/iconos_Riesgos.svg') }}" alt="Descripción de la imagen" class="logo mt-4">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-center fondo-tarjeta5" >
                                <div class="card-body">
                                    <h5 class="card-title text-light titulo-tarjeta text-nowrap">+ Calidad de productos</h5>
                                    <img src="{{ asset('images/iconos_Calidad de productos.svg') }}" alt="Descripción de la imagen" class="logo mt-4">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-center fondo-tarjeta5" >
                                <div class="card-body">
                                    <h5 class="card-title text-light titulo-tarjeta text-nowrap">+ Relación con clientes</h5>
                                    <img src="{{ asset('images/iconos_Relacion con clientes.svg') }}" alt="Descripción de la imagen" class="logo mt-4">
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    
                    
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8  text-container2 ">
                <a href="{{ url('/registro') }}" class="btn mb-5">¡Quiero Sumarme!</a>
            </div>
            <div class="col-2"></div>
        </div>
            
        
    </div>
</div>
<div class="container-fluid bg-green d-none">
    <div class="row justify-content-around recognition-section">
        <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row justify-content-around">
                        <div class="col-md-5">
                            <div class="card mb-3 fondo-verde tarjeta ">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <i class="bi bi-award medalla" ></i>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                        <h5 class="card-title">Identificación</h5>
                                        <p class="card-text"> Mejore su comprensión sobre cómo el cambio climático afecta y afectará a su empresa, así como qué puede hacer al respecto. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="col-md-5">
                            <div class="card mb-3 fondo-verde tarjeta" >
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <i class="bi bi-award medalla" ></i>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                        <h5 class="card-title">Implementación</h5>
                                        <p class="card-text"> Determine las acciones que llevarán a su empresa hacia la adaptación y cómo lo medirá. </p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        
                       
                    </div>
                </div>
            <!-- Añade más elementos carousel-item aquí para más tarjetas -->
                <div class="carousel-item">
                    <div class="row justify-content-evenly">
                        <div class="col-md-3">
                            <div class="card mb-3 fondo-verde tarjeta2" >
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <i class="bi bi-award medalla" ></i>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                        <h5 class="card-title">Monitoreo</h5>
                                        <p class="card-text"> Haga seguimiento a la implementación de las acciones que reducen su vulnerabilidad </p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-3 fondo-verde tarjeta2" >
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <i class="bi bi-award medalla" ></i>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                        <h5 class="card-title">Evaluación</h5>
                                        <p class="card-text"> Realice el reporte y evalúe la consecución de los resultados previstos con respecto a su línea base. </p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-3 fondo-verde tarjeta2" >
                                <div class="row g-0">
                                    <div class="col-md-3">
                                        <i class="bi bi-award medalla" ></i>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                        <h5 class="card-title">Actualización</h5>
                                        <p class="card-text"> Gestione el conocimiento y replique las buenas prácticas de las acciones de adaptación que implementó. </p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>            
                </div>                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
        
        <script>
            // Configura el intervalo de cambio del carrusel (en milisegundos)
            var myCarousel = document.querySelector('#carouselExampleControls');
            var carousel = new bootstrap.Carousel(myCarousel, {
              interval: 5000 // Cambia cada 5 segundos
            });
            
        </script>
    </div>
</div>


<div class="container-fluid d-none" style="height: 300px">
    <div class="row mt-5 faq-header">
        <div class="col">
            <span>Testimonios</span>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col text-center">
            <span class="normal">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias nemo placeat nam aliquid id sequi.
            </span>
        </div>
    </div>
    <div class="row bg-testimonio" style="height: 150px">
        <div class="col">
            <span class="titulo text-center"></span>
        </div>
    </div>
</div>

<div class="container mb-5" >
    <div class="row text-center my-5">
        <div class="col-2"></div>
        <div class="col-8">
            <span class="faq-header">
                Preguntas Frecuentes
            </span>
        </div>
        <div class="col-2"></div>
    </div>
</div>
<div class="container" >
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 text-center">
            <span class="normal ">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias nemo placeat nam aliquid id sequi.
            </span>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col text-center">
            <span class="normal ">
                Lorem, ipsum dolor sit amet consectetur adipisicing.
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="row mt-3 " >        
                <div class="col-12 col-sm-6 ">
                    <div class="accordion accordion-flush" id="accordionFlushExample1">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Pregunta #1
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample1">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto delectus enim, deleniti dicta vel ab nesciunt hic iste itaque animi.
                                </div>
                            </div>
                        </div>
                        
                    </div>
        
                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Pregunta #2
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample2">
                                <div class="accordion-body">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam obcaecati, ut eos voluptate odio, in labore optio natus exercitationem sed aut architecto ea a adipisci. Consequuntur impedit vero eaque nobis!
                                </div>
                            </div>
                        </div>    
                    </div>
        
                    <div class="accordion accordion-flush" id="accordionFlushExample3">
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Pregunta #3
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample3">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus omnis a, eum saepe cum velit!
                                </div>
                            </div>
                        </div>
                    </div>
        
                </div>
                <div class="col-12 col-sm-6">
                    <div class="accordion accordion-flush" id="accordionFlushExample4">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                Pregunta #4
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample4">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto delectus enim, deleniti dicta vel ab nesciunt hic iste itaque animi.
                                </div>
                            </div>
                        </div>                
                    </div>
        
                    <div class="accordion accordion-flush" id="accordionFlushExample5">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                Pregunta #5
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample5">
                                <div class="accordion-body">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam obcaecati, ut eos voluptate odio, in labore optio natus exercitationem sed aut architecto ea a adipisci. Consequuntur impedit vero eaque nobis!
                                </div>
                            </div>
                        </div>    
                    </div>
        
                    <div class="accordion accordion-flush" id="accordionFlushExample6">
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                Pregunta #6
                                </button>
                            </h2>
                            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample6">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus omnis a, eum saepe cum velit!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>    

        </div>
        <div class="col-2"></div>
    </div>
</div>

<section class="d-none">
    <div class="subscription-box">
       
        <!-- Ensure this is the correct path to your image -->
        <h2>Quiero recibir información</h2>
        <form action="#" method="POST" class="subscription-form">
            <div class="row">
                <div class="col-12 col-md-8 mb-2 mb-md-0">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu email" required>
                  </div>
                <div class="col-12 col-md-4">
                    <button class="btn btn-primary w-100" type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    $(document).ready(function(){
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    });
</script>
@endsection