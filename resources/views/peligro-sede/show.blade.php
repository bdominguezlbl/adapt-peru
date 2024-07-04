@extends('layouts.app')

@section('template_title')
    {{ $peligroSede->name ?? __('Show') . " " . __('Peligro Sede') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Peligro Sede</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('peligro-sedes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Sede Id:</strong>
                                    {{ $peligroSede->sede_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Peligro Fisico Id:</strong>
                                    {{ $peligroSede->peligro_fisico_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Peligro Year Id:</strong>
                                    {{ $peligroSede->peligro_year_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Riesgo Id:</strong>
                                    {{ $peligroSede->riesgo_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
