<div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar nuevo personal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form action="{{route('aprobaciones.empleado.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="cedula">Cedula</label>
                        <input value="{{old('cedula')}}"  name="cedula" type="text" class="form-control" id="cedula" required>
                        @error('cedula')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="nombre">Nombre</label>
                        <input value="{{old('nombre')}}"  name="nombre" type="text" class="form-control" id="nombre" required>
                        @error('nombre')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="apellidos">Apellidos</label>
                        <input value="{{old('apellidos')}}"  name="apellidos" type="text" class="form-control" id="apellidos" required>
                        @error('apellido')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="cargo">Cargo</label>
                        <input value="{{old('cargo')}}"  name="cargo" type="text" class="form-control" id="cargo" required>
                        @error('cargo')
                        <small style="">{{ $message }}</small>
                        @enderror
                    </div>{{-- cierre formgroup --}}
                </div>{{-- cierre col-12 --}}
            </div>{{-- cierre row --}}
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Crear</button>

                    </div>{{-- cierre formgroup --}}
                </div>{{-- cierre col-12 --}}
            </div>{{-- cierre row --}}

        </form>

        </div>

      </div>
    </div>
  </div>