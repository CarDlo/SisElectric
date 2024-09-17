@extends('adminlte::page')


@section('content_header')
    <h1>Roles de usuario</h1>
    <link href="../DataTables/datatables.min.css" rel="stylesheet">
 
    <script src="../DataTables/datatables.min.js"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Roles registrados</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#crearRoles">Crear nuevo</a>
                    </div>

                    <x-modal-crearRoles/>
                
                </div>
                
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm" id="roles">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center" scope="col">Nro</th>
                            <th class="text-center" scope="col">Nombre</th>
                            <th class="text-center" scope="col">Acciones</th>

                        </tr>
                        </thead>
                        <tbody>
                            @forEach($roles as $role)
                            <tr>
                                <th style="text-align: center" scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $role->name }}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <button type="button" data-toggle="modal" data-target="#editRoles-{{ $role->id }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                        <form action="{{ url('/admin/roles/'.$role->id) }}" method="post" onclick="preguntar{{ $role->id }}(event)" id="miFormulario{{ $role->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button style="border-radius: 0px 3px 3px 0px" type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar{{ $role->id }}(event) {
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
                                                                    document.getElementById("miFormulario{{ $role->id }}").submit();
                                                                    //Swal.fire("Eliminando", "", "success");
                                                                } 
                                                            });
                                            }
                                        </script>
                                        
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    @forEach($roles as $role)
                    <x-modal-editRoles>
                    <x-slot name="role_id">
                        {{ $role->id }}
                    </x-slot>
                    <x-slot name="role_nombre">
                        {{ $role->name }}
                    </x-slot>
                    </x-modal-editRoles>
                    @endforeach
                    
                    
                </div>

            
            </div>
            
        </div>
        <div class="col-md-6">
            {{-- ///////////////////////////////////////////////////////////////// --}}


            {{-- ///////////////////////////////////////////////////////////////// --}}
        </div>

    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

<script>
    $(document).ready(function() {
        new DataTable('#roles', {
            responsive: true,
            colReorder: true,
            keys: true,
            lengthMenu: [5, 10, 15],
            language: {
                        url: '../DataTables/es-MX.json',
                    },
    }); 
    });
    </script>


@stop