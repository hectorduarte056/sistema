<?php 



require_once "../../../controladores/compras.controlador.php";
require_once "../../../modelos/compras.modelo.php";

require_once "../../../controladores/proveedores.controlador.php";
require_once "../../../modelos/proveedores.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class imprimirFacturaCompra{

public $codigo;

public function traerImpresionFacturaCompra(){


$itemVenta = "codigo";
$valorVenta = $this->codigo;

$respuestaCompra = ControladorCompras::ctrMostrarCompras($itemVenta, $valorVenta);

$fecha = substr($respuestaCompra["fecha"],0,-8);
$productos = json_decode($respuestaCompra["productos"], true);
$ncf = json_decode($respuestaCompra["ncf"], true);
$neto = number_format($respuestaCompra["neto"],2);
$impuesto = number_format($respuestaCompra["impuesto"],2);
$total = number_format($respuestaCompra["total"],2);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemProveedor = "id";
$valorProveedor = $respuestaCompra["id_proveedor"];

$respuestaCliente = ControladorProveedores::ctrMostrarProveedores($itemProveedor, $valorProveedor);

//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

$itemComprador = "id";
$valorComprador = $respuestaCompra["id_comprador"];

$respuestaComprador= ControladorUsuarios::ctrMostrarUsuarios($itemComprador, $valorComprador);



require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();	

$pdf->AddPage();

$bloque1 = <<<EOF

	<table>
		 
		 <tr>
				<br>
				<td style="width:150px"><img src="images/logo-negro-bloque.png"><div style="font-size:9.5px; text-align:center ; line-heigth:15px;">

				  	RNC: 056-0173910-4

				  	<br>
				  	Dirección: C/Salcedo #98 SFM

				  	<br>
				  	Celular: 829-816-8276

				  	 </div>
				
				</td>

				<td style="background-color:white; width:150px">

				  <div style="font-size:12.0px; text-align:center ; line-heigth:15px;">



				  	Factura de compra
					<br>
				  	Instagram
				  	<br>
				  	@DLucyNails

				  </div>

				</td>
	

				<td style="background-color:white; width:120px; text-align:center; color:red">
				<br>
				<br>NFC<br>$respuestaCompra[ncf]</td>


				<td style="background-color:white; width:120px; text-align:center; color:red">
				<br><br>FACTURA N.<br>$valorVenta</td>


		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				Proveedor: $respuestaCliente[nombre]

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				Fecha: $fecha

			</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">Usuario: $respuestaComprador[nombre]</td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:260px; text-align:center">Producto</td>
		<td style="border: 1px solid #666; background-color:white; width:80px; text-align:center">Cantidad</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor Unit.</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor Total</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------

foreach ($productos as $key => $item) {

$itemProducto = "descripcion";
$valorProducto = $item["descripcion"];
$orden = null;

$respuestaProducto = ControladorProductos::ctrMostrarProductos($itemProducto, $valorProducto, $orden);

$valorUnitario = number_format($respuestaProducto["precio_venta"], 2);

$precioTotal = number_format($item["total"], 2);

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:260px; text-align:left">
				$item[descripcion]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:80px; text-align:center">
				$item[cantidad]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ 
				$valorUnitario
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ 
				$precioTotal
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>

		</tr>
		
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:center">
				Neto:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $neto
			</td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				Impuesto:
			</td>
		
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $impuesto
			</td>

		</tr>

		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				Total:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">
				$ $total
			</td>

		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');



// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

$pdf->Output('factura.pdf', 'D');

}

}

$facturaCompra = new imprimirFacturaCompra();
$facturaCompra -> codigo = $_GET["codigo"];
$facturaCompra -> traerImpresionFacturaCompra();

?>