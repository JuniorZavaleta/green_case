@extends('admin.layout.base')

@section('content')
<div class="row">
    <h2>Registrar actividad para el caso #{{ $complaint->id }}</h2>
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
@endsection