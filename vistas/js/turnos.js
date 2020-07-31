/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarTurno", function(){

	var idTurno = $(this).attr("idTurno");

	var datos = new FormData();
	datos.append("idTurno", idTurno);

	$.ajax({
		url: "ajax/turnos.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarTurno").val(respuesta["turno"]);
     		$("#idTurno").val(respuesta["id"]);

     	}

	})


})


/*=============================================
ELIMINAR TURNO
=============================================*/
$(".tablas").on("click", ".btnEliminarTurno", function(){

   var idTurno = $(this).attr("idTurno");

   swal({
    title: '¿Seguro que desea eliminar el turno?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si!'
   }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=turnos&idTurno="+idTurno;

    }

   })

})

/*=============================================
ATENDER TURNO
=============================================*/
$(".tablas").on("click", ".btnAtenderTurno", function(){

   var idTurno = $(this).attr("idTurno");

   swal({
    title: '¿Confirmar que atendera al cliente?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si!'
   }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=turnos&idTurno="+idTurno;

    }

   })

})