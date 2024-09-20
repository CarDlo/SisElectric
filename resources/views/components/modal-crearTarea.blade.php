<div class="modal fade" id="crearTarea" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar nueva Tarea</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form action="{{route('tareas.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input value="{{old('titulo')}}"  name="titulo" type="text" class="form-control" id="titulo" required>
                        @error('titulo')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="detalle">Detalle</label>
                        <input value="{{old('detalle')}}"  name="detalle" type="text" class="form-control" id="detalle" required>
                        @error('detalle')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="estado">Estado</label>
                        <input value="{{old('estado')}}"  name="estado" type="text" class="form-control" id="estado" required>
                        @error('apellido')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="vencimiento">Vencimiento</label>
                        <div class="form-group">
                          <div class="input-group date" id="datetimepicker4" data-target-input="nearest" name="vencimiento">
                              <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4"/>
                              <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>
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

  <script type="text/javascript">
    $(document).ready(function () {
         $('#datetimepicker4').datetimepicker({
             format: 'L'
         });
     });
 </script>