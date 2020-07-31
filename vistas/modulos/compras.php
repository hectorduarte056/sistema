<?php

if($_SESSION["perfil"] == "Vendedor"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar compras
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar compras</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <a href="crear-compra">

          <button class="btn btn-primary">
            
            Agregar compra

          </button>

        </a>

        <button type="button" class="btn btn-default pull-right" id="daterange-btn3">
         
          <span>
            <i class="fa fa-calendar"></i> Rango de fecha
          </span>

          <i class="fa fa-caret-down"></i>

       </button>

    </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>

           <th style="width:10px">#</th>
           <th>Código factura</th>
           <th>Proveedor</th>
           <th>Comprador</th>
           <th>Forma de pago</th>
           <th>Referencia</th>
           <th>NCF</th>
           <th>Neto</th>
           <th>Total</th> 
           <th>Fecha</th>
           <th>Acciones</th>
          
        </tr>

        </thead>

        <tbody>

         <?php

          if(isset($_GET["fechaInicial"])){

            $fechaInicial = $_GET["fechaInicial"];
            $fechaFinal = $_GET["fechaFinal"];

          }else{

            $fechaInicial = null;
            $fechaFinal = null;

          }

                $respuesta = ControladorCompras::ctrRangoFechasCompras($fechaInicial, $fechaFinal);
                
                foreach ($respuesta as $key => $value) {


                  echo '            <tr>
              
              <td>'.($key+1).'</td>
              <td>'.$value["codigo"].'</td>';


                $itemCliente = "id";
                $valorCliente = $value["id_proveedor"];

                $respuestaCliente = ControladorProveedores::ctrMostrarProveedores($itemCliente, $valorCliente);


              echo '<td>'.$respuestaCliente["nombre"].'</td>';

                $itemUsuario = "id";
                $valorUsuario = $value["id_comprador"];

                $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);


             echo '<td>'.$respuestaUsuario["nombre"].'</td>
              <td>'.$value["metodo_pago"].'</td>
              <td>'.$value["referencia"].'</td>
              <td>B'.$value["ncf"].'</td>
              <td>$ '.number_format($value["neto"],2).'</td>
              <td>$ '.number_format($value["total"],2).'</td>
              <td>'.$value["fecha"].'</td>
              
              <td>
                
                <div class="btn-group">
                  
                  <button class="btn btn-info btnImprimirFacturaCompras"codigoCompra="'.$value["codigo"].'">
                  
                  <i class="fa fa-print"></i>

                  </button>

                  <button class="btn btn-warning btnEditarCompra" idVenta="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                  if($_SESSION["perfil"] == "Administrador"){ 

                  echo'<button class="btn btn-danger btnEliminarCompra" idVenta="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                }


                echo'</div>

              </td>

            </tr>';
                  
                }

                ?>
          
        </tbody>

       </table>

             <?php

      $eliminarCompra = new ControladorCompras();
      $eliminarCompra -> ctrEliminarCompra();

      ?>


      </div>

    </div>

  </section>

</div>

