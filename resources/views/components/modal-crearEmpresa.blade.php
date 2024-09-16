<div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar nueva empresa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form action="{{route('admin.empresas.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre">Nombre de la empresa</label>
                        <input value="{{old('nombre')}}"  name="nombre" type="text" class="form-control" id="nombre" required>
                        @error('nombre')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="tramo">Tramo o sector</label>
                        <input value="{{old('tramo')}}"  name="tramo" type="text" class="form-control" id="tramo" required>
                        @error('tramo')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="tipo">Tipo</label>
                        <input value="{{old('tipo')}}"  name="tipo" type="text" class="form-control" id="tipo" required>
                        @error('tipo')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="nit">NIT</label>
                        <input value="{{old('nit')}}"  name="nit" type="text" class="form-control" id="nit" required>
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
                          <button type="submit" class="btn btn-primary">Crear</button>

                    </div>{{-- cierre formgroup --}}
                </div>{{-- cierre col-12 --}}
            </div>{{-- cierre row --}}

        </form>

        </div>

      </div>
    </div>
  </div>