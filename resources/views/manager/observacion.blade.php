@extends('theme.manager')


@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            IDENTIFICACION DEL CLIENTE
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('cliente.store') }}" method="post">
                @csrf
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="seccion_i">Observaciones</span>
                    
                    <select class="form-control" aria-label="Small" id="observacion_id" name="observacion_id"  required>
                        <option value="">Seleccione una observacion</option>
                        @foreach ($observaciones as $observacion)
                            <option value="{{$observacion->id}}">{{$observacion->name}}</option>
                        @endforeach

                    </select>
                    
                </div> 
            </form>
        </div>
    </div>
</div>
En construccion: Rechazo parcial de una solicitud (solicitud con observaciones) ,falta definir los motivos de observacion
@endsection