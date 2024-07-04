@extends('layouts.app')

@section('template_title')
    Lugares
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{$ciudad->name}}
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{$ciudad->area}}
        </div>
    </div>
    <div class="row">
        <div class="col">
            {{$lat}}/{{$long}}
        </div>
    </div>
    <div class="row">
        <div class="col">
         ->   {{$pertenece}}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('place.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                {{ __('Create New') }}
              </a>
        </div>
    </div>
</div>
@endsection