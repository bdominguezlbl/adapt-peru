@extends('theme.private')


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
    <div class="col">
        Bienvenido {{$cliente->razon_social}}
    </div>
</div>
</div>
@endsection