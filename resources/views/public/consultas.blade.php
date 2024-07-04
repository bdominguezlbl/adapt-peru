@extends('theme.publicbase')


@section('content')
<div class="container fondo_form">
    <div class="row  justify-content-center">
        <div class="col my-4">
            <h1 class="text-center">Consultas y Sugerencias</h1>

        </div>
    </div>
    <form action="{{ route('consultas.store') }}"   method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8 ">
                <div class="input-group input-group-sm my-3">
                    
                    <label for="nombre" class="me-2 fw-semibold">Nombre y apellido </label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="nombre" id="nombre" name="nombre" required>
                </div>
                <div class="input-group input-group-sm mb-3">
                    
                    <label for="email" class="me-2 fw-semibold">Correo electrónico </label>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="email" id="email" name="email" required>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <label for="consulta" class="me-2 fw-semibold">Consulta o sugerencia </label>
                    <textarea class="form-control" aria-label="Sizing example input" aria-describedby="consulta" id="consulta" name="consulta" placeholder="Deje su consulta o sugerencia" style="height: 6em"></textarea>
                </div>

                <div class="input-group input-group-sm mb-3 justify-content-center">
                    <button type="submit" class="btn button_green rounded-pill" id="btn_enviar">Enviar</button>
                </div>
            </div>




        </div>
    </form>
</div>
    
@endsection