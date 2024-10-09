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
          
          <form action="{{route('aprobaciones.empleados.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <x-adminlte-input value="{{old('cedula')}}" name="cedula" igroup-size="sm" label="Cedula" label-class="text-black" required>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fas fa-address-card text-black"></i>
                            </div>
                        </x-slot>
                      </x-adminlte-input>
                        @error('cedula')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <x-adminlte-input value="{{old('nombre')}}" name="nombre" igroup-size="sm" label="Nombres" label-class="text-black" required>
                          <x-slot name="prependSlot">
                              <div class="input-group-text">
                                  <i class="fas fa-user text-black"></i>
                              </div>
                          </x-slot>
                        </x-adminlte-input>
                        @error('nombre')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <x-adminlte-input value="{{old('apellido')}}" name="apellido" igroup-size="sm" label="Apellidos" label-class="text-black" required>
                          <x-slot name="prependSlot">
                              <div class="input-group-text">
                                  <i class="fas fa-user text-black"></i>
                              </div>
                          </x-slot>
                        </x-adminlte-input>
                        @error('apellido')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="cargo">Cargo</label>
                        <input value="{{old('cargo')}}"  name="cargo" type="text" class="form-control form-control-sm" id="cargo" required>
                        @error('cargo')
                        <small style="">{{ $message }}</small>
                        @enderror
                        <label for="empresa_id">Empresa</label>
                        <x-adminlte-select2 name="empresa_id" class="form-control" igroup-size="sm" label-class="text-lightblue"
                        data-placeholder="Seleccione opcion...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-black">
                                <i class="fas fa-building-user"></i>
                            </div>
                        </x-slot>
                        @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                        @endforeach
                        </x-adminlte-select2>
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