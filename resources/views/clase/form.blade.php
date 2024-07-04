<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="seccion_id" class="form-label">{{ __('Grupo') }}</label>
        <select name="grupo_id" id="grupo_id" class="form-control">
            @foreach ($grupos as $name => $id) 
            <option value="{{$id}}">{{$name}}</option>                    
            @endforeach

        </select>
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Clase') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $clase?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>