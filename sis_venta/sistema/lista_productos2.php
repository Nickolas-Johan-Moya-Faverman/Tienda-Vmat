<?php
include_once "includes/header.php";
include "../conexion.php";

$query = "SELECT ventas.*, cliente.Correo, cliente.Nombre, cliente.Direccion
          FROM ventas
          INNER JOIN cliente ON ventas.id_cliente = cliente.idcliente
          WHERE ventas.Estado = 3"; // Obtener pedidos finalizados
$result = mysqli_query($conexion, $query);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pedidos</h1>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="lista_productos.php" role="tab" aria-controls="listaPedidos" aria-selected="true">Pendiente</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="proceso-tab" data-bs-toggle="tab" href="lista_productos1.php" role="tab" aria-controls="listaProceso" aria-selected="false">En proceso</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="lista_productos2.php" role="tab" aria-controls="pedidosFinalizados" aria-selected="false">Finalizados</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <!-- Pestaña Finalizados -->
        <div class="tab-pane fade show active" id="listaPedidos" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-body">
                    <div class="tablaFinalizados">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblFinalizados">
                                <thead>
                                    <tr>
                                        <th>ID Transaccion</th>
                                        <th>Precio total</th>
                                        <th>Cantidad</th>
                                        <th>Productos</th>
                                        <th>Fecha</th>
                                        <th>Cliente</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['ID_Ventas'] . "</td>";
                                            echo "<td>" . $row['Precio_Total'] . "</td>";
                                            echo "<td>" . $row['cantidad'] . "</td>";

                                            // Consulta para obtener el nombre del producto
                                            $productosID = $row['Productos'];
                                            $queryProductos = "SELECT nombre FROM productos WHERE id_prod = $productosID";
                                            $resultProductos = mysqli_query($conexion, $queryProductos);
                                            $nombreProducto = mysqli_fetch_assoc($resultProductos);
                                            $nombreProducto = $nombreProducto['nombre'];

                                            echo "<td>" . $nombreProducto . "</td>";

                                            echo "<td>" . $row['Fecha'] . "</td>";
                                            
                                            
                                            echo "<td>" . $row['Nombre'] . "</td>";
                                            echo "<td>";
                                            echo "Terminado";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='8'>No se encontraron registros.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
</div>

<?php include_once "includes/footer.php"; ?>
