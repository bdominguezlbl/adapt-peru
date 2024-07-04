@extends('theme.publicbase')


@section('content')
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    
<style>
    body {
        font-family: 'Montserrat', sans-serif;
        background-color: #ffffff;
        color: #333333;
        text-align: center;
        padding: 20px;
    }
    h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #029C78;
    }
    p {
        font-size: 1rem;
        color: #666666;
        margin-bottom: 40px;
    }
    .form-select, .form-control {
        display: inline-block;
        width: auto;
        margin: 10px 20px;
        border-color: #808080;
    }
    #actividadEconomica {
        width: 220%;
    }
    table {
        width: 100%;
        margin: 20px auto;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #808080;
        padding: 20px;
        text-align: center;
    }
    th {
        background-color: #029C78;
        color: #ffffff;
    }
    .btn {
        background-color: #029C78;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 20px;
        margin-top: 20px;
    }
    .btn:hover {
        background-color: #027a5e;
    }
    .form-group {
        display: flex;
        align-items: center;
        margin: 10px 20px;
    }
    .form-group label {
        margin-right: 10px;
    }
</style>
</head>
<body>
<h1>Listado de Participantes</h1>
<p>Conozca las organizaciones que han utilizado esta herramienta. Así podrá acceder a los certificados de reconocimiento y los reportes obtenidos por sus acciones de adaptación frente al cambio climático.</p>

<div class="d-flex justify-content-center">
    <div class="form-group">
        <label for="actividadEconomica">Actividad económica</label>
        <select class="form-select" id="actividadEconomica">
            <option>Todos</option>
        </select>
    </div>
    <div class="form-group">
        <label for="anio">Año</label>
        <select class="form-select" id="anio">
            <option>Todos</option>
        </select>
    </div>
    <div class="form-group">
        <label for="nivel">Nivel</label>
        <select class="form-select" id="nivel">
            <option>Todos</option>
        </select>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>Sector Económico</th>
            <th>Lista de participantes</th>
            <th>Nivel alcanzado</th>
            <th>Año</th>
            <th>Certificados y reportes</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>

@endsection