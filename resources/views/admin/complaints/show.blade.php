@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="">
            <div class="panel-heading">
                <div class="panel-title"><h2>Caso de contaminación #{{ $complaint->id }}</h2></div>
            </div>
            <div class="panel-body">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Información General</div>
                    </div>
                    <div class="panel-body">
                        <p><b>Enviado desde</b>: {{ $complaint->channel->description }}</p>
                        <p><b>Tipo de contaminación</b>: {{ $complaint->contamination_type->description }}</p>
                        <p><b>Fecha y Hora de registro</b>: {{ $complaint->created_at_formatted }}</p>
                        <p><b>Comentarios del ciudadano</b>:</p>
                        <p>{{ $complaint->commentary }}</p>
                    </div>
                </div>
                <hr></hr>
                <div class="row">
                    <h4>Imagénes</h4>
                </div>
                <div class="row">
                @foreach ($complaint->images as $image)
                    <div class="col-sm-4">
                        <img src="{{ $image->img_path }}">
                    </div>
                @endforeach
                </div>
                <hr></hr>
                <div class="row">
                    <h4>Ubicación</h4>
                </div>
                <div class="row">
                    <!-- Show location -->
                    <div id="map"></div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <a class="btn btn-default" href="{{ route('admin.complaint.index') }}">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  function initMap() {
    var uluru = {lat: {{ $complaint->latitude }}, lng: {{ $complaint->longitude }} };
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&callback=initMap"></script>
@endsection