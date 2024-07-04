@extends('theme.manager')


@section('content')

<div class="container" style="height: 400px;">
    <div class="row justify-content-center">
        <div class="col-12 ">
            Aceptar Empresa 
        </div>
    </div>
    <div class="row">
        <div class="col-7">
            Datos de la Empresa
            <div class="accordion accordion-flush  p-0" id="accordionFlushExample">
                <div class="accordion-item p-0">
                  <h2 class="accordion-header p-0">
                    <button class="accordion-button collapsed  py-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        {{$cliente->razon_social}} /
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <p>RUC: {{$cliente->ruc}}</p>
                        <p>Direccion: {{$cliente->direccion}}</p>
                        <p>Actividad:  {{$cliente->desc_actividades}}</p>
                    </div>
                  </div>
                </div>
                
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed  py-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                     Actividad Economica
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <p>{{$cliente->seccion->name}}</p>
                        <p>{{$cliente->division->name}}</p>
                        <p>{{$cliente->grupo->name}}</p>
                        <p>{{$cliente->clase->name}}</p>
                        
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed py-0" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                       Contacto
                      </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">
                        <p>{{$cliente->nombre_responsable}}  {{$cliente->apellido_responsable}}</p>
                        <p>{{$cliente->telefono_responsable}} </p>
                        <p>{{$cliente->email}} </p>
                          
                      </div>
                    </div>
                  </div>
              </div>
            
            
        </div>
        <div class="col-5">
            Creacion de usuario de acceso:
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <input type="hidden" name="name" value="{{$cliente->nombre_responsable}} {{$cliente->apellido_responsable}}">
                <input type="hidden" name="email" value="{{$cliente->email_responsable}}">
                <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
                <div class="row mb-0">
                    <label for="name" class="col-md-4 col-form-label text-md-end fs-7">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control-sm " name="nombre" value="{{$cliente->nombre_responsable}} {{$cliente->apellido_responsable}}" required autocomplete="name" disable>
                    </div>
                </div>

                <div class="row mb-0">
                    <label for="email" class="col-md-4 col-form-label text-md-end fs-7">Email Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control-sm " name="correo" value="{{$cliente->email_responsable}}" required autocomplete="email" >
                    </div>
                </div>

                <div class="row mb-0">
                    <label for="password" class="col-md-4 col-form-label text-md-end fs-7">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control-sm " name="password" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end fs-7">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control-sm" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>



@endsection