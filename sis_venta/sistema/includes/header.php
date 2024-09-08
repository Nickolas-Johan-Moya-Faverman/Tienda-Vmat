<?php
session_start();
if (empty($_SESSION['active'])) {
	header('location: ../');
}
include "includes/functions.php";
include "../conexion.php";
include "core/autoload.php";

// datos Empresa
$dni = '';
$nombre_empresa = '';
$razonSocial = '';
$emailEmpresa = '';
$telEmpresa = '';
$dirEmpresa = '';
$igv = '';

$query_empresa = mysqli_query($conexion, "SELECT * FROM configuracion");
$row_empresa = mysqli_num_rows($query_empresa);
if ($row_empresa > 0) {
	if ($infoEmpresa = mysqli_fetch_assoc($query_empresa)) {
		$dni = $infoEmpresa['dni'];
		$nombre_empresa = $infoEmpresa['nombre'];
		$razonSocial = $infoEmpresa['razon_social'];
		$telEmpresa = $infoEmpresa['telefono'];
		$emailEmpresa = $infoEmpresa['email'];
		$dirEmpresa = $infoEmpresa['direccion'];
		$igv = $infoEmpresa['igv'];
	}
}

// Consulta para contar el número de filas en la tabla "materia_prima"
$query1 = "SELECT COUNT(*) AS total_filas FROM materia_prima";
$result = $conexion->query($query1);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_filas = $row["total_filas"];
} else {
    $total_filas = 0;
}

// Consulta para contar el número de filas en la tabla "productos"
$query2 = "SELECT COUNT(*) AS total_filas2 FROM productos";
$result2 = $conexion->query($query2);

if ($result2->num_rows > 0) {
    $row2 = $result2->fetch_assoc();
    $total_filas2 = $row2["total_filas2"];
} else {
    $total_filas2 = 0;
}

// Consulta para contar el número de filas en la tabla "ventas"
$query3 = "SELECT COUNT(*) AS total_filas3 FROM ventas";
$result3 = $conexion->query($query3);

if ($result3->num_rows > 0) {
    $row3 = $result3->fetch_assoc();
    $total_filas3 = $row3["total_filas3"];
} else {
    $total_filas3 = 0;
}

// Consulta para contar el número de pedidos
$query4 = "SELECT COUNT(*) AS total_filas4 FROM categorias";
$result4 = $conexion->query($query4);

if ($result4->num_rows > 0) {
    $row4 = $result4->fetch_assoc();
    $total_filas4 = $row4["total_filas4"];
} else {
    $total_filas4 = 0;
}

// Consulta para contar el número de materia prima
$query5 = "SELECT COUNT(*) AS total_filas5 FROM materia_prima";
$result5 = $conexion->query($query5);

if ($result5->num_rows > 0) {
    $row5 = $result5->fetch_assoc();
    $total_filas5 = $row5["total_filas5"];
} else {
    $total_filas5 = 0;
}

// Consulta para contar el número de productos
$query6 = "SELECT COUNT(*) AS total_filas6 FROM productos";
$result6 = $conexion->query($query6);

if ($result6->num_rows > 0) {
    $row6 = $result6->fetch_assoc();
    $total_filas6 = $row6["total_filas6"];
} else {
    $total_filas6 = 0;
}

// Consulta para contar el número de ventas
$query7 = "SELECT SUM(Precio_Total) AS total_filas7 FROM ventas";
$result7 = $conexion->query($query7);

if ($result7->num_rows > 0) {
    $row7 = $result7->fetch_assoc();
    $total_filas7 = $row7["total_filas7"];
} else {
    $total_filas7 = 0;
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sistema de AdminVentaWare</title>
	<link rel="icon" type="image/x-icon" href="sistema\img\fon.jpg">

	<link href="res/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="res/font-awesome/css/font-awesome.min.css">
    <script src="res/js/jquery.min.js"></script>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!--Data tables css-->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!--load swal js -->
    <script src="dist/js/swal.js"></script>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="dist/img/<?php echo $sys->sys_logo; ?>">
    <!-- Data Tables CSS -->
    <link rel="stylesheet" type="text/css" href="plugins/datatable/custom_dt_html5.css">

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="css/adminlte.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
	
	<!-- Custom styles for this template-->
	<link rel="stylesheet" type="text/css" href="css/adminlte.css">
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css?7.0" media="all" >
  	<link rel="stylesheet" type="text/css" href="css/sb-admin-2.min.css?9.0" media="all" >
  	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css?7.0" media="all" >
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="css/index-glass.css">

</head>

<body id="page-top">
	<?php
	include "../conexion.php";
	?>

	<div id="wrapper">

		<?php include_once "includes/menu.php"; ?>
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-primary text-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>
					<div class="input-group">
						<h6><strong>Sistema de AdminVentaWare</strong></h6>
						<p class="ml-auto"><strong>Bolivia, <?php echo fechaPeru(); ?></strong></p>
					</div>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<div class="topbar-divider d-none d-sm-block"></div>

						<!-- Nav Item - User Information -->
						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline small text-white"><strong><?php echo $_SESSION['nombre']; ?></strong></span>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="individual.php">
									<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
									Configuraciones
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="salir.php">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Salir
								</a>
							</div>
						</li>

					</ul>

				</nav>