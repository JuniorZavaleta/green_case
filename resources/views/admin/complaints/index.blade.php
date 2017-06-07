@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Lista de casos de contaminación</div>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <th>Tipo de Contaminación</th>
                        <th>Distrito</th>
                        <th>Estado</th>
                        <th>Fecha de registro</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                    @foreach ($complaints as $complaint)
                    <tr>
                        <td>{{ $complaint->contamination_type->description }}</td>
                        <td>{{ $complaint->authority->district->name }}</td>
                        <td>{{ $complaint->status->description }}</td>
                        <td>{{ $complaint->created_at_formatted }}</td>
                        <td>
                            <a class="btn btn-default btn-xs" href="{{ route('admin.complaint.show', compact('complaint')) }}">Ver detalle</a>
                            <a class="btn btn-default btn-xs" href="#">Ver actividades</a>
                            @if ($complaint->is_completed)
                            <a class="btn btn-info btn-xs" href="#">Evaluar</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
    </div>
</div>
<div class="row">
  {{ $complaints->links() }}
</div>
@endsection
