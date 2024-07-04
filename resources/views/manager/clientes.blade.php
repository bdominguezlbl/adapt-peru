@extends('theme.manager')


@section('content')

<div class="container">
    <div class="row">
        <div class="col ">
            {{$titulo}}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped"  id="empresas">
                    <thead>
                        <tr>
                            <th scope="col">Razón Social</th>
                            <th scope="col">RUC</th>
                            <th scope="col">Fecha Registro</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if ($clientes)
                                @foreach ($clientes as $cliente)
                                <tr>
                                    <td >{{ $cliente->razon_social }}</td>
                                    <td >{{ $cliente->ruc }}</td>
                                    <td >{{ $cliente->created_at }}</td>
                                    <td>
                                    X    
                                    </td>                                
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var oTblReport = $('#empresas')
        oTblReport.DataTable({
            dom: 'Bfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "search": 'Buscar',
            "aLengthMenu":[[5,10,15,25,-1],[5,10,15,25,"All"]],
            "iDisplayLength":15
        });
    
    });
</script>



@endsection