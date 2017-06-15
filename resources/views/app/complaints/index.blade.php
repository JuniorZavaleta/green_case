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
<div class="row">
  <div class="text-center">
    <h2>Lista de casos de contaminación</h2>
  </div>
</div>
@if (Auth::guard('web')->user())
<div class="row">
  <div class="text-center">
    <a class="btn btn-success btn-square" href="{{ route('complaint.create') }}" type="button">¡Registrar caso!</a>
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
<hr></hr>
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

@push('extra-js')
<script type="text/javascript">
  var hide_message_url = "{{ route('index.hide_message') }}";
</script>
<script type="text/javascript" src="{{ asset('js/app/index.js') }}"></script>
@endpush
