<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="sede_id" class="form-label">{{ __('Sede Id') }}</label>
            <input type="text" name="sede_id" class="form-control @error('sede_id') is-invalid @enderror" value="{{ old('sede_id', $peligroSede?->sede_id) }}" id="sede_id" placeholder="Sede Id">
            {!! $errors->first('sede_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="peligro_fisico_id" class="form-label">{{ __('Peligro Fisico Id') }}</label>
            <input type="text" name="peligro_fisico_id" class="form-control @error('peligro_fisico_id') is-invalid @enderror" value="{{ old('peligro_fisico_id', $peligroSede?->peligro_fisico_id) }}" id="peligro_fisico_id" placeholder="Peligro Fisico Id">
            {!! $errors->first('peligro_fisico_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="peligro_year_id" class="form-label">{{ __('Peligro Year Id') }}</label>
            <input type="text" name="peligro_year_id" class="form-control @error('peligro_year_id') is-invalid @enderror" value="{{ old('peligro_year_id', $peligroSede?->peligro_year_id) }}" id="peligro_year_id" placeholder="Peligro Year Id">
            {!! $errors->first('peligro_year_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="riesgo_id" class="form-label">{{ __('Riesgo Id') }}</label>
            <input type="text" name="riesgo_id" class="form-control @error('riesgo_id') is-invalid @enderror" value="{{ old('riesgo_id', $peligroSede?->riesgo_id) }}" id="riesgo_id" placeholder="Riesgo Id">
            {!! $errors->first('riesgo_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>