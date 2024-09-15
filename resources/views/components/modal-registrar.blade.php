<div class="modal fade" id="registrarModal-{{ $empleado_id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuevo registro: {{ $empleado_nombre }} {{ $empleado_apellidos }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div> <!-- End of .modal-header -->

      <div class="modal-body">
        
        {{-- <form action="/file-upload" method="post" enctype="multipart/form-data" class="" > --}}
          <form action="{{route('aprobaciones.logempleados.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            
            <label for="detalle">Detalle</label>
            <textarea value="{{old('detalle')}}" name="detalle" class="form-control" id="detalle" required class="mb-3"></textarea>
            @error('detalle')
            <small style="">{{ $message }}</small>
            @enderror
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="estado">Estado</label>
                  <select class="form-select" aria-label="Default select" name="estado" id="estado">
                    <option selected value="Rechazado">Rechazado</option>
                    <option value="Aprobado">Aprobado</option>
                  </select>
    
                </div>{{-- cierre formgroup --}}
              </div>{{-- cierre col 6 --}}
              <div class="col-md-6">
                <div class="form-group">
                  <label for="condicion">Condicion</label>
                  <select class="form-select" aria-label="Default select" name="condicion" id="condicion">
                    <option selected value="Activo">Activo</option>
                    <option value="retirado">Retirado</option>
                  </select>

                </div>{{-- cierre formgroup --}}
              </div>{{-- cierre col 6 --}}
            </div>{{-- cierre row --}}
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
