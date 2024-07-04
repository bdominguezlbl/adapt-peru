@extends('layouts.app')

@section('template_title')
    Impactos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Impactos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('impactos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
                                        <th >Clasificacion </th>
									<th >Etapa</th>
									<th >Peligro Fisico </th>
									<th >Categoria </th>
									<th >Descripcion</th>
                                    <th >Recomendacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($impactos as $impacto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td >{{ $impacto->clasificacionGrupo->clasificacion }}</td>
										<td >{{ $impacto->etapaImpacto->etapa }}</td>
										<td >{{ $impacto->peligroFisico->name }}</td>
										<td >{{ $impacto->categoriaImpacto->categoria }}</td>
										<td >{{ $impacto->descripcion }}</td>
                                        <td >{{ $impacto->recomendacion }}</td>

                                            <td>
                                                <form action="{{ route('impactos.destroy', $impacto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('impactos.show', $impacto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('impactos.edit', $impacto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $impactos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
