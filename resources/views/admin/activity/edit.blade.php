@extends('admin.layout.base')

@section('content')
<div class="row">
  <h2>Editar actividad #{{ $activity->id }} para el caso #{{ $complaint->id }}</h2>
</div>

@if ($errors->all())
  <ul class="parsley-errors-list filled">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<div class="row">
  <div class="col-xs-12 col-sm-9">
    <form id="fileupload" class="" method="POST" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <div class="form-group">
        <label>Título</label>
        <input type="text" name="titulo" id="title" class="form-control" value="{{ $activity->title }}">
      </div>

      <div class="form-group">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control" style="height: 120px;">{{ $activity->description }}</textarea>
      </div>

      @if ($activity->is_last)
      <div class="form-group">
        <div class="checkbox">
          <label>
            <input name="last_activity" value="1" type="checkbox" {{ $complaint->is_finished ? 'checked' : '' }}>¿Es la última actividad?
          </label>
        </div>
      </div>
      @endif

      <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-upload"></i>
        <span>Actualizar</span>
      </button>
    </form>

    @include('templates.file_uploader_table')
  </div>
</div>
@endsection
