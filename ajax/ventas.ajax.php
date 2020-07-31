  <?php
require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";


require_once "../controladores/comprobantes.controlador.php";
require_once "../modelos/comprobantes.modelo.php";


class AjaxVentas{

/*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/

    public $idComprobante;

    public function ajaxCrearNuevoNFC(){

   	$item = "id_comprobante";
  	$valor = $this->idComprobante;
    

  	$respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);

  	echo json_encode($respuesta);

  	}
  }



/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/	

if(isset($_POST["idComprobante"])){

	$comprobanteNCF = new AjaxVentas();
	$comprobanteNCF -> idComprobante = $_POST["idComprobante"];
	$comprobanteNCF -> ajaxCrearNuevoNFC();

  }









