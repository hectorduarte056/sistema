<?php

class ControladorProductos{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductos($item, $valor, $orden){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor, $orden);

		return $respuesta;

	}

	/*=============================================
		CREAR PRODUCTO
	=============================================*/

	static public function ctrCrearProducto(){


		if(isset($_POST["nuevaDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevaDescripcion"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])){

		$ruta = "vistas/img/productos/default/anonymous.png";

	/*=============================================
						Validar imagen
	=============================================*/	

			$ruta = "vistas/img/productos/default/anonymous.png";

			if(isset($_FILES["nuevaImagen"]["tmp_name"])){

				 list($ancho,$alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);


				 $nuevoAncho = 500;
				 $nuevoAlto  = 500;

			/*=============================================
			Crearemos el directorio donde vamos a guardar la foto del usuario
			=============================================*/	


			$directorio = "vistas/img/productos/".$_POST["nuevoCodigo"];

			mkdir($directorio, 0755);

			/*=============================================
			De acuerdo al tipo de imagen aplicamos las funciones por defecto de PHP
			=============================================*/	

			if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){

			/*=============================================
			Guardar la ruta en el directorio
			=============================================*/	

			$aleatorio = mt_rand(100,999);

			$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho ,$nuevoAlto , $ancho, $alto);

			imagejpeg($destino, $ruta);

				}

				if($_FILES["nuevaImagen"]["type"] == "image/png"){

			/*=============================================
			Guardar la ruta en el directorio
			=============================================*/	

			$aleatorio = mt_rand(100,999);

			$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

			$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho ,$nuevoAlto , $ancho, $alto);

			imagepng($destino, $ruta);

				}

			

			}


		$tabla = "productos";
		

				$datos = array("id_categoria" => $_POST["nuevaCategoria"],
							   "codigo" => $_POST["nuevoCodigo"],
							   "descripcion" => $_POST["nuevaDescripcion"],
							   "stock" => $_POST["nuevoStock"],
							   "precio_compra" => $_POST["nuevoPrecioCompra"],
							   "precio_venta" => $_POST["nuevoPrecioVenta"],
							   "itbis" => $_POST["nuevoItbis"],
							   "imagen" => $ruta);

				$respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El producto ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "productos";

										}
									})

						</script>';

					}

			
			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
		CREAR PRODUCTO
	=============================================*/

	static public function ctrEditarProducto(){


		if(isset($_POST["editarDescripcion"])){
			 
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["editarDescripcion"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])){

		$ruta = "vistas/img/productos/default/anonymous.png";

	/*=============================================
						Validar imagen
	=============================================*/	

			$ruta = $_POST["imagenActual"];

		if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){

				 list($ancho,$alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);


				 $nuevoAncho = 500;
				 $nuevoAlto  = 500;

			/*=============================================
			Crearemos el directorio donde vamos a guardar la foto del usuario
			=============================================*/	


			$directorio = "vistas/img/productos/".$_POST["editarCodigo"];


			/*=============================================
			PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
			=============================================*/

		   if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png")
			{

					unlink($_POST["imagenActual"]);

			}else{

				mkdir($directorio, 0755);

			}

						

			/*=============================================
			De acuerdo al tipo de imagen aplicamos las funciones por defecto de PHP
			=============================================*/	

			if($_FILES["editarImagen"]["type"] == "image/jpeg"){

			/*=============================================
			Guardar la ruta en el directorio
			=============================================*/	

			$aleatorio = mt_rand(100,999);

			$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";

			$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho ,$nuevoAlto , $ancho, $alto);

			imagejpeg($destino, $ruta);

				}

				if($_FILES["editarImagen"]["type"] == "image/png"){

			/*=============================================
			Guardar la ruta en el directorio
			=============================================*/	

			$aleatorio = mt_rand(100,999);

			$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".png";

			$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho ,$nuevoAlto , $ancho, $alto);

			imagepng($destino, $ruta);

				}

			

			}


		$tabla = "productos";
		

				$datos = array("id_categoria" => $_POST["editarCategoria"],
							   "codigo" => $_POST["editarCodigo"],
							   "descripcion" => $_POST["editarDescripcion"],
							   "stock" => $_POST["editarStock"],
							   "precio_compra" => $_POST["editarPrecioCompra"],
							   "precio_venta" => $_POST["editarPrecioVenta"],
							   "itbis" => $_POST["editarItbis"],
							   "imagen" => $ruta);

				$respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El producto ha sido editar correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "productos";

										}
									})

						</script>';

					}

			
			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';
			}
		}
	}


	/*=============================================
	BORRAR PRODUCTO
	=============================================*/
	static public function ctrEliminarProducto(){

		if(isset($_GET["idProducto"])){

			$tabla ="productos";
			$datos = $_GET["idProducto"];

			if($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png"){

				unlink($_GET["imagen"]);
				rmdir('vistas/img/productos/'.$_GET["codigo"]);

			}

			$respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El producto ha sido eliminado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "productos";

								}
							})

				</script>';

			}		
		}

	}

		/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function ctrMostrarSumaVentas(){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

		return $respuesta;

	}

}