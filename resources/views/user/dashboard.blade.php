@extends('theme.publicbase')

@section('title')
    Panel Control Empresa
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-3">{{$cliente->razon_social}}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Bienvenido: {{$usuario->name}} </h4>
        </div>
    </div>
    <div class="row mt-5 mb-2">
        <div class="col-8">
            <h5><strong>Panel de Control</strong>  | Accede al estatus de avance de cada sede de tu empresa</h5>
        </div>
        <div class="col-4 text-end">
            <a href="{{route('sede.new')}}" class="btn btn-success btn-sm">Nueva Sede</a>
        </div>
    </div>
    
    <div class="border rounded-4 p-3 border-success d-none">
        
        <div class="row">
            <div class="col-3">
                <span class="dash_title"> Sede </span>
            </div>
            <div class="col-3">
                <span class="dash_title"> Etapa </span>
                
            </div>
            <div class="col-3">
                <span class="dash_title"> Responsable </span>
                
            </div>
            <div class="col">
    
            </div>
        </div>

        @foreach($sedes as $sede)

            <div class="row ">
                <div class="col-3">
                    <span class="dash_data">
                        <a href="{{route('sede.show', $sede)}}">{{$sede->nombre}}</a>
                    </span>
                </div>
                <div class="col-3">
                    <span class="dash_data">
                        @if($sede->etapa_actual == 2)
                            <a href="{{route('sede.implementacion', $sede->id)}}"> {{$sede->etapaActual->nombre}} </a>
                        @else
                            {{$sede->etapaActual->nombre}} 
                        @endif
                    </span>                    
                </div>
                <div class="col-3">
                    <span class="dash_data">{{$cliente->nombre_responsable}}  {{$cliente->apellido_responsable}}
                        {{$sede->responsable->name ? $sede->responsable->name : 'No asignado' }}</span>                    
                </div>
                <div class="col">
                    
                </div>
            </div>
        @endforeach
    </div>

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6; /* Add space between lines */
        }
        .navbar {
            background-color: #06A17D;
        }
        .navbar-brand {
            font-size: 2rem;
            font-weight: bold;
            color: white;
        }
        .navbar-nav .nav-link {
            color: white;
        }
        .btn-register {
            background-color: white;
            color: #06A17D;
            border-radius: 20px;
        }
        .content {
            padding: 2rem;
        }
        .content h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #06A17D;
            margin-bottom: 2rem; /* Add more space below the title */
        }
        .content h2 {
            font-size: 1.5rem;
            color: #06A17D;
            margin-bottom: 1.5rem; /* Add more space below the subtitle */
        }
        .btn-add {
            background-color: #06A17D;
            color: white;
            border-radius: 20px;
            transition: transform 0.3s ease;
        }
        .btn-add:hover {
            transform: translateX(5px); /* Move button to the right on hover */
        }
        .table-container, .form-container {
            border: 1px solid #06A17D;
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1rem;
        }
        .table th, .table td {
            text-align: center;
        }
        .table th {
            color: #06A17D;
        }
        .table td a {
            color: #3498db;
        }
        .form-container label {
            font-weight: bold;
        }
        .btn-save {
            background-color: #06A17D;
            color: white;
            border-radius: 20px;
            display: block;
            margin: 0 auto; /* Center the button */
            transition: transform 0.3s ease;
        }
        .btn-save:hover {
            transform: translateY(-5px); /* Move button up on hover */
        }
        .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        .form-group label {
            margin-right: 1rem;
            min-width: 150px; /* Adjust as needed */
        }
        .form-group input {
            flex: 1;
            max-width: 50%; /* Reduce input width to half */
        }
    </style>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Sede</th>
                    <th>Etapa</th>
                    <th>Responsable</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sedes as $sede)
                <tr>
                    <td> 
                        <a href="{{route('sede.show', $sede)}}">{{$sede->nombre}}</a>
                    </td>
                    <td>
                        @if($sede->etapa_actual == 2)
                            <a href="{{route('sede.implementacion', $sede->id)}}"> {{$sede->etapaActual->nombre}} </a>
                        @else
                            {{$sede->etapaActual->nombre}} 
                        @endif
                    </td>
                    <td><span class="dash_data">{{$sede->responsable->name ? $sede->responsable->name : 'No asignado' }}</span> 
                        </td>
                    <td><a href="#"><i class="fas fa-edit"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>



@endsection