<?php

class ControladorComprobantes{



	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearComprobante(){

		if(isset($_POST["nuevoComprobante"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoComprobante"])){

				$tabla = "comprobantes";

				$datos = $_POST["nuevoComprobante"];

				$respuesta = ModeloComprobantes::mdlIngresarComprobante($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La comprobante ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "comprobantes";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El comprobante no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "comprobantes";

							}
						})

			  	</script>';

			}

		}

	}

		/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarComprobantes($item, $valor){

		$tabla = "comprobantes";

		$respuesta = ModeloComprobantes::mdlMostrarComprobantes($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarComprobante(){

		if(isset($_POST["editarComprobante"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarComprobante"])){

				$tabla = "comprobantes";

				$datos = array("comprobante"=>$_POST["editarComprobante"],
							   "id"=>$_POST["idComprobante"]);

				$respuesta = ModeloComprobantes::mdlEditarComprobante($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "comprobantes";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "comprobantes";

							}
						})

			  	</script>';

			}

		}

	}

	
	/*=============================================
	BORRAR COMPROBANTE
	=============================================*/

	static public function ctrBorrarComprobante(){

		if(isset($_GET["idComprobante"])){

			$tabla ="comprobantes";
			$datos = $_GET["idComprobante"];

			$respuesta = ModeloComprobantes::mdlBorrarComprobante($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La comprobante ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "comprobantes";

									}
								})

					</script>';
			}
		}
		
	}


}

	