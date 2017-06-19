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
    <form id="fileupload" class="" method="POST" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <div class="form-group">
        <label>Título</label>
        <input type="text" name="titulo" id="title">
      </div>

      <div class="form-group">
        <label>Descripción</label>
        <textarea name="descripcion"></textarea>
      </div>

      @include('templates.file_uploader_buttons')

      <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-upload"></i>
        <span>Registrar</span>
      </button>

      <input type="hidden" name="latitude" id="latitude" value="{{ $default_latitude }}">
      <input type="hidden" name="longitude" id="longitude" value="{{ $default_longitude }}">
    </form>

    @include('templates.file_uploader_table')
  </div>
</div>
@endsection

@push('extra-js')
<!-- Jquery Fileupload Plugin -->
<script src="{{ asset('js/ui/widget.js') }}"></script>
<script src="{{ asset('js/tmpl.js') }}"></script>
<script src="{{ asset('js/load-image.all.min.js') }}"></script>
<script src="{{ asset('/js/canvas-to-blob.js') }}"></script>
<script src="{{ asset('/js/jquery.fileupload.js') }}"></script>
<script src="{{ asset('/js/jquery.fileupload-process.js') }}"></script>
<script src="{{ asset('/js/jquery.fileupload-image.js') }}"></script>
<script src="{{ asset('/js/jquery.fileupload-validate.js') }}"></script>
<script src="{{ asset('/js/jquery.fileupload-ui.js') }}"></script>
<!-- Settings jquery fileupload -->
<script src="{{ asset('js/upload_images.js')}}"></script>
@endpush

@push('extra-css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fileupload.css') }}">
@endpush