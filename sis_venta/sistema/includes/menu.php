<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
		<div class="sidebar-brand-icon rotate-n-15">
			<img src="img/fon.jpg" class="img-thumbnail">
		</div>
		<div class="sidebar-brand-text mx-3">Industria Plastic Z</div>
	</a>
	<hr class="sidebar-divider my-0">
	<hr class="sidebar-divider">
	<div class="sidebar-heading">
		Menu del sistema
	</div>
	<?php if ($_SESSION['rol'] == 1 ) {?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="index.php" >
			<i class="fas fa-fw fa-cog"></i>
			<span><strong>Dashboard</strong></span>
		</a>
	</li>
	<?php } ?>
	<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) {?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProveedor" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-hospital"></i>
			<span><strong>Pedidos</strong></span>
		</a>
		<div id="collapseProveedor" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="buscar_productos.php"><strong>Buscar Pedidos</strong></a>
				<a class="collapse-item" href="lista_productos.php"><strong>Listar Pedidos</strong></a>
			</div>
		</div>
	</li>
	<?php }?>
	<?php if ($_SESSION['rol'] == 1) {?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwe" aria-expanded="true" aria-controls="collapseTwe">
			<i class="fas fa-fw fa-address-book"></i>
			<span><strong>Clientes</strong></span>
		</a>
		<div id="collapseTwe" class="collapse" aria-labelledby="headingTwe" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="buscar_cliente.php"><strong>Buscar Cliente</strong></a>
				<a class="collapse-item" href="lista_cliente.php"><strong>Listar Cliente</strong></a>
			</div>
		</div>
	</li>
	<?php }?>
	<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 4) {?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span><strong>Productos</strong></span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_producto.php"><strong>Nuevo Producto</strong></a> 
				<a class="collapse-item" href="buscar_producto.php"><strong>Buscar Producto</strong></a>
				<a class="collapse-item" href="almacenaje_p.php"><strong>Listar Producto</strong></a>
				<a class="collapse-item" href="agregar_producto.php"><strong>Agregar Producto</strong></a>
			</div>
		</div>
	</li>
	<?php }?>
	<?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 4) {?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			<i class="fas fa-fw fa-cog"></i>
			<span><strong>Materia Prima</strong></span>
		</a>
		<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="registro_materia_prima.php"><strong>Nueva Materia Prima</strong></a> 
				<a class="collapse-item" href="buscar_materia.php"><strong>Buscar Materia prima</strong></a>
				<a class="collapse-item" href="almacenaje_m.php"><strong>Listar Materia prima</strong></a>
				<a class="collapse-item" href="agregar_materia.php"><strong>Agregar Materia Prima</strong></a>
				<a class="collapse-item" href="categorias_materia.php"><strong>Categoria</strong></a>
			</div>
		</div>
	</li>
	<?php }?>
	<?php if ($_SESSION['rol'] == 1  ) {?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-wrench"></i>
			<span><strong>Recetas</strong></span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="nueva_receta.php"><strong>Nueva Recetas</strong></a>
				<a class="collapse-item" href="buscar_recetas.php"><strong>Buscar Recetas</strong></a>
				<a class="collapse-item" href="recetas.php"><strong>Listar Recetas</strong></a>
			</div>
		</div>
	</li>
	<?php } ?>
	<?php if ($_SESSION['rol'] == 1) {?>
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-user"></i>
				<span><strong>Usuarios</strong></span>
			</a>
			<div id="collapseUsuarios" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item" href="registro_usuario.php"><strong>Nuevo Usuario</strong></a>
					<a class="collapse-item" href="lista_usuarios.php"><strong>Listado Usuarios</strong></a>
					<a class="collapse-item" href="buscar_usuario.php"><strong>Buscar Usuarios</strong></a>
				</div>
			</div>
		</li>
	<?php }?>
</ul>