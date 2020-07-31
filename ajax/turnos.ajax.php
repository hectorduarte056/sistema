<?php

require_once "../controladores/turnos.controlador.php";
require_once "../modelos/turnos.modelo.php";

class AjaxTurnos{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idTurno;

	public function ajaxEditarTurno(){

		$item = "id";
		$valor = $this->idTurno;

		$respuesta = ControladorTurnos::ctrMostrarTurnos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idTurno"])){

	$turno = new AjaxTurnos();
	$turno -> idTurno = $_POST["idTurno"];
	$turno -> ajaxEditarTurno();
}