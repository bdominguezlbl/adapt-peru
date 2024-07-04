@extends('theme.publicbase')

@section('title')
    Identificacion de Peligros
@endsection


@section('content')
<style>
    .table {
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid #27ae60; /* Darker green border */
        border-radius: 10px; /* Rounded corners */
        overflow: hidden;
    }
    .table th, .table td {
        width: 12.5%; /* Reduced column width */
        border: 1px solid #27ae60; /* Darker green border */
        text-align: center;
        vertical-align: middle;
    }
    .table th {
        background-color: #2ecc71;
        color: white;
        height: 50px; /* Reduced height for the first row */
    }
    .table td {
        height: 150px; /* Increased row height for other rows */
        
    }
</style>
<div class="container">
    <div aria-label="breadcrumb" class="mt-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Panel de Control</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sede.show', ['sede' => $sede]) }}">{{$sede->nombre}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sede.impactos', ['sede_id' => $sede->id]) }}">Impactos</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col">
            <div class="content">
                <h2 class="mb-4 text-center">(Paso 3) Identificación de las acciones de adaptación </h2>
                <h3 class="text-center">Sede: {{$sede->nombre}}</h3>
                <p class="sub_titulo_paso">¿Qué puede hacer mi empresa para reducir el grado de daño o potencial daño?</p>
                <p class="descripcion_paso">Dados los daños o potenciales daños para sus operaciones propias y su cadena de valor, identificados en el segmento previo, la empresa recibe orientación sobre las acciones de adaptación (set de acciones por sector) que le ayudarán a reducir la exposición, reducir el nivel de sensibilidad y/o incrementar la capacidad de adaptación:</p>
        
            </div>
        </div>
    </div>
    
    <div class="row align-items-center">
        <div class="col-12 justify-content-center">
            <div class="table-container  ">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Cadena de Valor / Peligros</th>
                            <th>Movimientos de masa</th>
                            <th>Inundaciones</th>
                            <th>Cambio en las condiciones de aridez</th>
                            <th>Retroceso glaciar</th>
                            <th>Erosión marino-costera</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Aguas arriba</td>
                            <td>
                                @if (isset($resultado['Movimiento en masa']['Aguas arriba']))
                                    @foreach ($resultado['Movimiento en masa']['Aguas arriba'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['recomendacion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Inundaciones']['Aguas arriba']))
                                @foreach ($resultado['Inundaciones']['Aguas arriba'] as $cat => $elem)
                                <h5>{{$cat}} </h5>
                                
                                    <p>{{$elem['recomendacion']}}</p>
        
                                
                                @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Cambio en condiciones de aridez']['Aguas arriba']))
                                @foreach ($resultado['Cambio en condiciones de aridez']['Aguas arriba'] as $cat => $elem)
                                <h5>{{$cat}} </h5>
                                
                                    <p>{{$elem['recomendacion']}}</p>
        
                                
                                @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Retroceso glaciar']['Aguas arriba']))
                                    @foreach ($resultado['Retroceso glaciar']['Aguas arriba'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>
                                    
                                        <p>{{$elem['recomendacion']}}</p>
        
                                    
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Erosión marino-costera']['Aguas arriba']))
                                    @foreach ($resultado['Erosión marino-costera']['Aguas arriba'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>
                                    <ul>
                                        <p>{{$elem['recomendacion']}}</p>
        
                                    </ul>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Operaciones propias</td>
                            <td>
                                @if (isset($resultado['Movimiento en masa']['Operaciones propias']))
                                    @foreach ($resultado['Movimiento en masa']['Operaciones propias'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['recomendacion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Inundaciones']['Operaciones propias']))
                                    @foreach ($resultado['Inundaciones']['Operaciones propias'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['recomendacion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Cambio en condiciones de aridez']['Operaciones propias']))
                                    @foreach ($resultado['Cambio en condiciones de aridez']['Operaciones propias'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['recomendacion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Retroceso glaciar']['Operaciones propias']))
                                    @foreach ($resultado['Retroceso glaciar']['Operaciones propias'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['recomendacion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Erosión marino-costera']['Operaciones propias']))
                                    @foreach ($resultado['Erosión marino-costera']['Operaciones propias'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['recomendacion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Aguas abajo</td>
                            <td>
                                @if (isset($resultado['Movimiento en masa']['Aguas abajo']))
                                    @foreach ($resultado['Movimiento en masa']['Aguas abajo'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['recomendacion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Inundaciones']['Aguas abajo']))
                                    @foreach ($resultado['Inundaciones']['Aguas abajo'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['recomendacion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Cambio en condiciones de aridez']['Aguas abajo']))
                                    @foreach ($resultado['Cambio en condiciones de aridez']['Aguas abajo'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['recomendacion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Retroceso glaciar']['Aguas abajo']))
                                    @foreach ($resultado['Retroceso glaciar']['Aguas abajo'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['recomendacion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Erosión marino-costera']['Aguas abajo']))
                                    @foreach ($resultado['Erosión marino-costera']['Aguas abajo'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['recomendacion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection