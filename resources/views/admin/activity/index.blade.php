@extends('admin.layout.base')

@section('content')
@if (session('access_denied'))
<div class="row">
  <div class="alert alert-warning">
    {{ session('access_denied') }}
  </div>
</div>
@endif
<div class="row">
  <div class="col-xs-10">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title">Lista de actividades del caso de contaminación #{{ $complaint->id }}</div>
      </div>
      <div class="panel-body">
      @if (count($complaint->activities) > 0)
        <table class="table table-hover">
          <thead>
            <th>Título</th>
            <th>Descripción</th>
            <th>Fecha de registro</th>
            <th>Acciones</th>
          </thead>
          <tbody>
          @foreach ($complaint->activities as $activity)
          <tr>
            <td>{{ $activity->title }}</td>
            <td>{{ $activity->short_description }}</td>
            <td>{{ $activity->created_at }}</td>
            <td>
              <a class="btn btn-default btn-square" href="{{ route('admin.activity.show', compact('complaint', 'activity')) }}">Ver</a>
              <a class="btn btn-default btn-square" href="{{ route('admin.activity.edit', compact('complaint', 'activity')) }}">Editar</a>
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      @else
        <div class="alert alert-danger">Este caso de contaminación no tiene actividades</div>
      @endif
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <a class="btn btn-default btn-square" href="{{ route('admin.complaint.index') }}">Regresar</a>
    <a class="btn btn-success btn-square" type="button" href="{{ route('admin.activity.create', compact('complaint')) }}">Agregar actividad</a>
  </div>
</div>
@endsection
