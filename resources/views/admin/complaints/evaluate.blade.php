@extends('admin.layout.base')

@section('content')
@if ($errors->first())
<div class="row">
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
</div>
@endif
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
                    <p>{{ $complaint->commentary }}</p>
                </div>
                <div class="row">
                    <div class="form-group">
                        <a href="{{ route('admin.complaint.accepted', compact('complaint')) }}" class="btn btn-square btn-primary" type="button">Aceptar Caso</a>
                        <a type="button" data-toggle="modal" data-target="#myModal" class="btn btn-square btn-danger">Rechazar Caso</a>
                    </div>
                </div>
                <hr></hr>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <a class="btn btn-default btn-square" href="{{ route('admin.complaint.index') }}">Regresar</a>
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

@push('modal')
<!-- Modal-->
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 id="myModalLabel" class="modal-title">Modal title</h4>
            </div>
            <form method="POST" action="{{ route('admin.complaint.rejected', compact('complaint')) }}">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Comentarios</label>
                            <div class="col-sm-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <textarea rows="10" name="commentary" class="form-control note-editor"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-square btn-danger">Confirmar Rechazo</button>
                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush