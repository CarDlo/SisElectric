<div class="modal fade" id="editModal-{{ $empresa_id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar empresa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form action="{{route('admin.empresas.update',$empresa_id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre">Nombre de la empresa</label>
                        <input value="{{ $empresa_nombre }}"  name="nombre" type="text" class="form-control" id="nombre" required>
                        @error('nombre')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="tramo">Tramo o sector</label>
                        <input value="{{ $empresa_tramo }}"  name="tramo" type="text" class="form-control" id="tramo" required>
                        @error('tramo')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="tipo">Tipo</label>
                        <input value="{{ $empresa_tipo }}"  name="tipo" type="text" class="form-control" id="tipo" required>
                        @error('tipo')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="nit">NIT</label>
                        <input value="{{ $empresa_nit }}"  name="nit" type="text" class="form-control" id="nit" required>
                        @error('nit')
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