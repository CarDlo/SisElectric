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
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forEach($tareas as $tarea)
                            <tr>
                                <th style="text-align: center" scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $tarea->titulo }}</td>
                                <td>{{ $tarea->detalle }}</td>
                                <td>{{ $tarea->vencimiento }}</td>
                                    @if( $tarea->estado === 'Pendiente')
                                    <td class="bg-secondary">{{ $tarea->estado }}</td>
                                    @elseif($tarea->estado === 'Completo')
                                    <td class="bg-success">{{ $tarea->estado }}</td>
                                    @elseif($tarea->estado === 'Retrasado')
                                    <td class="bg-danger">{{ $tarea->estado }}</td>
                                    @endif
                                
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" onclick="mostrarSubtareas({{ $tarea->id }})" class="btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></button>
                                        <button type="button" data-toggle="modal" data-target="#crearSubtarea-{{ $tarea->id }}" class="btn btn-outline-success btn-sm"><i class="fas fa-edit"></i></button>
                                        <form action="{{ url('/tareas/'.$tarea->id) }}" method="post" onclick="preguntar{{ $tarea->id }}(event)" id="miFormulario{{ $tarea->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button style="border-radius: 0px 3px 3px 0px" type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                       <script>
                                            function preguntar{{ $tarea->id }}(event) {
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
                                                                    document.getElementById("miFormulario{{ $tarea->id }}").submit();
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

                    
                    
                    @forEach($tareas as $tarea)
                    <x-modal-crearSubtarea>
                    <x-slot name="tarea_id">
                        {{ $tarea->id }}
                    </x-slot>
                   <x-slot name="tarea_titulo">
                        {{ $tarea->titulo }}
                    </x-slot>
                    <x-slot name="tarea_estado">
                        {{ $tarea->estado }}
                    </x-slot>
                    <x-slot name="tarea_vencimiento">
                        {{ $tarea->vencimiento }}
                    </x-slot>
                    </x-modal-crearSubtarea>
                    @endforeach
                </div>

            
            </div>
            
        </div>

        <div class="col-md-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Historial de revisión</h3>
                </div>
                
                <div class="timeline p-2" id="subtareas-content" style="display: none;">
                    
                </div> <!-- Cierre de .timeline -->
            </div> <!-- Cierre de .card -->
        </div> <!-- Cierre de .col-md-4 -->
        

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
        autowidth: true,
        colReorder: true,
        keys: true,
        lengthMenu: [10, 25, 50, 75, 100, 500, 1000],
        layout: {
            topStart: {
                buttons: [
            'colvis',
            'copy',
           
            

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


<script>
        const usuarios = @json($usuarios);
    
    // Función para buscar el nombre del usuario por su ID
    function obtenerNombreUsuario(userId) {
        const usuario = usuarios.find(user => user.id === userId);
        return usuario ? usuario.name : 'Usuario no encontrado';
    }
    function mostrarSubtareas(tareaId) {
        fetch(`/tareas/${tareaId}`)
            .then(response => response.json())
            .then(data => {
                const subtareasDiv = document.getElementById('subtareas-content');
                subtareasDiv.innerHTML = ''; // Limpiar contenido previo
                data.subtareas.forEach(subtarea => {

                    const fechaFormateada = new Date(subtarea.updated_at).toISOString().split('T')[0];
                      // Variable para el contenido del footer dependiendo del estado
                      let contenidoFooter = '';
                    // Evaluar si la subtarea está pendiente o completa
                    if (subtarea.estado === 'Pendiente') {
                        contenidoFooter = `
                            <span class="bg-secondary">${fechaFormateada}</span>
                        `;
                    } else if (subtarea.estado === 'Completo') {
                        contenidoFooter = `
                            <span class="bg-success">${fechaFormateada}</span>
                        `;
                    }
                    subtareasDiv.innerHTML += `
                    <div class="time-label">
                        ${contenidoFooter}
                    </div>
                    <div>
                        <i class="fas fa-user bg-blue"></i>
                        <div class="timeline-item"> 
                            <h3 class="timeline-header"><a href="#">${obtenerNombreUsuario(subtarea.user_id)}</a> ${subtarea.titulo}</h3>
                            <div class="timeline-body">
                                ${subtarea.detalle}
                            </div>
                            <div class="timeline-footer">
                                    Fecha de vencimiento: ${subtarea.vencimiento}
                            </div>
                           
                            </div>
                        </div>
                    </div>
                    `;
                });
                document.getElementById('subtareas-content').style.display = 'block'; // Mostrar panel
            })
            .catch(error => console.error('Error:', error));
    }
</script>

@stop