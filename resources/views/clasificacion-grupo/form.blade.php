<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="clasificacion" class="form-label">{{ __('Clasificacion') }}</label>
            <input type="text" name="clasificacion" class="form-control @error('clasificacion') is-invalid @enderror" value="{{ old('clasificacion', $clasificacionGrupo?->clasificacion) }}" id="clasificacion" placeholder="Clasificacion">
            {!! $errors->first('clasificacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>