<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload-->
<div class="row fileupload-buttonbar">
  <div class="col-lg-7">
     <!-- The fileinput-button span is used to style the file input field as button-->
     <span class="btn btn-success fileinput-button"><i class="fa fa-fw fa-plus"></i>
        <span>Agregar imágenes...</span>
        <input type="file" id="files" name="files[]" multiple="" accept="image/*">
     </span>
     <button type="reset" class="btn btn-warning cancel"><i class="fa fa-fw fa-times"></i>
        <span>Eliminar imágenes</span>
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
