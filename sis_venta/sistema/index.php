<?php include_once "includes/header.php"; ?>
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<!-- Begin Page Content -->
<div class="container-fluid">
<?php if ($_SESSION['rol'] == 1) { ?>
	<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><strong>Panel de Administración</strong></h1>
  </div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_filas; ?></h3>
                <h5>Materia Prima</h5>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="almacenaje_m.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $total_filas2; ?></h3>
                <h5>Productos</h5>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="almacenaje_p.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $total_filas3; ?></h3>
                <h5>PEI</h5>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="lista_productos.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>NO SE</h3>
                <h5>Reportes</h5>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="???" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

	<!-- Gráficas -->
	<div class="rowd">
		<div class="col-md-12">
			<div class="card">
				<div class="card-headere">
					<h5 class="card-titles"><strong>Estadísticas y Gráficos</strong></h5>
					<div class="card-toolsi">
						<button type="button" class="btni btni-tooli" data-card-widget="collapse" id="collapseButton">
							<i class="fas fa-minus"></i>
						</button>
						<button type="button" class="btni btni-tooli" data-card-widget="remove">
							<i class="fas fa-times"></i>
						</button>
					</div>
				</div>
				<!-- /.card-header -->
				<div class="card-bodys">
					<div class="rowd">
						<div class="col-md-6">
							<div class="chart">
								<!-- Transaction Donought chart Canvas -->
								<div id="PieChart" class="col-md-6" style="height: 400px; max-width: 500px; margin: 0px auto;"></div>
							</div>
							<!-- /.chart-responsive -->
						</div>
						<hr>
						<div class="col-md-6">
							<div class="chart">
								<div id="AccountsPerAccountCategories" class="col-md-6" style="height: 400px; max-width: 500px; margin: 0px auto;"></div>
							</div>
							<!-- /.chart-responsive -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- ./card-body -->
				<div class="card-footere">
					<div class="rowd">
						<div class="col-sm-3 col-6">
							<div class="description-block border-right">
								<h5 class="description-header"># <?php echo $total_filas6; ?></h5>
								<span class="description-text">TOTAL PRODUCTOS</span>
							</div>
							<!-- /.description-block -->
						</div><!-- Log on to codeastro.com for more projects! -->
						<!-- /.col -->
						<div class="col-sm-3 col-6">
							<div class="description-block border-right">
								<h5 class="description-header"># <?php echo $total_filas5; ?></h5>
								<span class="description-text">TOTAL MATERIA PRIMA</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-3 col-6">
							<div class="description-block border-right">
								<h5 class="description-header"># <?php echo $total_filas4; ?> </h5>
								<span class="description-text">TOTAL CATEGORÍAS</span>
							</div>
							<!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-3 col-6">
							<div class="description-block">
								<h5 class="description-header">$ <?php echo $total_filas7; ?> </h5>
								<span class="description-text">TOTAL DE VENTAS</span>
							</div>
							<!-- /.description-block -->
						</div>
					</div>
					<!-- /.row -->
				</div>
				<!-- /.card-footer -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /Gráficas -->
	
	<h3 style="height: 10px;"></h3>

	<!-- Segunda Sección -->
	<!-- Main row -->
	<div class="rowd"><!-- Log on to codingabel.comfor more projects! -->

	<!-- Últimos Pedidos -->
	<div class="col-md-12">
		<!-- TABLE: Transactions -->
		<div class="card">
			<div class="card-headere">
				<h3 class="card-titles"><strong>Últimos Pedidos</strong></h3>
				<div class="card-toolsi">
					<button type="button" class="btni btni-tooli" data-card-widget="collapse" id="collapseButtonu">
						<i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btni btni-tooli" data-card-widget="remove">
						<i class="fas fa-times"></i>
					</button>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-bodys p-0">
				<div class="table-responsive">
					<table class="table table-hover table-bordered table-striped m-0">
						<thead>
							<tr>
								<th>ID_CLIENTE</th>
								<th>PRODUCTO</th>
								<th>CANTIDAD</th>
								<th>PRECIO TOTAL</th>
								<th>FECHA</th>
								<th>ESTADO</th>
							</tr>
						</thead>
						<tbody><!-- Log on to codingabel.com for more projects! -->
						<?php
						//Get latest transactions 
						$ret = "SELECT * FROM `ventas` ORDER BY `ventas`.`ID_Ventas` DESC ";
						$stmt = $conexion->prepare($ret);
						$stmt->execute(); //ok
						$res = $stmt->get_result();
						$cnt = 1;
						while ($row = $res->fetch_object()) {
							$transTstamp = $row->Fecha;
							if ($row->Estado == 1) {
								$alertClass = "<span class='badge badge-success'>$row->Estado</span>";
							} elseif ($row->Estado == 2) {
								$alertClass = "<span class='badge badge-danger'>$row->Estado</span>";
							} else {
								$alertClass = "<span class='badge badge-warning'>$row->Estado</span>";
							}
							?>
							<tr>
								<td><?php echo $row->id_cliente; ?></a></td>
								<td><?php echo $row->Productos; ?></td>
								<td><?php echo $row->cantidad; ?></td>
								<td>$ <?php echo $row->Precio_Total; ?></td>
								<td><?php echo date("d-M-Y h:m:s ", strtotime($transTstamp)); ?></td>
								<td><?php echo $alertClass; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.card-body -->
			<div class="card-footere clearfix">
				<a href="lista_productos.php" class="btn btn-sm btn-info float-left">Ver Más</a>
			</div>
			<!-- /.card-footer -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /Últimos Pedidos -->

</div>

<h3 style="height: 10px;"></h3>

<!-- GANTT -->
<div class="rowd">
	<div class="col-md-12">
		<div class="card">
			<div class="card-headere">
				<h5 class="card-titles"><strong>Tiempo de Producción</strong></h5>
				<div class="card-toolsi">
					<button type="button" class="btni btni-tooli" data-card-widget="collapse" id="collapseButtone">
						<i class="fas fa-minus"></i>
					</button>
					<button type="button" class="btni btni-tooli" data-card-widget="remove">
						<i class="fas fa-times"></i>
					</button>
				</div>
			</div>
			
			<div class="card-bodys">
				<div class="fondo-imagen">
				<?php
				$lb = new Lb();
				$lb->start();
				?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- GANTT -->


	<script>
	$(document).ready(function ()
	{
		$('#collapseButton').click(function () 
		{
			// Encuentra el cuerpo de la tarjeta y lo alterna
			$(this).closest('.card').find('.card-bodys, .card-footere').toggle();
		});
	});
	</script>

<script>
    $(document).ready(function () {
        // Manejador de eventos para el botón de colapsar
        $('#collapseButtonu').on('click', function () {
            // Selecciona el cuerpo de la tabla, el footere y el encabezado
            var tbody = $('.card-bodys tbody');
            var footere = $('.card-footere');
            var thead = $('.card-bodys thead');

            // Toggle (alternar) la visibilidad del cuerpo de la tabla, el footere y el encabezado
            tbody.toggle();
            footere.toggle();
            thead.toggle();
        });
    });
</script>

<script>
    $(document).ready(function () {
    // Manejador de eventos para el botón de colapsar
    $('#collapseButtone').on('click', function () {
        // Encuentra el cuerpo de la tarjeta más cercano al botón y lo alterna
        $(this).closest('.card').find('.card-bodys').toggle();
    });
});
</script>
  
  <?php } ?>
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
	
    <h1 class="h3 mb-0 text-gray-800" style="margin-top: 10px;"><strong>Configuración</strong></h1>
  </div>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-header bg-primary text-white">
					Información Personal
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Nombre: <strong><?php echo $_SESSION['nombre']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Correo: <strong><?php echo $_SESSION['email']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Rol: <strong><?php echo $_SESSION['rol_name']; ?></strong></label>
					</div>
					<div class="form-group">
						<label>Usuario: <strong><?php echo $_SESSION['user']; ?></strong></label>
					</div>
				
				</div>
			</div>
		</div>
		<?php if ($_SESSION['rol'] == 1) { ?>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header bg-primary text-white">
						Datos de la Empresa
					</div>
					<div class="card-body">
						<form action="empresa.php" method="post" id="frmEmpresa" class="p-3">
							<div class="form-group">
								<label>Ruc:</label>
								<input type="number" name="txtDni" value="<?php echo $dni; ?>" id="txtDni" placeholder="Dni de la Empresa" required class="form-control">
							</div>
							<div class="form-group">
								<label>Nombre:</label>
								<input type="text" name="txtNombre" class="form-control" value="Nacek industries" id="txtNombre" placeholder="Nombre de la Empresa" required class="form-control">
							</div>
							<div class="form-group">
								<label>Razon Social:</label>
								<input type="text" name="txtRSocial" class="form-control" value="<?php echo $razonSocial; ?>" id="txtRSocial" placeholder="Razon Social de la Empresa">
							</div>
							<div class="form-group">
								<label>Teléfono:</label>
								<input type="number" name="txtTelEmpresa" class="form-control" value="<?php echo $telEmpresa; ?>" id="txtTelEmpresa" placeholder="teléfono de la Empresa" required>
							</div>
							<div class="form-group">
								<label>Correo Electrónico:</label>
								<input type="email" name="txtEmailEmpresa" class="form-control" value="Nacekindustries@gmail.com" id="txtEmailEmpresa" placeholder="Correo de la Empresa" required>
							</div>
							<div class="form-group">
								<label>Dirección:</label>
								<input type="text" name="txtDirEmpresa" class="form-control" value="Macrodistrito max paredes" id="txtDirEmpresa" placeholder="Dirreción de la Empresa" required>
							</div>
							<div class="form-group">
								<label>IGV (%):</label>
								<input type="text" name="txtIgv" class="form-control" value="<?php echo $igv; ?>" id="txtIgv" placeholder="IGV de la Empresa" required>
							</div>
							<?php echo isset($alert) ? $alert : ''; ?>
							<!-- <div>
								<button type="submit" class="btn btn-primary btnChangePass"><i class="fas fa-save"></i> Guardar Datos</button>
							</div> -->

						</form>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header bg-primary text-white">
						Datos de la Empresa
					</div>
					<div class="card-body">
						<div class="p-3">
							<div class="form-group">
								<strong>Ruc:</strong>
								<h6><?php echo $dni; ?></h6>
							</div>
							<div class="form-group">
								<strong>Nombre:</strong>
								<h6>Nacek Industries</h6>
							</div>
							<div class="form-group">
								<strong>Razon Social:</strong>
								<h6>Desarrollo de software</h6>
							</div>
							<div class="form-group">
								<strong>Teléfono:</strong>
								<?php echo $telEmpresa; ?>
							</div>
							<div class="form-group">
								<strong>Correo Electrónico:</strong>
								<h6>Nacekindustries@gmail.com</h6>
							</div>
							<div class="form-group">
								<strong>Dirección:</strong>
								<h6>Macrodistrito Maxparedes</h6>
							</div>
							<div class="form-group">
								<strong>IGV (%):</strong>
								<h6>10</h6>
							</div>

						</div>
					</div>
				</div>
			</div>

		<?php } ?>
	</div>
</div>

<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>

<!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="dist/js/demo.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- PAGE SCRIPTS -->
  <script src="dist/js/pages/dashboard2.js"></script>

  <!--Load Canvas JS -->
  <script src="./plugins/canvasjs.min.js"></script>
  <!--Load Few Charts-->
  <script src="js/jquery.min.js"></script>
	<script src="js/jquery.fn.gantt.js"></script>	
	
  <script>
    window.onload = function() {

      var Piechart = new CanvasJS.Chart("PieChart", {
        exportEnabled: false,
        animationEnabled: true,
        title: {
          text: "Productos "
        },
        legend: {
          cursor: "pointer",
          itemclick: explodePie
        },
        data: [{
          type: "pie",
          showInLegend: true,
          toolTipContent: "{name}: <strong>{y}%</strong>",
          indexLabel: "{name} - {y} uds.",
          dataPoints: [
			<?php
			// Consulta SQL para obtener los nombres de los productos y la suma de la cantidad
			$queryProductos = "SELECT nombre, SUM(cantidad) AS total_cantidad FROM productos GROUP BY nombre";
			$resultProductos = $conexion->query($queryProductos);
			
			// Iterar sobre los resultados de la consulta
			while ($rowProducto = $resultProductos->fetch_assoc()) {
				$nombreProducto = $rowProducto['nombre'];
				$totalCantidad = $rowProducto['total_cantidad'];
				echo "{ y: $totalCantidad, name: \"$nombreProducto\", exploded: true },";
			}
			?>
			]
		}]
	});

      var AccChart = new CanvasJS.Chart("AccountsPerAccountCategories", {
        exportEnabled: false,
        animationEnabled: true,
        title: {
          text: "Categorías"
        },
        legend: {
          cursor: "pointer",
          itemclick: explodePie
        },
        data: [{
          type: "pie",
          showInLegend: true,
          toolTipContent: "{name}: <strong>{y}%</strong>",
          indexLabel: "{name} - {y} uds.",
          dataPoints: [
			<?php

// Consulta SQL para obtener las categorías y la suma de la cantidad de la tabla "productos1"
$queryCategorias = "SELECT categoria, COALESCE(SUM(p.cantidad), 0) AS total_cantidad
                   FROM categorias c
                   LEFT JOIN productos1 p ON c.id = p.id_categoria
                   GROUP BY c.categoria";
$resultCategorias = $conexion->query($queryCategorias);

// Iterar sobre los resultados de la consulta
while ($rowCategoria = $resultCategorias->fetch_assoc()) {
    $nombreCategoria = $rowCategoria['categoria'];
    $totalCantidad = $rowCategoria['total_cantidad'];
    echo "{ y: $totalCantidad, name: \"$nombreCategoria\", exploded: true },";
}
?>
          ]
        }]
      });
      Piechart.render();
      AccChart.render();
    }

    function explodePie(e) {
      if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
      } else {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
      }
      e.chart.render();

    }
  </script>
  