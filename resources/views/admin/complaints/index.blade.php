@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Filtros</div>
            </div>
            <div class="panel-body">
                <form method="GET">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Estado</label>
                                <select class="form-control" name="estado">
                                    <option value="">Seleccione un estado</option>
                                @foreach ($status as $status_name)
                                    <option {{ request('estado') == $status_name ? 'selected' : '' }}
                                        >{{ $status_name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        @if ($user->is_admin)
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Distrito</label>
                                <select class="form-control" name="distrito">
                                    <option value="">Seleccione un distrito</option>
                                @foreach ($districts as $district)
                                    <option {{ request('distrito') == $district ? 'selected' : '' }}
                                        >{{ $district }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tipo de contaminación</label>
                                <select class="form-control" name="tipo_contaminacion">
                                    <option value="">Seleccione un tipo de contaminación</option>
                                @foreach ($contamination_types as $contamination_type)
                                    <option {{ request('tipo_contaminacion') == $contamination_type ? 'selected' : '' }}
                                        >{{ $contamination_type }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Filtrar</button>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <a class="btn btn-success pull-right" type="button" target="_blank" href="{{ route('admin.complaint.export', request()->all()) }}">Exportar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
                        <td>{{ $complaint->district->name }}</td>
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
