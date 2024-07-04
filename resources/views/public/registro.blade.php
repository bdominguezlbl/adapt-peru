@extends('theme.publicbase')

@section('title')
Formualrio de Registro
@endsection

@section('content')

@if(Session::has('mensaje_warning'))
    <div class="alert alert-warning">
        {{ Session::get('mensaje_warning') }}
    </div>
@endif
@if(Session::has('mensaje_exito'))
    <div class="alert alert-sucess">
        {{ Session::get('mensaje_exito') }}
    </div>
@endif

<div class="container-fluid py-5 fondo_form">
    <div class="row text-center">
        <div class="col fondo_form">
            <h1>Inscríbete</h1>
        </div>
    </div>
    <div class="row text-center ">
        <div class="col fondo_form">
            <h3>Sé parte de la iniciativa</h3>
        </div>
    </div>
</div>

<div class="container-fluid fondo_form">
    <div class="container">
        <div class="row">
            <div class="col fondo_form">
                <h3>Identifique su empresa</h3>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid fondo_form">
    <div class="container">

        <div class="row justify-content-center">
            <form action="{{ route('validate_ruc') }}"   method="POST">
                @csrf
                <div class="col-10 mx-auto">
                    <div class="input-group input-group-sm mb-3">
                        <label for="ruc" class="me-3">R.U.C:</label>
                        <input type="text" class="form-control" placeholder=""  aria-describedby="btn_validar" id="ruc" name="ruc" value="{{ $datos['numeroDocumento'] ?? ''}}" maxlength="11" required>
                        <button class="btn btn-outline-secondary " type="submit" id="btn_validar">Validar</button>
                    </div>
                </div>
            </form>
        </div>
    
        <form action="{{ route('cliente.store') }}"   method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="ruc" value="{{$datos['numeroDocumento'] ?? ''}}">
            <input type="hidden" name="latitud" value="{{$latitud ?? '' }}">
            <input type="hidden" name="longitud" value="{{$longitud ?? ''}}">
            <input type="hidden" name="razon_social" value="{{ $datos['razonSocial'] ?? ''}}">
            <div class="row justify-content-center">
                <div class="col-10 mx-auto">
                    <div class="input-group input-group-sm mb-3">
                        
                        <label for="nombre_empresa" class="me-3">Razón Social:</label>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="nombre_empresa_i" id="nombre_empresa" name="nombre_empresa" value="{{ $datos['razonSocial'] ?? ''}}" disabled>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        
                        <label for="desc_actividades" class="me-3">Descripción de <br> Actividades:</label>
                        <textarea class="form-control" aria-label="Descripcion" aria-describedby="actividades_i" id="desc_actividades" name="desc_actividades" value=""></textarea>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        
                        <label for="direccion" class="me-3">Dirección:</label>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="direccion_i" id="direccion" name="direccion" value="{{ $datos['direccion'] ?? ''}}">
                    </div>
                    
                </div>
    
            </div>
            <h3>
                Seleccione la clasificación CIIU de la actividad económica principal de su organización:
            </h3>
            <div class="row justify-content-center">
                <div class="col-10 mx-auto">
                    <div class="input-group input-group-sm mb-3">
                        
                        <label for="seccion_id" class="me-3">Sección :</label>
                        <select class="form-control" aria-label="Small" id="seccion_id" name="seccion_id" onchange="limpiar('division');limpiar('grupo');limpiar('clase');cargarSiguiente(this,'division_id','seccion','divisiones');" required>
                            <option value="">Seleccione una sección</option>
                            @foreach ($secciones as $seccion)
                                <option value="{{$seccion->id}}">{{$seccion->name}}</option>
                            @endforeach
    
                        </select>
                        
                    </div>                 
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 mx-auto">
                    <div class="input-group input-group-sm mb-3">
                        
                        <label for="division_id" class="me-3">División :</label>
                        <select class="form-control" aria-label="Small" id="division_id" name="division_id" onchange="limpiar('grupo');limpiar('clase');cargarSiguiente(this,'grupo_id','division','grupos')" required>
                            <option value="">Seleccione una división</option>
                            
                        </select>                   
                    </div> 
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 mx-auto">
                    <div class="input-group input-group-sm mb-3">
                        
                        <label for="grupo_id" class="me-3">Grupo :</label>
                        <select class="form-control" aria-label="Small" id="grupo_id" name="grupo_id" onchange="limpiar('clase');cargarSiguiente(this,'clase_id','grupo','clases')" required>
                            <option value="">Seleccione un grupo</option>
                        </select>                   
                    </div> 
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 mx-auto">
                    <div class="input-group input-group-sm mb-3">
                        <label for="clase_id" class="me-3">Clase :</label>
                        <select class="form-control" aria-label="Small" id="clase_id" name="clase_id" required>
                            <option value="">Seleccione una Clase</option>
                        </select>                   
                    </div> 
                </div>
            </div>
    
            <h3 class="mt-4">
                Indique los datos del/a Coordinador/a de la Gestión de la Acción de Adaptación de su organización:
            </h3>
            <div class="row mt-4 justify-content-center">
                <div class="col-10 mx-auto">
                    <div class="input-group input-group-sm mb-3">
                        <label for="nombre_responsable" class="me-3">Nombres :</label>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="nombre_i" id="nombre_responsable" name="nombre_responsable" >
                    </div>                
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 mx-auto">
                    <div class="input-group input-group-sm mb-3">
                        <label for="apellido_responsable" class="me-3">Apellidos :</label>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="apellido_i" id="apellido_responsable" name="apellido_responsable" >
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5 ms-auto">
                    <div class="input-group input-group-sm mb-3">
                        <label for="email_responsable" class="me-3">Correo :</label>
                        <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="email_i" id="email_responsable" name="email_responsable" >
                    </div>
                </div>
                <div class="col-5 me-auto">
                    <div class="input-group input-group-sm mb-3">
                        <label for="telefono_responsable" class="me-3">Teléfono :</label>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="telefono_i" id="telefono_responsable" name="telefono_responsable" >
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 mx-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="acuerdo_ckeck" name="acuerdo_check" required>
                        <label class="form-check-label fw-semibold" for="acuerdo_ckeck">
                          Estoy de acuerdo con las condiciones de la plataforma. <a href="{{ route('descargar.archivo', ['nombreArchivo' => 'terminos_y_condiciones.pdf']) }}">Ver terminos y condiciones</a>
                          
                        </label>
                      </div>
                </div>           
            </div>
            <div class="row pb-4 justify-content-center">
                <div class="col-10 mx-auto my-3">
                    <div class="text-center text-container">
                        <button type="submit" class="btn " id="btn_registrar">Registrarme</button>
                    </div>
                    
                </div>
            </div>
            
        </form>
    </div>

</div>

<script>
    function cargarSiguiente(ElementoSelected,NextId,Desde,Hasta){
        let elemento_id=ElementoSelected.value;
        url=Desde+'/'+elemento_id+'/'+Hasta;
        fetch(url)
        .then(function(response){
            return response.json();
        })
        .then(function(jsonData){
            console.log(jsonData)
            llenarSelect(jsonData,NextId)
        })
        ;
    }
    //seccion-division
    //division-grupo
    //grupo-clase

    function  limpiar(TargetSelect){
        var selectElement = document.getElementById(TargetSelect+'_id');
        // Asignar una lista vacía de opciones al select
        selectElement.options.length = 0;
        let NewOption = document.createElement('option');
        NewOption.text = "Seleccione "+TargetSelect;
        selectElement.add(NewOption);
    }

    function llenarSelect(p_jsonData,p_selectorId){
        let selector=document.getElementById(p_selectorId)
        p_jsonData.forEach(function(elemento) {
            let NewOption = document.createElement('option');
            NewOption.text = elemento.name;
            NewOption.value = elemento.id;
            selector.add(NewOption); 
        });
    }
</script>

@endsection