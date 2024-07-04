@extends('theme.private')

@section('title')
    Identificacion de Peligros
@endsection


@section('content')

<div class="container">
    <h2 class="text-center">Identificación de Peligros Sede: {{$sede->nombre}}</h2>

    <form action="{{route('sede.set_distrito')}}" method="post">
        @csrf
        <input type="hidden" name="sede_id" value="{{$sede->id}}">
        <div class="form-group">
            <label for="seccion_id" class="form-label">{{ __('Distrito') }}</label>
            <select name="distrito_id" id="distrito_id" class="form-control">
            @foreach ($distritos as $distrito) 
                <option value="{{$distrito->id}}" @if($distrito->id == $sede->distrito_id) selected @endif>{{$distrito->nombre}}</option>                    
            @endforeach

        </select>

        </div>
        <div class="form-group mt-3">
            <button class="btn btn-success btn-sm">Identificar</button>
        </div>
    </form>
    
    
   
    @if($sede->distrito_id)
    <div class="row mt-4">
        <div class="col-8">
            <table class="table table-striped border">
                <thead>
                    <th>Peligro Físico</th>
                    <th>2020</th>
                    <th>2030</th>
                    <th>2050</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Movimiento en masa</td>
                        <td>Bajo</td>
                        <td>Bajo</td>
                        <td>Bajo</td>
                    </tr>
                    <tr>
                        <td>Inundaciones</td>
                        <td class="text-danger ">Alto</td>
                        <td class="text-danger ">Alto</td>
                        <td class="text-danger ">Muy Alto</td>
                    </tr>
                    <tr>
                        <td>Cambio en condiciones de aridez</td>
                        <td class="text-danger ">Alto</td>
                        <td class="text-danger ">Muy Alto</td>
                        <td class="text-danger ">Muy Alto</td>
                    </tr>
                    <tr>
                        <td>Retroceso glaciar</td>
                        <td>No aplica</td>
                        <td>No aplica</td>
                        <td>No aplica</td>
                    </tr>
                    <tr>
                        <td>Erosión marino-costera</td>
                        <td>No aplica</td>
                        <td>No aplica</td>
                        <td>No aplica</td>
                    </tr>
            </table>
        </div>
        <div class="col-4 d-flex">
            <a href="{{ route('sede.impactos', ['id' => $sede->id]) }}" class="mt-auto btn btn-success btn-sm">continuar</a>
            
        </div>
    </div>
    @endif
</div>

@endsection