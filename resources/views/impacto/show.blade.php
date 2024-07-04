@extends('layouts.app')

@section('template_title')
    {{ $impacto->name ?? __('Show') . " " . __('Impacto') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Impacto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('impactos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Etapa Id:</strong>
                                    {{ $impacto->etapa_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Peligro Fisico Id:</strong>
                                    {{ $impacto->peligro_fisico_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Categoria Id:</strong>
                                    {{ $impacto->categoria_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $impacto->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Clasificacion Id:</strong>
                                    {{ $impacto->clasificacion_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Recomendacion:</strong>
                                    {{ $impacto->recomendacion }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
