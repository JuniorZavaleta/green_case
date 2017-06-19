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
