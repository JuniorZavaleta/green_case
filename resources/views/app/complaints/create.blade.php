@extends('app.layout.base')

@section('content')
<div class="row">
    <h2>Registrar caso de contaminación</h2>
</div>

@if ($errors->all())
    <ul class="parsley-errors-list filled">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="row">
    <div class="col-xs-12">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-container">
            <div class="form-group">
                <div class="col-xs-3 col-xs-offset-1 col-sm-2">
                    <label class="control-label">Tipo de Contaminación</label>
                </div>
                <div class="col-xs-4 col-sm-6 col-lg-4">
                    <select class="form-control" name="contamination_type" id="contamination_type">
                        <option value="">Seleccione el tipo de contaminación</option>
                        @foreach($contamination_types as $type)
                            <option value={{ $type->id }} {{ ( old('contamination_type') == $type->id) ? 'selected' : '' }}>{{ $type->description }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group" style="width: 700px; margin-right: auto; margin-left: auto;">
                <div class="col-xs-3 col-xs-offset-1 col-sm-2">
                    <label class="control-label">Ubicación</label>
                </div>
                <div id="map" class="col-xs-6 col-sm-8 col-lg-6"></div>
            </div>

            <div class="form-group">
                <div class="col-xs-3 col-xs-offset-1 col-sm-2">
                    <label class="control-label">Imagen 1</label>
                </div>
                <div class="col-xs-6 col-sm-8 col-lg-6">
                    <input type="file" name="image_1">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-3 col-xs-offset-1 col-sm-2">
                    <label class="control-label">Imagen 2</label>
                </div>
                <div class="col-xs-6 col-sm-8 col-lg-6">
                    <input type="file" name="image_2">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-3 col-xs-offset-1 col-sm-2">
                    <label class="control-label">Imagen 3</label>
                </div>
                <div class="col-xs-6 col-sm-8 col-lg-6">
                    <input type="file" name="image_3">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-3 col-xs-offset-1 col-sm-2">
                    <label class="control-label">Comentario</label>
                </div>
                <textarea rows="4" cols="50" name="commentary">
                </textarea>
            </div>

            <div class="form-group">
                <div class="col-xs-6 col-xs-offset-1">
                    <button class="btn btn-primary" name="register_button" type="submit" value="register">Registrar</button>
                </div>
            </div>
        </div>
        <input type="hidden" name="latitude" id="latitude" value="{{ $default_latitude }}">
        <input type="hidden" name="longitude" id="longitude" value="{{ $default_longitude }}">
    </form>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}"></script>
<script src="{{ asset('js/location.js') }}"></script>
@endsection