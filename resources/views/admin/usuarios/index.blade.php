@extends('adminlte::page')


@section('content_header')
    <h1>Listado de usuarios</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Usuarios registrados</h3>
                    <div class="card-tools">
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.usuarios.create') }}">Crear nuevo</a>

                    </div>
                
                </div>
                
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nro</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Acciones</th>

                        </tr>
                        </thead>
                        <tbody>
                            @forEach($usuarios as $usuario)
                            <tr>
                                <th style="text-align: center" scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/admin/usuarios', $usuario->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{ url('/admin/usuarios/'.$usuario->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                        <form action="{{ url('/admin/usuarios/'.$usuario->id) }}" method="post" onclick="preguntar{{ $usuario->id }}(event)" id="miFormulario{{ $usuario->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button style="border-radius: 0px 3px 3px 0px" type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                        {{-- <script>
                                            function preguntar{{ $usuario->id }}(event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                            title: "¿Desea eliminar el rol?",
                                                            showDenyButton: false,
                                                            icon: 'question',
                                                            showCancelButton: true,
                                                            confirmButtonText: "Eliminar",
                                                            cancelButtonText: "Cancelar",
                                                            confirmButtonColor: "#dc3545",
                                                            
                                                            }).then((result) => {
                                                            /* Read more about isConfirmed, isDenied below */
                                                                if (result.isConfirmed) {
                                                                    document.getElementById("miFormulario{{ $usuario->id }}").submit();
                                                                    //Swal.fire("Eliminando", "", "success");
                                                                } 
                                                            });
                                            }
                                        </script> --}}
                                        
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    
                    
                </div>

            
            </div>
            
        </div>


    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')


@stop