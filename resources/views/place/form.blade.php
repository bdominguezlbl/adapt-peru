@extends('layouts.app')

@section('template_title')
    Crear Lugar
@endsection

@section('content')
<div class="container">
    <form>
    <div class="row">
        <div class="col">
                <div class="mb-3">
                    <label for="FormControlInput1" class="form-label">Direccion</label>
                    <input type="text" class="form-control" id="FormControlInput1" placeholder="direccion">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>



@endsection