<div class="modal fade" id="editUsuario-{{ $usuario_id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form action="{{route('admin.usuarios.update',$usuario_id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Nombre del usuario</label>
                        <input value="{{ $usuario_nombre }}"  name="name" type="text" class="form-control" id="name" required>
                        @error('name')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="cedula">Cedula</label>
                        <input value="{{ $usuario_cedula }}"  name="cedula" type="text" class="form-control" id="cedula" required>
                        @error('cedula')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="email">Correo electronico</label>
                        <input value="{{ $usuario_email }}"  name="email" type="email" class="form-control" id="email" required>
                        @error('email')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="empresa">Empresa</label>
                        <input value="{{ $usuario_empresa }}"  name="empresa" type="text" class="form-control" id="empresa" required>
                        @error('empresa')
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
                          <button type="submit" class="btn btn-primary">Actualizar</button>

                    </div>{{-- cierre formgroup --}}
                </div>{{-- cierre col-12 --}}
            </div>{{-- cierre row --}}

        </form>

        </div>

      </div>
    </div>
  </div>