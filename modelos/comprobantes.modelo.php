<?php

require_once "conexion.php";


class ModeloComprobantes{



/*=============================================
	CREAR CATEGORIA
=============================================*/


	static public function mdlIngresarComprobante($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(comprobante) VALUES (:comprobante)");

		$stmt->bindParam(":comprobante", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

/*=============================================
	MOSTRAR CATEGORIAS
=============================================*/

	static public function mdlMostrarComprobantes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC" );

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarComprobante($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET comprobante = :comprobante WHERE id = :id");

		$stmt -> bindParam(":comprobante", $datos["comprobante"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

/*=============================================
	BORRAR COMPROBANTE
=============================================*/

	static public function mdlBorrarComprobante($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}