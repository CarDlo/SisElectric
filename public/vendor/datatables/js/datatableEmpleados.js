$(document).ready(function() {
    $('#empleados').DataTable({
        responsive: true,
        colReorder: true,
        keys: true,
        dom:  '<"d-flex flex-row justify-content-between align-items-center" <"p-2" B><"p-2" f>>rt<"d-flex flex-row justify-content-between align-items-center" <"p-2" l><"p-2" i><"p-2" p>>',
        //dom: 'Bfrtip',
        lengthMenu: [5, 10, 25, 50, 75, 100, 500, 1000],
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

        ],
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "buttons":{
            "copy": "Copiar",
            "print": "imprimir",
            "colvis": "Visualizar",
            },
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
    });
});