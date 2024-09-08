<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buscar por recetas</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <input type="text" style="width: 20%; margin-bottom: 20px;" class="form-control search-input" id="searchInput" placeholder="Buscar">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <?php if ($_SESSION['rol'] == 1) { ?>
                                <th>Acciones</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "../conexion.php";

                        $query = mysqli_query($conexion, "SELECT r.id_receta, p.nombre AS nombre_producto, r.Descripcion 
                            FROM recetas r
                            LEFT JOIN productos p ON r.nombre = p.id_prod");

                        mysqli_close($conexion);
                        $recetas = mysqli_num_rows($query);

                        if ($recetas > 0) {
                            while ($dato = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td style="color: black;"><?php echo $dato['id_receta']; ?></td>
                                    <td style="color: black;"><?php echo $dato['nombre_producto']; ?></td>
                                    <td style="color: black;"><?php echo $dato['Descripcion']; ?></td>
                                    <?php if ($_SESSION['rol'] == 1) { ?>
                                        <td>
                                            <a href="editar_receta.php?id=<?php echo $dato['id_receta']; ?>" class="btn btn-success"><i class='fas fa-edit'></i> Editar</a>
                                            <form action="eliminar_receta.php?id=<?php echo $dato['id_receta']; ?>" method="post" class="confirmar d-inline">
                                                <button class="btn btn-warning" type="submit"><i class='fas fa-toggle-off'></i> Inhabilitar</button>
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
            td = tr[i].getElementsByTagName("td")[1]; // Cambia el número (1) para buscar en una columna específica
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
