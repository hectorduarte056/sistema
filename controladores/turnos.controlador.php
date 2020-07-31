<?php

class ControladorTurnos{



	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearTurno(){

		if(isset($_POST["nuevoTurno"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTurno"])){

				$tabla = "turnos";

				$datos = $_POST["nuevoTurno"];

				$respuesta = ModeloTurnos::mdlIngresarTurno($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El turno ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "turnos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El turno no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "turnos";

							}
						})

			  	</script>';

			}

		}

	}

		/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarTurnos($item, $valor){

		$tabla = "turnos";

		$respuesta = ModeloTurnos::mdlMostrarTurnos($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarTurno(){

		if(isset($_POST["editarTurno"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTurno"])){

				$tabla = "turnos";

				$datos = array("turno"=>$_POST["editarTurno"],
							   "id"=>$_POST["idTurno"]);

				$respuesta = ModeloTurnos::mdlEditarTurno($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El turno ha sido actualizada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "turnos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El turnono puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "turnos";

							}
						})

			  	</script>';

			}

		}

	}

	
	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarTurno(){

		if(isset($_GET["idTurno"])){

			$tabla ="turnos";
			$datos = $_GET["idTurno"];

			$respuesta = ModeloTurnos::mdlBorrarTurno($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "Gracias por visitarnos!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "turnos";

									}
								})

					</script>';
			}
		}
		
	}


}

	