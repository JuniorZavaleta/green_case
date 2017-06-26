@extends('admin.layout.base')

@section('content')
<div class="row">
  <h2>Registrar Autoridad</h2>
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
    <form class="" method="POST">
      {!! csrf_field() !!}
      <div class="form-container">
        <div class="form-group">
          <label class="control-label">Distrito</label>
          <select class="form-control" name="distrito" id="district">
            <option value="">Seleccione el distrito</option>
            @foreach($districts as $district)
            <option value={{ $district->id }} {{ ( old('district') == $district->id) ? 'selected' : '' }}>{{ $district->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label class="control-label">Nombre</label>
          <input type="text" class="form-control" name="nombre" id="name">
        </div>
        <div class="form-group">
          <label class="control-label">E-mail</label>
          <input type="text" class="form-control" name="e-mail" id="email">
        </div>
        <div class="form-group">
          <label class="control-label">Contraseña</label>
          <input type="password" class="form-control" name="contrasenia" id="password">
        </div>

        <div class="form-group">
          <button class="btn btn-primary" name="register_button" type="submit" value="register">Registrar</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection