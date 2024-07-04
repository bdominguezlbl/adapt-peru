@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Clasificacion Grupo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Clasificacion Grupo</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('clasificacion-grupos.update', $clasificacionGrupo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('clasificacion-grupo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
