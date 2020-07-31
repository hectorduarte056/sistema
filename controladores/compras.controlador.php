<?php



class ControladorCompras{

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarCompras($item, $valor){

		$tabla = "compras";

		$respuesta = ModeloCompras::mdlMostrarCompras($tabla, $item, $valor);

		return $respuesta;

	}
/*=============================================
	CREAR VENTA
	=============================================*/

	static public function ctrCrearCompra(){


		if(isset($_POST["nuevaVenta"]))

		{

			if($_POST["listaProductos"] == ""){

					echo'<script>

				swal({
					  type: "error",
					  title: "La compra no se ha ejecuta si no hay productos",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "compras";

								}
							})

				</script>';

				return;
			}





			/*=============================================
			ACTUALIZAR LAS ventas DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
			=============================================*/

			$listaProductos = json_decode($_POST["listaProductos"], true);

			 $totalProductosComprados = array();

			foreach ($listaProductos as $key => $value) {

			array_push($totalProductosComprados, $value["cantidad"]);

			    $tablaProductos = "productos";



			    $item = "id";
			    $valor = $value["id"];
			    $orden = "id";
			    $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor,$orden);

			    
				// $item1a = "ventas";
				// $valor1a = $value["cantidad"] + $traerProducto["ventas"];

			 // 	$nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

				$item1b = "stock";
				$valor1b = $value["cantidad"] + $traerProducto["stock"];

				$nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

			}

			$tablaClientes = "proveedores";

			$item = "id";
			$valor = $_POST["seleccionarCliente"];

			$traerCliente = ModeloProveedores::mdlMostrarProveedores($tablaClientes, $item, $valor);


			// $item1a = "ventas";
			// $valor1a = array_sum($totalProductosComprados) - $traerCliente["ventas"];

			// $ventasCliente = ModeloProveedores::mdlActualizarProveedor($tablaClientes, $item1a, $valor1a, $valor);

			$item1b = "ultima_venta";

			date_default_timezone_set('America/Santo_Domingo');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');
			$valor1b = $fecha.' '.$hora;

			$fechaCliente = ModeloProveedores::mdlActualizarProveedor($tablaClientes, $item1b, $valor1b, $valor);



			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/	

			$tabla = "compras";

			$datos = array("id_comprador"=>$_POST["idVendedor"],
						   "id_proveedor"=>$_POST["seleccionarCliente"],
						   "codigo"=>$_POST["nuevaVenta"],
						   "referencia"=> $_POST["nuevoComprobanteCompra"],
						   "ncf"=> $_POST["nuevoNFC"],
						   "productos"=>$_POST["listaProductos"],
						   "impuesto"=>$_POST["nuevoPrecioImpuesto"],
						   "neto"=>$_POST["nuevoPrecioNeto"],
						   "total"=>$_POST["totalVenta"],
						   "metodo_pago"=>$_POST["listaMetodoPago"]);



