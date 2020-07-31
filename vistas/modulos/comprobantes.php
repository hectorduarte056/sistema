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

      Administrar comprobante

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar comprobante</li>

    </ol>

  </section>
  
  <section class="content">

    <div class="box">
      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarComprobante">
          
        Agregar comprobante

        </button>

              
      </div>

      <div class="box-body">

      <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        
    
    
        <thead>

        
          
        <tr>

            <th style="width:10px">#</th>
            <th>Comprobante</th>
            <th>Acciones</th>
          
        </tr>

        </thead>

        <tbody>


          <?php 

          $item = null;
          $valor = null;

          $comprobantes = ControladorComprobantes::ctrMostrarComprobantes($item, $valor);

           foreach ($comprobantes as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["comprobante"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarComprobante" idComprobante="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarComprobante"><i class="fa fa-pencil"></i></button>

                         <button class="btn btn-danger btnEliminarComprobante" idComprobante="'.$value["id"].'"><i class="fa fa-times"></i></button>


                      </div>  

                    </td>

                  </tr>';
          }

        ?>
                                       
        </tbody>

      </table>
     
      </div>
    
    </div>

  </section>

  </div>

<!--=====================================
            MODAL AGREGAR CATEGORIA
======================================-->


<div id="modalAgregarComprobante" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

   <form role="form" method="post">

<!--=====================================
          CABEZA DEL MODAL
======================================-->

      <div class="modal-header" style="background: #3c8dbc; color: white">  

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar comprobante</h4>

      </div>

<!--=====================================
           CUERPO DEL MODAL
======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- ENTRADA DE COMPROBANTE -->
          
          <div class="form-group">

           <div class="input-group">
            
            <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <input type="text" class="form-control input-lg"  name="nuevoComprobante" placeholder="Ingresar cateogía" id="nuevoComprobante" required>

          </div>

        </div>

     
      </div>

    </div>

<!--=====================================
           PIE DEL MODAL
======================================-->
    
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar comprobante</button>

      </div>

      <?php 

          $crearComprobante = new ControladorComprobantes();
          $crearComprobante -> ctrCrearComprobante();
   

       ?>

      </form>

    </div>

  </div>

</div>


<!--=====================================
        MODAL EDITAR COMPROBANTE
======================================-->


<div id="modalEditarComprobante" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

   <form role="form" method="post">

<!--=====================================
          CABEZA DEL MODAL
======================================-->

      <div class="modal-header" style="background: #3c8dbc; color: white">  

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar comprobante</h4>

      </div>

<!--=====================================
           CUERPO DEL MODAL
======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- ENTRADA DE CATEGORIA -->
          
          <div class="form-group">

           <div class="input-group">
            
            <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <input type="text" class="form-control input-lg"  name="editarComprobante" id="editarComprobante" required>

              <input type="hidden"  name="idComprobante" id="idComprobante" required>

          </div>

        </div>

     
      </div>

    </div>

<!--=====================================
           PIE DEL MODAL
======================================-->
    
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>

      </div>

      <?php

          $editarComprobante = new ControladorComprobantes();
          $editarComprobante -> ctrEditarComprobante();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarComprobante = new ControladorComprobantes();
  $borrarComprobante -> ctrBorrarComprobante();

?>

