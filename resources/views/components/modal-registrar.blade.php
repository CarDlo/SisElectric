<div class="modal fade" id="registrarModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuevo registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="" method="post">
          @csrf
          <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="titulo">Titulo</label>
                      <input value="{{old('titulo')}}"  name="titulo" type="text" class="form-control" id="titulo" required>
                      @error('titulo')
                      <small style="">{{ $message }}</small>
                      @enderror
                      <label for="Detalle">Detalle</label>
                      <textarea value="{{old('Detalle')}}"  name="Detalle" class="form-control" id="Detalle" required></textarea>
                      @error('Detalle')
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
                      <button type="submit" class="btn btn-primary">Registrar</button>
                  </div>{{-- cierre formgroup --}}
              </div>{{-- cierre col-12 --}}
          </div>{{-- cierre row --}}
        </form>

      </div>{{-- cierre modal-body --}}
    </div>{{-- cierre modal-content --}}
  </div>{{-- cierre modal-dialog --}}
</div>{{-- cierre modal --}}
