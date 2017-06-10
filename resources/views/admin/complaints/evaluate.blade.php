@extends('layouts.base')

@push('extra-css')
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">
@endpush

@push('extra-css')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="">
            <div class="panel-heading">
                <div class="panel-title"><h2>Caso de contamination #{{ $complaint->id }}</h2></div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <h3>Imagénes</h3>
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
                    <h3>Ubicación</h3>
                </div>
                <div class="row">
                    <!-- Show location -->
                    <div id="map"></div>
                </div>
                <hr></hr>
                <div class="row">
                    <h3>Comentario</h3>
                </div>
                <div class="row">
                    {{ $complaint->commentary }}
                </div>
                <div class="row">
                    <a href="{{ route('admin.complaint.accepted', compact('complaint')) }}" class="btn btn-square btn-primary" type="button">Aceptar Caso</a>
                    <a href="{{ route('admin.complaint.rejected', compact('complaint')) }}" class="btn btn-square btn-danger" type="button">Rechazar Caso</a>
                </div>
                <hr></hr>
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