			$respuesta = ModeloCompras::mdlIngresarCompra($tabla, $datos);
			
			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La compra ha sido guardada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "compras";

								}
							})

				</script>';




			}
		}

	}

	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function ctrEditarCompra(){

		if(isset($_POST["editarVenta"])){

			/*=============================================
			FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
			=============================================*/
			$tabla = "compras";

			$item = "codigo";
			$valor = $_POST["editarVenta"];

			$traerVenta = ModeloCompras::mdlMostrarCompras($tabla, $item, $valor);

			/*=============================================
			REVISAR SI VIENE PRODUCTOS EDITADOS
			=============================================*/

			if($_POST["listaProductos"] == ""){

				$listaProductos = $traerVenta["productos"];
				$cambioProducto = false;

			}else{

				$listaProductos = $_POST["listaProductos"];
				$cambioProducto = true;
			}

			if($cambioProducto){

				$productos = json_decode($traerVenta["productos"], true);

				$totalProductosComprados = array();


					foreach ($productos as $key => $value) {

						array_push($totalProductosComprados, $value["cantidad"]);
						
						$tablaProductos = "productos";

						$item = "id";
						$valor = $value["id"];
						$orden = "id";
		

						$traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor,$orden );

						// $item1a = "ventas";
						// $valor1a = $traerProducto["ventas"] - $value["cantidad"];

						// $nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

						$item1b = "stock";
						$valor1b = $traerProducto["stock"] - $value["cantidad"];

						$nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

					}

					$tablaClientes = "proveedores";

					$itemCliente = "id";
					$valorCliente = $_POST["seleccionarCliente"];

					$traerCliente = ModeloProveedores::mdlMostrarProveedores($tablaClientes, $itemCliente, $valorCliente);

					// $item1a = "ventas";
					// $valor1a = $traerCliente["ventas"] - array_sum($totalProductosComprados);		

					// $comprasCliente = ModeloProveedores::mdlActualizarProveedor($tablaClientes, $item1a, $valor1a, $valorCliente);

				/*=============================================
				ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
				=============================================*/

					$listaProductos_2 = json_decode($listaProductos, true);

					$totalProductosComprados_2 = array();

					foreach ($listaProductos_2 as $key => $value) {

						array_push($totalProductosComprados_2, $value["cantidad"]);
						
						$tablaProductos_2 = "productos";

						$item_2 = "id";
						$valor_2 = $value["id"];
						$orden = "id";

						$traerProducto_2 = ModeloProductos::mdlMostrarProductos($tablaProductos_2, $item_2, $valor_2, $orden);

						// $item1a_2 = "ventas";
						// $valor1a_2 = $value["cantidad"] + $traerProducto_2["ventas"];

						// $nuevasVentas_2 = ModeloProductos::mdlActualizarProducto($tablaProductos_2, $item1a_2, $valor1a_2, $valor_2);

						$item1b_2 = "stock";
						$valor1b_2 = $traerProducto_2["stock"] + $value["cantidad"];

						$nuevoStock_2 = ModeloProductos::mdlActualizarProducto($tablaProductos_2, $item1b_2, $valor1b_2, $valor_2);

					}

					$tablaClientes_2 = "proveedores";

					$item_2 = "id";
					$valor_2 = $_POST["seleccionarCliente"];

					$traerCliente_2 = ModeloProveedores::mdlMostrarProveedores($tablaClientes_2, $item_2, $valor_2);

					// $item1a_2 = "ventas";

					// $valor1a_2 = array_sum($totalProductosComprados_2) + $traerCliente_2["ventas"];

					// $comprasCliente_2 = ModeloProveedores::mdlActualizarProveedor($tablaClientes_2, $item1a_2, $valor1a_2, $valor_2);

					$item1b_2 = "ultima_venta";

					date_default_timezone_set('America/Santo_Domingo');

					$fecha = date('Y-m-d');
					$hora = date('H:i:s');
					$valor1b_2 = $fecha.' '.$hora;

					$fechaCliente_2 = ModeloProveedores::mdlActualizarProveedor($tablaClientes_2, $item1b_2, $valor1b_2, $valor_2);
			}

			/*/*=============================================
			GUARDAR CAMBIOS DE LA COMPRA
			=============================================*/	

			$datos = array("id_comprador"=>$_POST["idVendedor"],
						   "id_proveedor"=>$_POST["seleccionarCliente"],
						   "codigo"=>$_POST["editarVenta"],
						   "referencia"=> $_POST["nuevoComprobante"],
						   "ncf"=> $_POST["editarNFC"],
						   "productos"=>$listaProductos,
						   "impuesto"=>$_POST["nuevoPrecioImpuesto"],
						   "neto"=>$_POST["nuevoPrecioNeto"],
						   "total"=>$_POST["totalVenta"],
						   "metodo_pago"=>$_POST["listaMetodoPago"]);

			$respuesta = ModeloCompras::mdlEditarCompra($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La compra ha sido editada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "compras";

								}
							})

				</script>';




			}
		}

	}


	/*=============================================
	ELIMINAR VENTA
	=============================================*/

	static public function ctrEliminarCompra(){

	if(isset($_GET["idVenta"])){

		$tabla = "compras";

		$item = "id";
		$valor = $_GET["idVenta"];

		$traerVenta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);



		/*=============================================
		ACTUALIZAR FECHA ÚLTIMA COMPRA
		=============================================*/

		$tablaClientes = "proveedores";

		$itemVentas = null;
		$valorVentas = null;

		$traerVentas = ModeloProveedores::mdlMostrarProveedores($tabla, $itemVentas, $valorVentas);

		$guardarFechas = array();

		foreach ($traerVentas as $key => $value) {
			
			if($value["id_proveedor"] == $traerVenta["id_proveedor"]){



			array_push($guardarFechas, $value["fecha"]);

          }

       }

			if(count($guardarFechas) > 1){

				if($traerVenta["fecha"] > $guardarFechas[count($guardarFechas)-2]){

				$item = "ultima_venta";
				$valor = $guardarFechas[count($guardarFechas)-2];
				$valorIdCliente = $traerVenta["id_proveedor"];

				$comprasCliente = ModeloProveedores::mdlActualizarProveedor($tablaClientes, $item, $valor, $valorIdCliente);

			}else{

				$item = "ultima_venta";
				$valor = $guardarFechas[count($guardarFechas)-1];
				$valorIdCliente = $traerVenta["id_proveedor"];

				$comprasCliente = ModeloProveedores::mdlActualizarProveedor($tablaClientes, $item, $valor, $valorIdCliente);

				}		

	 	   }else{

	 	   		$item = "ultima_venta";
				$valor = "0000-00-00 00:00:00";
				$valorIdCliente = $traerVenta["id_proveedor"];

				$comprasCliente = ModeloProveedores::mdlActualizarProveedor($tablaClientes, $item, $valor, $valorIdCliente);

	   }

	   		/*=============================================
			FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
			=============================================*/

			$productos =  json_decode($traerVenta["productos"], true);

			$totalProductosComprados = array();

			foreach ($productos as $key => $value) {

				array_push($totalProductosComprados, $value["cantidad"]);
				
				$tablaProductos = "productos";

				$item = "id";
				$valor = $value["id"];
				$orden = "id";

				$traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $orden);

				// $item1a = "ventas";
				// $valor1a = $traerProducto["ventas"] - $value["cantidad"];

				// $nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

				$item1b = "stock";

				$valor1b = $traerProducto["stock"] - $value["cantidad"];


				$nuevoStock = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);

			}

			// $tablaClientes = "proveedores";

			// $itemCliente = "id";
			// $valorCliente = $traerVenta["id_proveedor"];

			// $traerCliente = ModeloProveedores::mdlMostrarProveedores($tablaClientes, $itemCliente, $valorCliente);

			// $item1a = "ventas";
			// $valor1a = $traerCliente["ventas"] - array_sum($totalProductosComprados);

			// $comprasCliente = ModeloProveedores::mdlActualizarProveedor($tablaClientes, $item1a, $valor1a, $valorCliente);

			/*=============================================
			ELIMINAR VENTA
			=============================================*/

			$respuesta = ModeloCompras::mdlEliminarCompra($tabla, $_GET["idVenta"]);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La compra ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "compras";

								}
							})

				</script>';

						
		}

	}

  }


  	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasCompras($fechaInicial, $fechaFinal){

		$tabla = "compras";

		$respuesta = ModeloCompras::mdlRangoFechasCompras($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}


	/*=============================================
	DESCARGAR EXCEL
	=============================================*/

	public function ctrDescargarReporteCompras(){

	if(isset($_GET["reporteCompra"])){

		$tabla = "compras";

		if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){

			$compras = ModeloCompras::mdlRangoFechasCompras($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);

		}else{

			$item = null;
			$valor = null;

			$compras = ModeloCompras::mdlMostrarCompras($tabla, $item, $valor);

	}

	/*=============================================
	CREAMOS EL ARCHIVO DE EXCEL
	=============================================*/

		$Name = $_GET["reporteCompra"].'.xls';

		header('Expires: 0');
		header('Cache-control: private');
		header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
		header("Cache-Control: cache, must-revalidate"); 
		header('Content-Description: File Transfer');
		header('Last-Modified: '.date('D, d M Y H:i:s'));
		header("Pragma: public"); 
		header('Content-Disposition:; filename="'.$Name.'"');
		header("Content-Transfer-Encoding: binary");

		echo utf8_decode("<table border='0'> 

			<tr> 
			<td style='font-weight:bold; border:1px solid #eee;'>FACTURA</td> 
			<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td>
			<td style='font-weight:bold; border:1px solid #eee;'>VENDEDOR</td>
			<td style='font-weight:bold; border:1px solid #eee;'>NCF</td>
			<td style='font-weight:bold; border:1px solid #eee;'>CANTIDAD</td>
			<td style='font-weight:bold; border:1px solid #eee;'>PRODUCTOS</td>
			<td style='font-weight:bold; border:1px solid #eee;'>IMPUESTO</td>
			<td style='font-weight:bold; border:1px solid #eee;'>NETO</td>		
			<td style='font-weight:bold; border:1px solid #eee;'>TOTAL</td>		
			<td style='font-weight:bold; border:1px solid #eee;'>METODO DE PAGO</td	
			<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>		
			</tr>");


			foreach ($compras as $row => $item){

			$proveedores = ControladorProveedores::ctrMostrarProveedores("id", $item["id_proveedor"]);
			$comprador = ControladorUsuarios::ctrMostrarUsuarios("id", $item["id_comprador"]);

			 echo utf8_decode("<tr>
 			<td style='border:1px solid #eee;'>".$item["codigo"]."</td> 
 			<td style='border:1px solid #eee;'>".$proveedores["nombre"]."</td>
 			<td style='border:1px solid #eee;'>".$comprador["nombre"]."</td>
 			<td style='border:1px solid #eee;'>".$item["ncf"]."</td> 
 			<td style='border:1px solid #eee;'>");

			$productos =  json_decode($item["productos"], true);

			foreach ($productos as $key => $valueProductos) {
			 			
	 			echo utf8_decode($valueProductos["cantidad"]."<br>");
	 		}

	 	 	echo utf8_decode("</td><td style='border:1px solid #eee;'>");	

 			foreach ($productos as $key => $valueProductos) {
	 			
 			echo utf8_decode($valueProductos["descripcion"]."<br>");
 		
			}

			 	echo utf8_decode("</td>
			<td style='border:1px solid #eee;'>$ ".number_format($item["impuesto"],2)."</td>
			<td style='border:1px solid #eee;'>$ ".number_format($item["neto"],2)."</td>	
			<td style='border:1px solid #eee;'>$ ".number_format($item["total"],2)."</td>
			<td style='border:1px solid #eee;'>".$item["metodo_pago"]."</td>
			<td style='border:1px solid #eee;'>".substr($item["fecha"],0,10)."</td>		
 			</tr>");

		}

			echo "</table>";


		}

	}

	/*=============================================
	SUMA TOTAL VENTAS
	=============================================*/

	public function ctrSumaTotalCompras(){

		$tabla = "compras";

		$respuesta = ModeloCompras::mdlSumaTotalCompras($tabla);

		return $respuesta;

	}
}


