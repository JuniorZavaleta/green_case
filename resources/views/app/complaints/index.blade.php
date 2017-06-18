@extends('app.layout.base')

@section('content')
@if (session('message'))
<div role="alert" class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  {{ session('message') }}
</div>
@endif
@if (Auth::guard('web')->user())
<div class="row mb-lg">
  <div class="text-center">
    <a class="btn btn-success btn-square" href="{{ route('complaint.create') }}" type="button" style="font-size: 20px;">
        ¡Registrar caso!
    </a>
  </div>
</div>
@elseif (session('show_support_message'))
<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="forget_button">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="text-center">¡Si deseas apoyarnos con algún caso que conozcas puedes registrarte con Facebook y registrarlo!</div>
</div>
@endif
<div class="row mb-lg">
  @foreach ($complaints as $complaint)
  <div class="col-sm-4">
    <div class="panel">
      <a>
        <img class="img-responsive" src="http://cdne.diariocorreo.pe/thumbs/uploads/articles/images/contaminacion-visual-sin-control-en-huancayo-21239-jpg_604x0.jpg"/>
      </a>
      <div class="panel-body">
        <p class="clearfix">
          <span class="pull-right">Subida por <em>{{ $complaint->citizen->name }}</em> - {{ $complaint->created_at->format('d/m/Y') }}</span>
        </p>
        <p>Caso de contaminación sobre <strong>{{ $complaint->contamination_type->description }}</strong>
         en el distrito de <strong>{{ $complaint->district->name }}</strong>
         usando la plataforma <strong>{{ $complaint->channel->description }}</strong>
        </p>

      </div>
      <div class="text-right">
          <a href="#" class="btn btn-warning btn-square" data-toggle="modal" data-target="#myModal" style="font-size: 15px;"><em class="fa fa-plus"></em> Ver más detalle</a>
        </div>
    </div>
  </div>
  @endforeach
</div>
@endsection

@push('extra-js')
<script type="text/javascript">
  var hide_message_url = "{{ route('index.hide_message') }}";
</script>
<script type="text/javascript" src="{{ asset('js/app/index.js') }}"></script>
@endpush

@push('modal')
<!-- Modal-->
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 id="myModalLabel" class="modal-title">Detalle</h4>
            </div>
            <div class="modal-body">
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
        </div>
    </div>
</div>
@endpush