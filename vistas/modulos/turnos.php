
          

  <div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar turnos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar turnos</li>

    </ol>

  </section>
  
  <section class="content">

    <div class="box">
      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTurno">
          
        Agregar turno

        </button>

              
      </div>

      <div class="box-body">

      <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        
    
    
        <thead>

        
          
        <tr>
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Hora de llegada</th>
           <th>Acciones</th>
          
        </tr>

        </thead>

        <tbody>


          <?php 

          $item = null;
          $valor = null;

          $turnos = ControladorTurnos::ctrMostrarTurnos($item, $valor);

           foreach ($turnos as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["turno"].'</td>
                    <td class="text-uppercase">'.$value["fecha"].'</td>

                    <td>

                      <div class="btn-group">

                        
                        <button class="btn btn-success btnAtenderTurno" idTurno="'.$value["id"].'"><i class="fa fa-check-square"></i></button>
                          
                        

                         <button class="btn btn-danger btnEliminarTurno" idTurno="'.$value["id"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
          }

        ?>
                                       
        </tbody>

        <!-- <button class="btn btn-warning btnEditarTurno" idTurno="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarTurno"><i class="fa fa-pencil"></i></button>
 -->
      </table>
     
      </div>
    
    </div>

  </section>

  </div>

<!--=====================================
            MODAL AGREGAR CATEGORIA
======================================-->


<div id="modalAgregarTurno" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

   <form role="form" method="post">

<!--=====================================
          CABEZA DEL MODAL
======================================-->

      <div class="modal-header" style="background: #3c8dbc; color: white">  

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar turno</h4>

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

              <input type="text" class="form-control input-lg"  name="nuevoTurno" placeholder="Ingresar cateogía" id="nuevoTurno" required>

          </div>

        </div>

     
      </div>

    </div>

<!--=====================================
           PIE DEL MODAL
======================================-->
    
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar turno</button>

      </div>

      <?php 

          $crearTurno = new ControladorTurnos();
          $crearTurno-> ctrCrearTurno();
   

       ?>

      </form>

    </div>

  </div>

</div>


<!--=====================================
        MODAL EDITAR CATEGORIA
======================================-->


<div id="modalEditarTurno" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

   <form role="form" method="post">

<!--=====================================
          CABEZA DEL MODAL
======================================-->

      <div class="modal-header" style="background: #3c8dbc; color: white">  

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar turno</h4>

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

              <input type="text" class="form-control input-lg"  name="editarTurno" id="editarTurno" required>

              <input type="hidden"  name="idTurno" id="idTurno" required>

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

          $editarTurno = new ControladorTurnos();
          $editarTurno -> ctrEditarTurno();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarTurno = new ControladorTurnos();
  $borrarTurno -> ctrBorrarTurno();

?>

