@extends('adminlte::page')


@section('content_header')

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />




    <h1>Tareas</h1>
@stop

{{-- @section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true) --}}
@section('content')



    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Tareas</h3>
                    <div class="card-tools">
                    {{-- <a class="btn btn-primary btn-sm" href="{{ route('aprobaciones.empleados.create') }}">Crear nuevo</a> --}}
                    <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#crearTarea">Crear nueva tarea</a>
                    </div>

                    <x-modal-crearTarea/>
                    
                </div>
                
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover table-sm" id="tareas">
                        <thead class="head-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Detalle</th>
                            <th scope="col">Vencimiento</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Ultima actualizacion</th>
                            <th scope="col">Creacion</th>


                        </tr>
                        </thead>
                        <tbody>
                            @forEach($tareas as $tarea)
                            <tr>
                                <th style="text-align: center" scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $tarea->titulo }}</td>
                                <td>{{ $tarea->detalle }}</td>
                                <td>{{ $tarea->vencimiento }}</td>
                                <td>{{ $tarea->estado }}</td>
                                    @if( $tarea->estado === 'Pendiente')
                                    <td class="bg-secondary">{{ $tarea->estado }}</td>
                                    @elseif($tarea->estado === 'Finalizado')
                                    <td class="bg-success">{{ $tarea->estado }}</td>
                                    @elseif($tarea->estado === 'Retrasado')
                                    <td class="bg-danger">{{ $tarea->estado }}</td>
                                    @endif
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                        <button type="button" data-toggle="modal" data-target="#registrarModal-{{ $tarea->id }}" data-nombre="{{ $tarea->nombre }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>

                            </tr>
                            @endforeach 
                        </tbody>
                        
                    </table>
                    
                    {{-- @forEach($tareas as $tarea)
                    <x-modal-editTarea>
                    <x-slot name="tarea_id">
                        {{ $tarea->id }}
                    </x-slot>
                    <x-slot name="tarea_titulo">
                        {{ $tarea->titulo }}
                    </x-slot>
                    <x-slot name="tarea_detalle">
                        {{ $tarea->detalle }}
                    </x-slot>
                    <x-slot name="tarea_estado">
                        {{ $tarea->cedula }}
                    </x-slot>
                    <x-slot name="tarea_vencimiento">
                        {{ $tarea->vencimiento }}
                    </x-slot>
                    </x-modal-editTarea>
                    @endforeach --}}
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
        new DataTable('#tareas', {
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

<script type="text/javascript">
    $(function () {
        $('#datetimepicker4').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>

@stop