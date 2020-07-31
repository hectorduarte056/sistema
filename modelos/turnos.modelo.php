<?php

require_once "conexion.php";


class ModeloTurnos{



/*=============================================
	CREAR CATEGORIA
=============================================*/


	static public function mdlIngresarTurno($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(turno) VALUES (:turno)");

		$stmt->bindParam(":turno", $datos, PDO::PARAM_STR);

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

	static public function mdlMostrarTurnos($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

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

	static public function mdlEditarTurno($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET turno = :turno WHERE id = :id");

		$stmt -> bindParam(":turno", $datos["turno"], PDO::PARAM_STR);
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
	BORRAR CATEGORIA
=============================================*/

	static public function mdlBorrarTurno($tabla, $datos){

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