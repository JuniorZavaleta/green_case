@extends('admin.layout.base')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="">
            <div class="panel-heading">
                <div class="panel-title"><h2>Caso de contaminación #{{ $complaint->id }} - Actividad #{{ $activity->id }}</h2></div>
            </div>
            <div class="panel-body">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Información General</div>
                    </div>
                    <div class="panel-body">
                        <p><b>Titulo</b>: {{ $activity->title }}</p>
                        <p><b>Descripción</b>: {{ $activity->description }}</p>
                    </div>
                </div>
                <hr></hr>
                <div class="row">
                    <h4>Imagénes</h4>
                </div>
                <div class="row">
                @foreach ($activity->images as $image)
                    <div class="col-sm-4">
                        <img src="{{ $image->img }}">
                    </div>
                @endforeach
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <a class="btn btn-default btn-square" href="{{ route('admin.activity.index', compact('complaint')) }}">
                      <span class="icon-action-undo"></span> Regresar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection