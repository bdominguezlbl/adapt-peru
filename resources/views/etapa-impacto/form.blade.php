<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="etapa" class="form-label">{{ __('Etapa') }}</label>
            <input type="text" name="etapa" class="form-control @error('etapa') is-invalid @enderror" value="{{ old('etapa', $etapaImpacto?->etapa) }}" id="etapa" placeholder="Etapa">
            {!! $errors->first('etapa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>