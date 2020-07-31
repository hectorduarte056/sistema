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

      Administrar proveedores

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar proveedores</li>

    </ol>

  </section>
  
  <section class="content">

    <div class="box">
      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor">
          
        Agregar proveedor

        </button>

              
      </div>

      <div class="box-body">

      <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        

        <thead>
          
        <tr>

           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Cedula</th>
           <th>Teléfono</th>
           <th>Dirección</th>
           <th>Última venta</th>
           <th>Ingreso al sistema</th>
           <th>Acciones</th>
          
        </tr>
        </tr>

        </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

         foreach ($proveedores as $key => $value) {

            echo '<tr>
              
              <td>'.($key+1).'</td>
              <td>'.$value["nombre"].'</td>
              <td>'.$value["rnc"].'</td>
              <td>'.$value["telefono"].'</td>
              <td>'.$value["direccion"].'</td>
              <td>'.$value["ultima_venta"].'</td>
              <td>'.$value["fecha"].'</td>
              <td>
                
                <div class="btn-group">
                  
                 <button class="btn btn-warning btnEditarProveedor" data-toggle="modal" data-target="#modalEditarProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                  if($_SESSION["perfil"] == "Administrador"){ 

                 
                  echo'<button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                }

                echo'</div>

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
            MODAL AGREGAR PROVEEDOR
======================================-->


<div id="modalAgregarProveedor" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

   <form role="form" method="post">

<!--=====================================
          CABEZA DEL MODAL
======================================-->

      <div class="modal-header" style="background: #3c8dbc; color: white">  

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar proveedor</h4>

      </div>

<!--=====================================
           CUERPO DEL MODAL
======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- ENTRADA DE proveedor -->
          
          <div class="form-group">

           <div class="input-group">
            
            <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg"  name="nuevoProveedor" placeholder="Ingresar nombre" required>

          </div>

        </div>

                    <!-- ENTRADA DE CEDULA ID -->
          
          <div class="form-group">

           <div class="input-group">
            
            <span class="input-group-addon"><i class="fa fa-key"></i></span>

              <input type="text"  class="form-control input-lg"  name="nuevoRnc" placeholder="Ingresar RNC" data-inputmask="'mask':'999-9999999-9'" data-mask required>

          </div>

        </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>


             <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

              </div>

            </div>
     
     
      </div>

    </div>

<!--=====================================
           PIE DEL MODAL
======================================-->
    
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar proveedor</button>

      </div>

      </form>

      <?php

        $crearProveedor = new ControladorProveedores();
        $crearProveedor -> ctrCrearProveedor();

      ?>


    </div>

  </div>

</div>

<!--=====================================
            MODAL EDITAR PROVEEDOR
======================================-->


<div id="modalEditarProveedor" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

   <form role="form" method="post">

<!--=====================================
          CABEZA DEL MODAL
======================================-->

      <div class="modal-header" style="background: #3c8dbc; color: white">  

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar proveedor</h4>

      </div>

<!--=====================================
           CUERPO DEL MODAL
======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- ENTRADA DE PROVEEDOR -->
          
          <div class="form-group">

           <div class="input-group">
            
            <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg"  name="editarProveedor" id="editarProveedor"
                required>
                <input type="hidden" id="idProveedor" name="idProveedor">

          </div>

        </div>

                    <!-- ENTRADA DE CEDULA ID -->
          
          <div class="form-group">

           <div class="input-group">
            
            <span class="input-group-addon"><i class="fa fa-key"></i></span>

              <input type="text"  class="form-control input-lg"  name="editarRnc" id="editarRnc" data-inputmask="'mask':'999-9999999-9'" data-mask required>

          </div>

        </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>


             <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" required>

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

      </form>

      <?php

        $editarProveedor = new ControladorProveedores();
        $editarProveedor -> ctrEditarProveedor();

      ?>


    </div>

  </div>

</div>

      <?php

         $eliminarProveedor = new ControladorProveedores();
         $eliminarProveedor-> ctrEliminarProveedor();

      ?>





