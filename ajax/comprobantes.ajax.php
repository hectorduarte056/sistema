<?php

require_once "../controladores/comprobantes.controlador.php";
require_once "../modelos/comprobantes.modelo.php";

class AjaxComprobantes{

	/*=============================================
	EDITAR COMPROBANTE
	=============================================*/	

	public $idComprobante;

	public function ajaxEditarComprobante(){

		$item = "id";
		$valor = $this->idComprobante;

		$respuesta = ControladorComprobantes::ctrMostrarComprobantes($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR COMPROBANTE
=============================================*/	
if(isset($_POST["idComprobante"])){

	$comprobante = new AjaxComprobantes();
	$comprobante -> idComprobante = $_POST["idComprobante"];
	$comprobante -> ajaxEditarComprobante();
}