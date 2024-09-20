@extends('adminlte::page')


@section('content_header')
    <h1>Listado de usuarios</h1>
    <link href="../DataTables/datatables.min.css" rel="stylesheet">
 
    <script src="../DataTables/datatables.min.js"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Usuarios registrados</h3>
                    <div class="card-tools">
                    <a class="btn btn-primary btn-sm" href="{{ route('admin.usuarios.create') }}">Crear nuevo</a>

                    </div>
                
                </div>
                
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm" id="empleados">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center" scope="col">Nro</th>
                            <th class="text-center" scope="col">Cedula</th>
                            <th class="text-center" scope="col">Nombre</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Empresa</th>
                            <th class="text-center" scope="col">Creado</th>
                            <th class="text-center" scope="col">Acciones</th>

                        </tr>
                        </thead>
                        <tbody>
                            @forEach($usuarios as $usuario)
                            <tr>
                                <th style="text-align: center" scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $usuario->cedula }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->empresa_id }}</td>
                                <td>{{ $usuario->created_at }}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/admin/usuarios', $usuario->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <button type="button" data-toggle="modal" data-target="#editUsuario-{{ $usuario->id }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
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
                    
                    @forEach($usuarios as $usuario)
                    <x-modal-editUsuario>
                    <x-slot name="usuario_id">
                        {{ $usuario->id }}
                    </x-slot>
                    <x-slot name="usuario_nombre">
                        {{ $usuario->name }}
                    </x-slot>
                    <x-slot name="usuario_cedula">
                        {{ $usuario->cedula }}
                    </x-slot>
                    <x-slot name="usuario_email">
                        {{ $usuario->email }}
                    </x-slot>
                    <x-slot name="usuario_empresa">
                        {{ $usuario->empresa_id }}
                    </x-slot>
                    </x-modal-editUsuario>
                    @endforeach
                    
                    
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

<script>
    $(document).ready(function() {
        new DataTable('#empleados', {
            responsive: true,
        colReorder: true,
        keys: true,
        lengthMenu: [10, 25, 50],
        layout: {
            topStart: {
                buttons: [
            'colvis',
            {
                extend: 'excel',
                title: 'Empleados para aprobación',  // Título dentro del Excel
                filename: 'EmpleadosAprobacion',  // Nombre del archivo Excel
                },
            'copy',
            {
                extend: 'pdf',
                title: 'Empleados para aprobación',  // Título dentro del PDF
                filename: 'EmpleadosAprobacion',  // Nombre del archivo PDF
                orientation: 'portrait',  // Orientación del PDF (puede ser 'landscape' o 'portrait')
                pageSize: 'A4',  // Tamaño de página
                exportOptions: {
                    columns: ':visible'  // Exportar solo columnas visibles
                },
                customize: function (doc) {
                    // Personalización del PDF (añadir estilos, colores, etc.)
                    doc.styles.title = {
                        fontSize: 18,  // Tamaño de fuente del título
                        bold: true,  // Título en negrita
                        alignment: 'center'  // Alineación del título
                    };
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }

                
            },
            

        ]
            },
            bottomStart: 'pageLength'

        },
        language: {
        url: '../DataTables/es-MX.json',
    },
    }); 
    });</script>


@stop