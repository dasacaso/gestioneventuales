var tabla;

function init() {
    $("#persona_form").on("submit", function(e){
        guardaryeditar(e);
    });
}   

$(document).ready(function(){
    /* Para usar select2 en el combo de Departamento  */
  /*   $('#id_departamento').select2({
        dropdownParent: $("#modalmantenimiento")
    }); */
    $.post("../../controller/departamento.php?op=combo",function (data){
        $("#id_departamento").html(data);        
    });
    tabla=$('#eventuales_data').dataTable({
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
        "ajax":{
            url: '../../controller/personal.php?op=listar',
            type : "get",
            dataType : "json",
            error: function(e){
                console.log(e.responseText);	
            }
        },
		"bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 10,//Por cada 10 registros hace una paginación
	    "order": [[ 0, "asc" ]],//Ordenar (columna,orden)
	    "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
		}
	}).DataTable();
});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#persona_form")[0]);    
    $.ajax({
        url: "../../controller/personal.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            $('#persona_form')[0].reset();
            $('#modalmantenimiento').modal('hide');
            $('#eventuales_data').DataTable().ajax.reload();
             swal.fire(
                'Registrado!',
                'Se registro correctamente!',
                'success'
             )
        }
    });
} 


function editar(empleado){	    
    $('#mdltitulo').html('Editar Registro');
    $.post("../../controller/personal.php?op=mostrar",{empleado : empleado},function (data){
        data = JSON.parse(data);
        $('#empleado').val(data.empleado);
        $('#nombres').val(data.nombres);
        $('#apellidos').val(data.apellidos);
        $('#telefono').val(data.telefono);
        $('#celular').val(data.celular);
        $('#cod_empleado').val(data.cod_empleado);
        $('#cedula').val(data.cedula);
        $('#id_departamento').val(data.id_departamento).trigger('change');
        $('#email').val(data.email);        
    });
    $('#modalmantenimiento').modal('show');
}

function eliminar(empleado){
    swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!?",
        icon: "error",
        showCancelButton: true,        
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {       
                $.post("../../controller/personal.php?op=eliminar",{empleado:empleado},function (data){                    
                    
                });

                $('#eventuales_data').DataTable().ajax.reload();
            swal.fire(
                'Deleted',
                'Your file has been deleted.',
                'success'
            )
        }
    })
}

$(document).on("click","#btnnuevo", function(){
    $('#mdltitulo').html('Nuevo Registro');
    $('#persona_form')[0].reset();
    $('#empleado').val('');
    $('#nombres').val('');
    $('#apellidos').val('');
    $('#telefono').val('');
    $('#celular').val('');
    $('#cod_empleado').val('');
    $('#cedula').val('');
    $('#id_departamento').val('').trigger('change');
    $('#modalmantenimiento').modal('show');
});

init();