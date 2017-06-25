@extends('admin.layout.base')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title">Lista de Autoridades</div>
      </div>
      <div class="panel-body">
      @if (count($authorities) > 0)
        <table class="table table-hover">
          <thead>
            <th>Nombre</th>
            <th>Distrito</th>
            <th>Fecha de registro</th>
          </thead>
          <tbody>
          @foreach ($authorities as $authority)
          <tr>
            <td>{{ $authority->name }}</td>
            <td>{{ $authority->district->name }}</td>
            <td>{{ $authority->created_at }}</td>
          </tr>
          @endforeach
          </tbody>
        </table>
      @else
        <div class="alert alert-danger">No existe autoridades aun</div>
      @endif
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <a class="btn btn-default btn-square" href="{{ route('admin.complaint.index') }}">Regresar</a>
  </div>
</div>
@endsection
