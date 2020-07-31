<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

			<?php  

			if($_SESSION["perfil"] == "Administrador"){ 

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>';

			}

			?>

			<li>

				<a href="turnos">

					<i class="fa fa-user-plus"></i>
					<span>Turnos</span>

				</a>

			</li>

				<?php  

				if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){ 


				echo'<li>

				<a href="categorias">

					<i class="fa fa-th"></i>
					<span>Categorías</span>

				</a>

			</li>

				<li>

				<a href="productos">

					<i class="fa fa-product-hunt"></i>
					<span>Productos</span>

				</a>

			</li>';

				}

			?>

				<li>

				<a href="clientes">

					<i class="fa fa-users"></i>
					<span>Clientes</span>

				</a>

			</li>

				<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>
					<span>Ventas</span>

					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>
							<a href="ventas">
								<i class="fa fa-circle-o"></i>
								<span>Administrar ventas</span>

							</a>
					</li>

					<li>
							<a href="crear-venta">
								<i class="fa fa-circle-o"></i>
								<span>Crear venta</span>

							</a>
					</li>

					<?php  

				   if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){ 


					echo'<li>
							<a href="reportes">
								<i class="fa fa-circle-o"></i>
								<span>Reporte ventas</span>

							</a>
					</li>



				</ul>

				<li>

				<a href="proveedores">

					<i class="fa fa-building-o"></i>
					<span>Proveedor</span>

				</a>

				<li class="treeview">

				<a href="#">

					<i class="fa fa-industry"></i>
					<span>Compras</span>

					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>
							<a href="compras">
								<i class="fa fa-circle-o"></i>
								<span>Administrar compras</span>

							</a>
					</li>

					<li>
							<a href="crear-compra">
								<i class="fa fa-circle-o"></i>
								<span>Crear compras</span>

							</a>
					</li>

					<li>
							<a href="reportes-compras">
								<i class="fa fa-circle-o"></i>
								<span>Reporte compras</span>

							</a>
					</li>


				</ul>';

					}

					?>

		<?php 
					if($_SESSION["perfil"] == "Administrador"){


			echo'<li>

				<a href="comprobantes">

					<i class="fa fa-users"></i>
					<span>Comprobantes</span>

				</a>

			</li>';

		      }



			  echo'</li>

 
 			</li>

		</li>';

		?>

	</ul>

</section>

</aside>