<?php

require_once "conexion.php";

class ModeloCompras{

  /*=============================================
  MOSTRAR COMPRA
  =============================================*/

  static public function mdlMostrarCompras($tabla, $item, $valor){

    if($item != null){

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY ncf desc");

      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

      $stmt -> execute();

      return $stmt -> fetch();

    }else{

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll();

    }
    
    $stmt -> close();

    $stmt = null;

  }

    /*=============================================
  REGISTRO DE COMPRA
  =============================================*/

  static public function mdlIngresarCompra($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, id_proveedor, id_comprador, referencia, ncf, productos, impuesto, neto, total, metodo_pago) VALUES (:codigo, :id_proveedor, :id_comprador , :referencia,:ncf, :productos, :impuesto, :neto, :total, :metodo_pago)");

    $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
    $stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_INT);
    $stmt->bindParam(":id_comprador", $datos["id_comprador"], PDO::PARAM_INT);
    $stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
    $stmt->bindParam(":ncf", $datos["ncf"], PDO::PARAM_STR);
    $stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
    $stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
    $stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
    $stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
    $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

    if($stmt->execute()){

      return "ok";

    }else{

      return "error";
    
    }

    $stmt->close();
    $stmt = null;

  }

    static public function mdlEditarCompra($tabla, $datos){

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_proveedor = :id_proveedor, id_comprador = :id_comprador , referencia = :referencia, ncf = :ncf, productos = :productos, impuesto = :impuesto, neto = :neto, total= :total, metodo_pago = :metodo_pago WHERE codigo = :codigo");

    $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
    $stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_INT);
    $stmt->bindParam(":id_comprador", $datos["id_comprador"], PDO::PARAM_INT);
    $stmt->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
    $stmt->bindParam(":ncf", $datos["ncf"], PDO::PARAM_STR);
    $stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
    $stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
    $stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
    $stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
    $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

    if($stmt->execute()){

      return "ok";

    }else{

      return "error";
    
    }

    $stmt->close();
    $stmt = null;

  }

    /*=============================================
  ELIMINAR VENTA
  =============================================*/

  static public function mdlEliminarCompra($tabla, $datos){

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

    /*=============================================
  RANGO FECHAS
  =============================================*/ 

  static public function mdlRangoFechasCompras($tabla, $fechaInicial, $fechaFinal){

    if($fechaInicial == null){

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

      $stmt -> execute();

      return $stmt -> fetchAll(); 


    }else if($fechaInicial == $fechaFinal){

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");

      $stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

      $stmt -> execute();

      return $stmt -> fetchAll();

    }else{

      $fechaActual = new DateTime();
      $fechaActual ->add(new DateInterval("P1D"));
      $fechaActualMasUno = $fechaActual->format("Y-m-d");

      $fechaFinal2 = new DateTime($fechaFinal);
      $fechaFinal2 ->add(new DateInterval("P1D"));
      $fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

      if($fechaFinalMasUno == $fechaActualMasUno){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

      }else{


        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'");

      }
    
      $stmt -> execute();

      return $stmt -> fetchAll();

    }

  }

  /*=============================================
  SUMAR EL TOTAL DE VENTAS
  =============================================*/

  static public function mdlSumaTotalCompras($tabla){  

    $stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total FROM $tabla");

    $stmt -> execute();

    return $stmt -> fetch();

    $stmt -> close();

    $stmt = null;

  }

}


