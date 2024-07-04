<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="clasificacion_id" class="form-label">{{ __('Clasificación') }}</label>
            
            <select name="clasificacion_id" id="clasificacion_id" class="form-control">
                @foreach ($clasificaciones as $name => $id) 
                <option value="{{$id}}" {{ $id == $selectedClasificacionId ? 'selected' : '' }}>{{$name}}</option>                    
                @endforeach
    
            </select>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="etapa_id" class="form-label">{{ __('Etapa de la cadena de valor') }}</label>
            
            <select name="etapa_id" id="etapa_id" class="form-control">
                @foreach ($etapas as $name => $id) 
                <option value="{{$id}}" {{ $id == $selectedEtapaId ? 'selected' : '' }}>{{$name}}</option>                    
                @endforeach
    
            </select>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="peligro_fisico_id" class="form-label">{{ __('Peligro Fisico') }}</label>
            <select name="peligro_fisico_id" id="peligro_fisico_id" class="form-control">
                @foreach ($peligros as $name => $id) 
                <option value="{{$id}}" {{ $id == $selectedPeligroId ? 'selected' : '' }}>{{$name}}</option>                    
                @endforeach
    
            </select>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="categoria_id" class="form-label">{{ __('Categoria') }}</label>
            <select name="categoria_id" id="categoria_id" class="form-control">
                @foreach ($categorias as $name => $id) 
                <option value="{{$id}}" {{ $id == $selectedCategoriaId ? 'selected' : '' }}>{{$name}}</option>                    
                @endforeach
    
            </select>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $impacto?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="recomendacion" class="form-label">{{ __('Recomendación') }}</label>
            <input type="text" name="recomendacion" class="form-control @error('recomendacion') is-invalid @enderror" value="{{ old('recomendacion', $impacto?->recomendacion) }}" id="recomendacion" placeholder="Recomendacion">
            {!! $errors->first('recomendacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>