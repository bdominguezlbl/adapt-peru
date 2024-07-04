@extends('theme.manager')


@section('content')
<div class="container">
    @if(Session::has('mensaje_exito'))
        <div class="alert alert-sucess">
            {{ Session::get('mensaje_exito') }}
        </div>
    @endif
    
</div>        

<div class="container py-5 text-center"> 
    <div class="row">
        <div class="col-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                <div class="col-md-4">
                    <span class="marcador">{{$pendientes}}</span>    
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title">Empresas Registradas</h5>
                    <p class="card-text">
                        
                        <a href="{{ route('manager.registradas') }}" class="btn btn-success">Ver registradas</a>
                        
                    </p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                <div class="col-md-4">
                    <span class="marcador">{{$rechazados}}</span>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title">Empresas Rechazadas</h5>
                    <p class="card-text"><a href="{{ route('manager.rechazados') }}" class="btn btn-success">Ir a Rechazadas</a></p>
                    <p class="card-text"><small class="text-muted">Last updated 13 mins ago</small></p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                <div class="col-md-4">
                    <span class="marcador">{{$aceptados}}</span>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h5 class="card-title">Empresas Aceptadas</h5>
                    <p class="card-text"><a href="{{ route('manager.aceptadas') }}" class="btn btn-success">Ir a Aceptadas</a></p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection