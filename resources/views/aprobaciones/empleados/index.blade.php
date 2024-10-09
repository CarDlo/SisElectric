@extends('adminlte::page')


@section('content_header')
    <h1>Empleados para aprobacion</h1>
@stop

{{-- @section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true) --}}
@section('content')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Empleados</h3>
                    <div class="card-tools">
                    {{-- <a class="btn btn-primary btn-sm" href="{{ route('aprobaciones.empleados.create') }}">Crear nuevo</a> --}}
                    <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#crearModal">Crear nuevo</a>
                    </div>
                    <x-modal-crear>
                        <x-slot name="empresas">
                            {{ $empresas->all() }}
                        </x-slot>
                    </x-modal-crear>
                    
                </div>
                
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm" id="empleados">
                        <thead class="head-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>


                        </tr>
                        </thead>
                        <tbody>
                            @forEach($empleados as $empleado)
                            <tr>
                                <th style="text-align: center" scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $empleado->cedula }}</td>
                                <td>{{ $empleado->nombre }}</td>
                                <td>{{ $empleado->apellidos }}</td>
                                <td>{{ $empleado->cargo }}</td>
                                    @if( $empleado->estado === 'Pendiente')
                                    <td class="bg-secondary">{{ $empleado->estado }}</td>
                                    @elseif($empleado->estado === 'Aprobado')
                                    <td class="bg-success">{{ $empleado->estado }}</td>
                                    @elseif($empleado->estado === 'Rechazado')
                                    <td class="bg-danger">{{ $empleado->estado }}</td>
                                    @endif
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                        <button type="button" data-toggle="modal" data-target="#registrarModal-{{ $empleado->id }}" data-nombre="{{ $empleado->nombre }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>

                            </tr>
                            @endforeach 
                        </tbody>
                        
                    </table>
                    
                    @forEach($empleados as $empleado)
                    <x-modal-registrar>
                    <x-slot name="empleado_id">
                        {{ $empleado->id }}
                    </x-slot>
                    <x-slot name="empleado_nombre">
                        {{ $empleado->nombre }}
                    </x-slot>
                    <x-slot name="empleado_apellidos">
                        {{ $empleado->apellidos }}
                    </x-slot>
                    <x-slot name="empleado_cedula">
                        {{ $empleado->cedula }}
                    </x-slot>
                    </x-modal-registrar>
                    @endforeach
                </div>

            
            </div>
            
        </div>
        <div class="col-md-4">
            

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Historial de revision</h3>

                    
                </div>
              
                <div class="timeline p-2">

                    <div class="time-label">
                    <span class="bg-red">10 Feb. 2014</span>
                    </div>
                    
                    
                    <div>
                    <i class="fas fa-envelope bg-blue"></i>
                    <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                    <h3 class="timeline-header"><a href="#">Sandra Guzman</a> Cargue de archivos</h3>
                    <div class="timeline-body">
                    Se cargo archivos del señor carlos de la ossa
                    </div>
                    <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm">Read more</a>
                    <a class="btn btn-danger btn-sm">Delete</a>
                    </div>
                    </div>
                    </div>
                    
                    
                    <div>
                    <i class="fas fa-user bg-green"></i>
                    <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                    <h3 class="timeline-header no-border"><a href="#">Martha Avendaño</a> Rechazado</h3>
                    </div>
                    </div>
                    
                    
                    <div>
                    <i class="fas fa-comments bg-yellow"></i>
                    <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                    <h3 class="timeline-header"><a href="#">Martha Avendaño</a> commented on your post</h3>
                    <div class="timeline-body">
                    Se encuentra rechazado pendiente pago seguridad social
                    </div>
                    <div class="timeline-footer">
                    <a class="btn btn-warning btn-sm">View comment</a>
                    </div>
                    </div>
                    </div>
                    
                    
                    <div class="time-label">
                    <span class="bg-green">3 Jan. 2014</span>
                    </div>
                    
                    
                    <div>
                    <i class="fa fa-camera bg-purple"></i>
                    <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                    <h3 class="timeline-header"><a href="#">Sandra Guzman</a> Se cargaron los archivos faltantes</h3>
                    <div class="timeline-body">
                    <img src="https://placehold.it/150x100" alt="...">
                    <img src="https://placehold.it/150x100" alt="...">

                    </div>
                    </div>
                    </div>
                    
                    
                    <div>
                    <i class="fas fa-video bg-maroon"></i>
                    <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> 5 days ago</span>
                    <h3 class="timeline-header"><a href="#">Martha Avendaño</a> Aprobado</h3>
                    <div class="timeline-body">
                    
                    </div>
                    <div class="timeline-footer">
                    <a href="#" class="btn btn-sm bg-maroon">See comments</a>
                    </div>
                    </div>
                    </div>
                    
                    <div>
                    <i class="fas fa-clock bg-gray"></i>
                    </div>
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
        lengthMenu: [10, 25, 50, 75, 100, 500, 1000],
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
            bottomStart: 'pageLength',
            bottom2Start: 'info',
            bottom2End: {
            searchBuilder: {
                // config options here
            }
        }
        },
        language: {
        url: '../DataTables/es-MX.json',
    },
    }); 
    });</script>

@stop