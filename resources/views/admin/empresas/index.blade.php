@extends('adminlte::page')


@section('content_header')
    <h1>Listado de Empresas</h1>
    <link href="../DataTables/datatables.min.css" rel="stylesheet">
 
    <script src="../DataTables/datatables.min.js"></script>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Empresas registrados</h3>
                    <div class="card-tools">
                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#crearModal">Crear nuevo</a>
                    </div>
                    <x-modal-crearEmpresa/>
                </div>
                
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm" id="empleados">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center" scope="col">Nro</th>
                            <th class="text-center" scope="col">Nombre</th>
                            <th class="text-center" scope="col">Tramo</th>
                            <th class="text-center" scope="col">Tipo</th>
                            <th class="text-center" scope="col">NIT</th>
                            <th class="text-center" scope="col">Creada</th>
                            <th class="text-center" scope="col">Acciones</th>

                        </tr>
                        </thead>
                        <tbody>
                            @forEach($empresas as $empresa)
                            <tr>
                                <th style="text-align: center" scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $empresa->nombre }}</td>
                                <td>{{ $empresa->tramo }}</td>
                                <td>{{ $empresa->tipo }}</td>
                                <td>{{ $empresa->nit }}</td>
                                <td>{{ $empresa->created_at }}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        
                                        <button type="button" data-toggle="modal" data-target="#editModal-{{ $empresa->id }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                        <form action="{{ url('/admin/empresas/'.$empresa->id) }}" method="post" onclick="preguntar{{ $empresa->id }}(event)" id="miFormulario{{ $empresa->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button style="border-radius: 0px 3px 3px 0px" type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar{{ $empresa->id }}(event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                            title: "¿Desea eliminar la empresa?",
                                                            showDenyButton: false,
                                                            icon: 'question',
                                                            showCancelButton: true,
                                                            confirmButtonText: "Eliminar",
                                                            cancelButtonText: "Cancelar",
                                                            confirmButtonColor: "#dc3545",
                                                            
                                                            }).then((result) => {
                                                            /* Read more about isConfirmed, isDenied below */
                                                                if (result.isConfirmed) {
                                                                    document.getElementById("miFormulario{{ $empresa->id }}").submit();
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
                    @forEach($empresas as $empresa)
                    <x-modal-editEmpresa>
                    <x-slot name="empresa_id">
                        {{ $empresa->id }}
                    </x-slot>
                    <x-slot name="empresa_nombre">
                        {{ $empresa->nombre }}
                    </x-slot>
                    <x-slot name="empresa_tramo">
                        {{ $empresa->tramo }}
                    </x-slot>
                    <x-slot name="empresa_tipo">
                        {{ $empresa->tipo }}
                    </x-slot>
                    <x-slot name="empresa_nit">
                        {{ $empresa->nit }}
                    </x-slot>
                    </x-modal-editEmpresa>
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
                title: 'Empresas',  // Título dentro del Excel
                filename: 'Empresas',  // Nombre del archivo Excel
                },
            'copy',
            {
                extend: 'pdf',
                title: 'Empresas',  // Título dentro del PDF
                filename: 'Empresas',  // Nombre del archivo PDF
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