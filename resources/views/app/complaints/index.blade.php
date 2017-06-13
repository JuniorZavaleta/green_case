@extends('layouts.base')

@section('content')
<div class="row">
    <div class="text-center">
        <h2>Lista de casos de contaminación</h2>
    </div>
</div>
@if (Auth::guard('web')->user())
<div class="row">
    <div class="text-center">
        <a class="btn btn-success" href="{{ route('complaint.create') }}" type="button">¡Registrar caso!</a>
    </div>
</div>
@endif
<div class="row">
    @foreach ($complaints as $complaint)
    <div class="col-sm-4">
        <p>Tipo de Contaminación: {{ $complaint->contamination_type->description }}</p>
        <p>Fecha: {{ $complaint->created_at_formatted }}</p>
        <p>Enviado desde: {{ $complaint->channel->description }}</p>
        <img src=" {{ $complaint->images[0]->img_path }} "/>
    </div>
    @endforeach
</div>
@endsection
