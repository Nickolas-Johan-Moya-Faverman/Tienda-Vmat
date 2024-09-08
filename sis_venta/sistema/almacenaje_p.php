<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Almacenaje de productos</h1>
        <div class="text-right mb-2">
    <a href="factura/reporteproductos.php" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i>  Generar Reporte</a>
 </div>	   
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Descripción</th>
                            <?php if ($_SESSION['rol'] == 1) { ?>
                                <th>Acciones</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require "../conexion.php";

                        $query = mysqli_query($conexion, "SELECT id_prod, nombre, cantidad, descripcion FROM productos");
                        mysqli_close($conexion);
                        $productos = mysqli_num_rows($query);

                        if ($productos > 0) {
                            while ($dato = mysqli_fetch_array($query)) {
                        ?>
                                <tr>
                                    <td style="color: black;"><?php echo $dato['id_prod']; ?></td>
                                    <td style="color: black;"><?php echo $dato['nombre']; ?></td>
                                    <td style="color: black;"><?php echo $dato['cantidad']; ?></td>
                                    <td style="color: black;"><?php echo $dato['descripcion']; ?></td>
                                    <?php if ($_SESSION['rol'] == 1) { ?>
                                        <td>
                                            <a href="editar_producto.php?id=<?php echo $dato['id_prod']; ?>" class="btn btn-success"><i class='fas fa-edit'></i> Editar</a>
                                            <form action="eliminar_producto.php?id=<?php echo $dato['id_prod']; ?>" method="post" class="confirmar d-inline">
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
