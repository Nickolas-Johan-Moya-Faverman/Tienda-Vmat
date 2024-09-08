<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Buscar clientes</h1>
		<!-- <a href="registro_cliente.php" class="btn btn-primary">Nuevo</a> -->
	</div>
	<div class="text-right mb-2">
		<a href="factura/reporteclientes.php" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i> Generar Reporte</a>
	</div>
	<div class="row">
		<div class="col-lg-12">

			<div class="table-responsive">
				<input type="text" style="width: 20%; margin-bottom: 20px;" class="form-control search-input" id="searchInput" placeholder="Buscar">
				<table class="table table-striped table-bordered" id="table">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>CI</th>
							<th>NOMBRE</th>
							<th>TELEFONO</th>
							<th>DIRECCIÓN</th>
							<th>CORREO</th>
							<?php if ($_SESSION['rol'] == 1) { ?>
								<th>ACCIONES</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						include "../conexion.php";

						$query = mysqli_query($conexion, "SELECT * FROM cliente");
						$result = mysqli_num_rows($query);
						if ($result > 0) {
							while ($data = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td style="color: black;"><?php echo $data['idcliente']; ?></td>
									<td style="color: black;"><?php echo $data['ci']; ?></td>
									<td style="color: black;"><?php echo $data['nombre']; ?></td>
									<td style="color: black;"><?php echo $data['telefono']; ?></td>
									<td style="color: black;"><?php echo $data['direccion']; ?></td>
									<td style="color: black;"><?php echo $data['correo']; ?></td>
									<?php if ($_SESSION['rol'] == 1) { ?>
										<td>
											<a href="editar_cliente.php?id=<?php echo $data['idcliente']; ?>" class="btn btn-success"><i class='fas fa-edit'></i></a>
											<form action="eliminar_cliente.php?id=<?php echo $data['idcliente']; ?>" method="post" class="confirmar d-inline">
												<button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i></button>
											</form>
										</td>
									<?php } ?>
								</tr>
						<?php }
						} ?>
					</tbody>

				</table>
			</div>

		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include_once "includes/footer.php"; ?>

<script>
	// Función para realizar la búsqueda en tiempo real
	function searchTable() {
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("searchInput");
		filter = input.value.toUpperCase();
		table = document.getElementById("table");
		tr = table.getElementsByTagName("tr");

		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[2]; // Cambia el número (2) para buscar en una columna específica
			if (td) {
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}

	// Agrega un listener para llamar a la función de búsqueda cuando se escriba en el campo de búsqueda
	document.getElementById("searchInput").addEventListener("input", searchTable);
</script>
