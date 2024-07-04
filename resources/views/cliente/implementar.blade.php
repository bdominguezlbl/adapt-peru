@extends('theme.private')

@section('title')
    Identificacion
@endsection


@section('content')

<div class="container">
    <h1>Sedes en etapa de Implementación</h1>
    <div class="row mt-3">
        @foreach ($sedes as $sede)
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>
                        {{$sede->nombre}}
                    </span>
                   <span>
                       <a href="{{route('sede.delete',['id'=>$sede->id])}}" class="link-danger"><i class="bi bi-trash"></i></a>
                   </span>
                </div>
                <div class="card-body">
                    <a href="{{ route('sede.show',['sede'=>$sede]) }}" class="btn btn-success btn-sm float-right">Seleccionar</a>

                </div>
            </div>            
        </div>
        @endforeach
        
    </div>
</div>

@endsection