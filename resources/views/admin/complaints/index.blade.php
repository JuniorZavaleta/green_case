@extends('layouts.base')

@section('content')
<div class="row">
    <h2>Lista de casos de contaminación</h2>
</div>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-condensed">
            <thead>
                <th>Tipo de Contaminación</th>
                <th>Distrito</th>
                <th>Fecha de registro</th>
                <th>Acciones</th>
            </thead>
            <tbody>
            @foreach ($complaints as $complaint)
            <tr>
                <td>{{ $complaint->contamination_type->description }}</td>
                <td>{{ $complaint->authority->district->name }}</td>
                <td>{{ $complaint->created_at_formatted }}</td>
                <td>
                    <a class="btn btn-default btn-xs" href="#">Ver detalle</a>
                    <a class="btn btn-default btn-xs" href="#">Ver actividades</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
  {{ $complaints->links() }}
</div>
@endsection