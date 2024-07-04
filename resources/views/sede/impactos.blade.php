@extends('theme.publicbase')

@section('title')
    Identificacion de Impactos
@endsection


@section('content')
<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }
    
    .navbar-brand {
        font-size: 2rem;
        font-weight: bold;
        color: white;
    }
    .navbar-nav .nav-link {
        color: white;
       
    }
    .navbar-nav .nav-link:hover {
        color: #d4d4d4;
    }
    .btn-register {
        background-color: white;
        color: #2ecc71;
        border: 1px solid white;
        border-radius: 20px;
        padding: 0.5rem 1rem;
    }
    .btn-register:hover {
        background-color: #d4d4d4;
        color: #2ecc71;
    }
    .content {
        text-align: center;
        margin: 2rem 0;
    }
    .content h1 {
        font-size: 2.5rem;
        color: #2ecc71;
    }
    .content h2 {
        font-size: 2rem;
        color: #2ecc71;
    }
    .content p {
        color: #2ecc71;
    }
    .table-container {
        
        
    }
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
    .btn-continue {
        background-color: #2ecc71;
        color: white;
        border: none;
        border-radius: 20px;
        padding: 0.5rem 2rem;
    }
    .btn-continue:hover {
        background-color: #27ae60;
    }
</style>
<div class="container ">

    <div aria-label="breadcrumb" class="mt-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Panel de Control</a></li>
            <li class="breadcrumb-item"><a href="{{ route('sede.show', ['sede' => $sede]) }}">{{$sede->nombre}}</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col">
            <div class="content">
                <h2 class="mb-4 text-center">(Paso 2) Identificación de los Impactos Asociados </h2>
                <h3 class="text-center">Sede: {{$sede->nombre}}</h3>
                <p class="sub_titulo_paso">¿Dónde y cómo se manifiesta el daño o potencial daño?</p>
                <p class="descripcion_paso">Profundice su entendimiento respecto a los daños o potenciales daños a los cuáles sus operaciones propias y cadena de valor tendrían que hacer frente</p>
        
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
                                        <p>{{$elem['descripcion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Inundaciones']['Aguas arriba']))
                                @foreach ($resultado['Inundaciones']['Aguas arriba'] as $cat => $elem)
                                <h5>{{$cat}} </h5>
                                
                                    <p>{{$elem['descripcion']}}</p>
        
                                
                                @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Cambio en condiciones de aridez']['Aguas arriba']))
                                @foreach ($resultado['Cambio en condiciones de aridez']['Aguas arriba'] as $cat => $elem)
                                <h5>{{$cat}} </h5>
                                
                                    <p>{{$elem['descripcion']}}</p>
        
                                
                                @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Retroceso glaciar']['Aguas arriba']))
                                    @foreach ($resultado['Retroceso glaciar']['Aguas arriba'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>
                                    
                                        <p>{{$elem['descripcion']}}</p>
        
                                    
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Erosión marino-costera']['Aguas arriba']))
                                    @foreach ($resultado['Erosión marino-costera']['Aguas arriba'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>
                                    <ul>
                                        <p>{{$elem['descripcion']}}</p>
        
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
                                        <p>{{$elem['descripcion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Inundaciones']['Operaciones propias']))
                                    @foreach ($resultado['Inundaciones']['Operaciones propias'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['descripcion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Cambio en condiciones de aridez']['Operaciones propias']))
                                    @foreach ($resultado['Cambio en condiciones de aridez']['Operaciones propias'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['descripcion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Retroceso glaciar']['Operaciones propias']))
                                    @foreach ($resultado['Retroceso glaciar']['Operaciones propias'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['descripcion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Erosión marino-costera']['Operaciones propias']))
                                    @foreach ($resultado['Erosión marino-costera']['Operaciones propias'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['descripcion']}}</p>
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
                                        <p>{{$elem['descripcion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Inundaciones']['Aguas abajo']))
                                    @foreach ($resultado['Inundaciones']['Aguas abajo'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['descripcion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Cambio en condiciones de aridez']['Aguas abajo']))
                                    @foreach ($resultado['Cambio en condiciones de aridez']['Aguas abajo'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['descripcion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Retroceso glaciar']['Aguas abajo']))
                                    @foreach ($resultado['Retroceso glaciar']['Aguas abajo'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['descripcion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if (isset($resultado['Erosión marino-costera']['Aguas abajo']))
                                    @foreach ($resultado['Erosión marino-costera']['Aguas abajo'] as $cat => $elem)
                                    <h5>{{$cat}} </h5>                            
                                        <p>{{$elem['descripcion']}}</p>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="content">
        <p>Continuar para pasar a las recomendaciones</p>
        <a href="{{ route('sede.recomendacion', ['id' => $sede->id]) }}" class="mt-auto btn btn-continue btn-sm mx-auto">Ir al paso 3</a>
            
    </div>
</div>

@endsection