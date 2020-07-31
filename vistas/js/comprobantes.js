/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarComprobante", function(){

	var idComprobante = $(this).attr("idComprobante");

	var datos = new FormData();
	datos.append("idComprobante", idComprobante);

	$.ajax({
		url: "ajax/comprobantes.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarComprobante").val(respuesta["comprobante"]);
     		$("#idComprobante").val(respuesta["id"]);

     	}

	})


})


/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarComprobante", function(){

   var idComprobante = $(this).attr("idComprobante");

   swal({
    title: '¿Está seguro de borrar el comprobante?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar comprobante!'
   }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=comprobantes&idComprobante="+idComprobante;

    }

   })

})