@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Lista de casos de contaminación</div>
            </div>
            <div class="panel-body">
            @if (count($complaint->activities) > 0)
                <table class="table table-hover">
                    <thead>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha de registro</th>
                    </thead>
                    <tbody>
                    @foreach ($complaint->activities as $activity)
                    <tr>
                        <td>{{ $activity->title }}</td>
                        <td>{{ $activity->short_description }}</td>
                        <td>{{ $activity->created_at }}</td>
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
        <a class="btn btn-success" type="button" href="{{ route('admin.activity.create', compact('complaint')) }}">Agregar actividad</a>
    </div>
</div>
@endsection
