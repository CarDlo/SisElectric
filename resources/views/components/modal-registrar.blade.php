<div class="modal fade" id="registrarModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuevo registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- End of .modal-header -->

      <div class="modal-body">
        <form action="/file-upload" method="post" enctype="multipart/form-data" class="" >
          @csrf
          <div class="form-group">
            <label for="titulo">Titulo</label>
            <input value="{{old('titulo')}}" name="titulo" type="text" class="form-control" id="titulo" required>
            @error('titulo')
            <small style="">{{ $message }}</small>
            @enderror

            <label for="Detalle">Detalle</label>
            <textarea value="{{old('Detalle')}}" name="Detalle" class="form-control" id="Detalle" required class="mb-3"></textarea>
            @error('Detalle')
            <small style="">{{ $message }}</small>
            @enderror
            <div action="/file-upload" class="dropzone mt-3" id="Mydropzone">
            <div class="fallback">
              <input type="file" name="file" multiple>
            </div>
          </div>
          </div> {{-- cierre formgroup --}}
      </div> <!-- End of .modal-body -->

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div> <!-- End of .modal-footer -->
      </form>
    </div> <!-- End of .modal-content -->
  </div> <!-- End of .modal-dialog -->
</div> <!-- End of .modal -->

<script>
  Dropzone.options.Mydropzone = {
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    acceptedFiles: ".png,.jpg,.jpeg,.pdf,.doc,.docx,.xls,.xlsx",
    dictDefaultMessage: '<i class="fas fa-upload"></i> Arrastra o da click para cargar archivos',
    dictResponseError: 'Error al subir el archivo',
  error: function(file, response) {
    if (typeof response === 'string') {
      console.log(response);
    } else {
      console.log(JSON.stringify(response));
    }
  }
  }
</script>