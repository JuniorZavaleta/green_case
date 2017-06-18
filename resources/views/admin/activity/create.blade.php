@extends('admin.layout.base')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fileupload.css') }}">

<div class="row">
  <h2>Registrar actividad para el caso #{{ $complaint->id }}</h2>
</div>

@if ($errors->all())
  <ul class="parsley-errors-list filled">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

<div class="row">
  <div class="col-xs-12">
  <form id="fileupload" class="" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group">
      <label>Título</label>
      <input type="text" name="titulo" id="title">
    </div>

    <div class="form-group">
      <label>Descripción</label>
      <textarea name="descripcion">

      </textarea>
    </div>
    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload-->
    <div class="row fileupload-buttonbar">
      <div class="col-lg-7">
         <!-- The fileinput-button span is used to style the file input field as button-->
         <span class="btn btn-success fileinput-button"><i class="fa fa-fw fa-plus"></i>
            <span>Add files...</span>
            <input type="file" id="files" name="files[]" multiple="" accept="image/*">
         </span>
         <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-upload"></i>
            <span>Registrar</span>
         </button>
         <button type="reset" class="btn btn-warning cancel"><i class="fa fa-fw fa-times"></i>
            <span>Eliminar imagénes</span>
         </button>
         <!-- The global file processing state-->
         <span class="fileupload-process"></span>
      </div>
      <!-- The global progress state-->
      <div class="col-lg-5 fileupload-progress fade">
         <!-- The global progress bar-->
         <div role="progressbar" aria-valuemin="0" aria-valuemax="100" class="progress progress-striped active">
            <div style="width:0%;" class="progress-bar progress-bar-success"></div>
         </div>
         <!-- The extended global progress state-->
         <div class="progress-extended">&nbsp;</div>
      </div>
    </div>
    <!-- The table listing the files available for upload/download-->
    <table role="presentation" class="table table-striped">
      <tbody class="files"></tbody>
    </table>

    <input type="hidden" name="latitude" id="latitude" value="{{ $default_latitude }}">
    <input type="hidden" name="longitude" id="longitude" value="{{ $default_longitude }}">
  </form>
  <!-- The template to display files available for upload-->
  <script id="template-upload" type="text/x-tmpl">
  {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
      <td>
        <span class="preview"></span>
      </td>
      <td>
        <p class="name">{%=file.name%}</p>
        <strong class="error text-danger"></strong>
      </td>
      <td>
      {% if (!i) { %}
        <button class="btn btn-warning cancel">
          <em class="fa fa-fw fa-times"></em>
          <span>Cancel</span>
        </button>
      {% } %}
      </td>
    </tr>
  {% } %}
  </script>
  <!-- The template to display files available for download-->
  <script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
      <tr class="template-download fade">
        <td>
          <span class="preview">
            {% if (file.thumbnailUrl) { %}
              <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
            {% } %}
          </span>
        </td>
        <td>
        <p class="name">
        {% if (file.url) { %}
          <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
        {% } else { %}
          <span>{%=file.name%}</span>
        {% } %}
        </p>
        {% if (file.error) { %}
          <div><span class="label label-danger">Error</span> {%=file.error%}</div>
        {% } %}
       </td>
       <td>
          <span class="size">{%=o.formatFileSize(file.size)%}</span>
       </td>
       <td>
          {% if (file.deleteUrl) { %}
          <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
            <em class="fa fa-fw fa-trash"></em>
            <span>Delete</span>
          </button>
          {% } else { %}
          <button class="btn btn-warning cancel">
            <em class="fa fa-fw fa-times"></em>
            <span>Cancel</span>
          </button>
          {% } %}
        </td>
      </tr>
      {% } %}
    </script>
  </div>
</div>
@endsection

@push('extra-js')
<script type="text/javascript">
  var post_url = "{{ route('admin.activity.store', compact('complaint')) }}";
</script>
<script src="{{ asset('js/ui/widget.js') }}"></script>
<script src="{{ asset('js/tmpl.js') }}"></script>
<script src="{{ asset('js/load-image.all.min.js') }}"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality-->
<script src="{{ asset('/js/canvas-to-blob.js') }}"></script>
<!-- The basic File Upload plugin-->
<script src="{{ asset('/js/jquery.fileupload.js') }}"></script>
<!-- The File Upload processing plugin-->
<script src="{{ asset('/js/jquery.fileupload-process.js') }}"></script>
<!-- The File Upload image preview & resize plugin-->
<script src="{{ asset('/js/jquery.fileupload-image.js') }}"></script>
<!-- The File Upload audio preview plugin-->
<script src="{{ asset('/js/jquery.fileupload-audio.js') }}"></script>
<!-- The File Upload video preview plugin-->
<script src="{{ asset('/js/jquery.fileupload-video.js') }}"></script>
<!-- The File Upload validation plugin-->
<script src="{{ asset('/js/jquery.fileupload-validate.js') }}"></script>
<!-- The File Upload user interface plugin-->
<script src="{{ asset('/js/jquery.fileupload-ui.js') }}"></script>

<script src="{{ asset('js/upload_images.js')}}"></script>
@endpush
