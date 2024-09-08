<?php
include_once "includes/header.php";
include "../conexion.php";

$query = "SELECT ventas.*, cliente.Correo, cliente.Nombre, cliente.Direccion 
          FROM ventas
          INNER JOIN cliente ON ventas.id_cliente = cliente.idcliente
          WHERE ventas.Estado = 3"; // Obtener pedidos pendientes
$result = mysqli_query($conexion, $query);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buscar pedidos</h1>
        <div class="text-right mb-2">
            <a href="factura/reportepedidos.php" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i>  Generar Reporte</a>
        </div>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="buscar_productos.php" role="tab" aria-controls="listaPedidos" aria-selected="true">Pendiente</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="buscar_productos1.php" role="tab" aria-controls="listaProceso" aria-selected="false">En proceso</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="buscar_productos2.php" role="tab" aria-controls="pedidosFinalizados" aria-selected="false">Finalizados</a>
    </li>
</ul>
    </ul>

    <div class="tab-content" id="myTabContent">
        <!-- Pestaña Pendiente -->
        <div class="tab-pane fade show active" id="listaPedidos" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-body">
                    <div class="tablaPendiente">
                        <input type="text" style="width: 20%; margin-bottom: 20px;" class="form-control search-input" id="searchInput" placeholder="Buscar">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblPendiente">
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
                                            // Modifica el botón "En proceso" para incluir un formulario
                                            echo "<form action='procesar_pedido.php' method='post'>";
                                            echo "<input type='hidden' name='id_venta' value='" . $row['ID_Ventas'] . "'>";
                                            echo "<button type='submit' class='btn btn-primary' name='procesar_pedido'><i class='fas fa-play'></i> Comenzar</button>";
                                            echo "</form>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7'>No se encontraron registros.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Otras pestañas aquí -->
    </div>
</div>
<!-- End of Main Content -->
</div>

<?php include_once "includes/footer.php"; ?>

<script>
    // Función para realizar la búsqueda en tiempo real
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("tblPendiente"); // Cambia el ID de la tabla según la pestaña actual
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            // Cambia el índice (ej. [2]) para buscar en una columna específica
            td = tr[i].getElementsByTagName("td")[3];
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
