
  <div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar productos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar productos</li>

    </ol>

  </section>
  
  <section class="content">

    <div class="box">
      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          
        Agregar producto

        </button>

              
      </div>

      <div class="box-body">

      <table class="table table-bordered table-striped dt-responsive tablas">
        

        <thead>
          
        <tr>

            <th style="width:10px">#</th>
            <th>Imagen</th>
            <th>Código</th>
            <th>Descripción</th>
            <th>Categoría</th>
            <th>Stock</th>
            <th>Precio de compra</th>
            <th>Precio de venta</th>
            <th>Itbis %</th>
            <th>Agregado</th>
            <th>Acciones</th>
          
        </tr>

        </thead>

        <tbody>

            <tr>
              
              <td>1</td>
              <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px" ></td>
              <td>00001</td>
              <td>Baby Boomer regular</td>
              <td>Nails</td>
              <td>20</td>
              <td>$5.00</td>
              <td>$10.00</td>
              <td>18</td>
              <td>2020-12-11 12:05:32</td>
              <td>
                
                <div class="btn-group">
                  
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger"><i class="fa fa-times"></i></button>


                </div>

              </td>

            </tr>

           <tr>
              
              <td>1</td>
              <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px" ></td>
              <td>00001</td>
              <td>Baby Boomer regular</td>
              <td>Nails</td>
              <td>20</td>
              <td>$5.00</td>
              <td>$10.00</td>
              <td>18</td>
              <td>2020-12-11 12:05:32</td>
              <td>
                
                <div class="btn-group">
                  
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger"><i class="fa fa-times"></i></button>


                </div>

              </td>

            </tr>

            
                 
        </tbody>

      </table>
     
      </div>
    
    </div>

  </section>

  </div>

<!--=====================================
            MODAL AGREGAR PRODUCTO
======================================-->


<div id="modalAgregarProducto" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

   <form role="form" method="post" enctype="multipart/fomr-data">

<!--=====================================
          CABEZA DEL MODAL
======================================-->

      <div class="modal-header" style="background: #3c8dbc; color: white">  

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar producto</h4>

      </div>

<!--=====================================
           CUERPO DEL MODAL
======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- ENTRADA DE CÓDIGO -->
          
          <div class="form-group">

           <div class="input-group">
            
            <span class="input-group-addon"><i class="fa fa-code"></i></span>

              <input type="text" class="form-control input-lg"  name="nuevoCodigo" placeholder="Ingresar Código" required>

          </div>

        </div>



         <!-- ENTRADA DE DESCRIPCIÓN -->

        <div class="form-group">

          <div class="input-group">
            
            <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

              <input type="text" class="form-control input-lg"  name="nuevaDescripcion" placeholder="Ingresar descripción" required>

         </div>

        </div>

     
          <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

        <div class="form-group">

          <div class="input-group">
            
            <span class="input-group-addon"><i class="fa fa-th"></i></span>

              <select class="form-control input-lg" name="nuevaCategoria">
                
                <option value="">Selecionaar categoría</option>

                <option value="Salon">Salon</option>

                <option value="Nails">Nails</optiSalonon>

                <option value="Tienda">Tienda</option>


              </select>

          </div>

        </div>

         <!-- ENTRADA PARA STOCK -->

        <div class="form-group">

          <div class="input-group">
            
            <span class="input-group-addon"><i class="fa fa-check"></i></span>

              <input type="number" class="form-control input-lg"  name="nuevoStock" min="0" placeholder="Stock" required>

         </div>

        </div>

          <!-- ENTRADA PARA PRECIO COMPRA -->

      <div class="form-group row">

        <div class="col-xs-6">

          <div class="input-group">
            
            <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

              <input type="number" class="form-control input-lg"  name="nuevoPrecioCompra" min="0" placeholder="Precio de compra" required>

       </div>

       </div>


      <!-- ENTRADA PARA PRECIO VENTA -->

          
        <div class="col-xs-6">
          <div class="input-group">
            
            <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

              <input type="number" class="form-control input-lg"  name="nuevoPrecioVenta" min="0" placeholder="Precio de venta" required>

         </div>
               <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

                  <div class="col-xs-6">
                    
                    <div class="form-group">
                      
                      <label>
                        
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar porcentaje
                      </label>

                    </div>

                  </div>

                  <!-- ENTRADA PARA PORCENTAJE -->

                  <div class="col-xs-6" style="padding:0">
                    
                    <div class="input-group">
                      
                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="25" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div>

                </div>

            </div>

                    <!-- ENTRADA PARA ITBIS -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-bar-chart"></i></span> 

                <select class="form-control input-lg" name="nuevoItbis">

                  <option value="0">0%</option>

                  <option value="16">16%</option>

                  <option value="18">18%</option>

                </select>

              </div>

            </div>


           <!-- ENTRADA SUBIR FOTO -->

          <div class="form-group">

          <div class="panel">SUBIR IMAGEN</div>

          <input type="file" class="nuevaImagen" name="nuevaImagen">

          <p class="help-block">Peso máximo de la imagen 2MB</p>

          <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar"  width="100px"></td>

        </div>

      </div>

    </div>

<!--=====================================
           PIE DEL MODAL
======================================-->
    
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary" data-dismiss="modal">Guardar producto</button>

      </div>

      </form>

    </div>

  </div>

</div>

