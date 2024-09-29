<div class="modal fade" id="crearSubtarea-{{ $tarea_id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar nuevo registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <form action="{{route('subtareas.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <p>{{ $tarea_titulo }}</p>
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="hidden" name="tarea_id" value="{{ $tarea_id }}">
                        <label for="titulo">Titulo del registro</label>
                        <input value="{{old('titulo')}}"  name="titulo" type="text" class="form-control" id="titulo" required>
                        @error('titulo')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="detalle">Detalle del registro</label>
                        <textarea value="{{old('detalle')}}"  name="detalle" type="text" class="form-control" id="detalle" required></textarea>
                        @error('detalle')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" class="form-control">
                          <option value="Pendiente" {{ $tarea_estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                          <option value="Completo" {{ $tarea_estado == 'Completo' ? 'selected' : '' }}>Completo</option>
                       </select>
                        <label for="new_vencimiento">Nuevo vencimiento</label>
                        @php
                        $config = ['format' => 'YYYY-MM-DD'];
                        @endphp
                        <x-adminlte-input-date id="new_vencimiento-{{ $tarea_id }}" name="new_vencimiento" value="{{$tarea_vencimiento}}" :config="$config"/>
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

