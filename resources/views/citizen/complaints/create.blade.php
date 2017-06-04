@extends('layouts.base')

@section('content')
<div class="row">
    <h2>Registrar caso de contaminación</h2>
</div>
<div class="row">
    <form class="form-horizontal" method="POST">
        {!! csrf_field() !!}
        <div class="form-container">
            <div class="form-group">
                <div class="col-xs-3 col-xs-offset-1 col-sm-2">
                    <label class="control-label">Tipo de Contaminación</label>
                </div>
                <div class="col-xs-6 col-sm-8 col-lg-6">
                    <select class="form-control" name="contamination_type" id="contamination_type">
                        <option value="">Seleccione el tipo de contaminación</option>
                        @foreach($contamination_types as $type)
                            <option value={{ $type->id }} {{ ( old('contamination_type') == $type->id) ? 'selected' : '' }}>{{ $type->description }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="form-group">
                <div class="col-xs-6 col-xs-offset-1">
                    <button class="btn btn-primary" name="register_button" type="submit" value="register">Registrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection