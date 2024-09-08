<?php
include "includes/header.php";

if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['producto']) || empty($_POST['cantidad'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todos los campos son obligatorios
                </div>';
    } else {
        $producto_id = $_POST['producto'];
        $cantidad = $_POST['cantidad'];

        // Realiza la actualización en la base de datos para agregar la cantidad
        $query_update = mysqli_query($conexion, "UPDATE productos SET cantidad = cantidad + $cantidad WHERE id_prod = $producto_id");

        if ($query_update) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Cantidad agregada al producto
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                        Error al agregar cantidad al producto
                    </div>';
        }
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agregar Cantidad a un Producto</h1>
        <a href="almacenaje_p.php" class="btn btn-primary">Regresar</a>
    </div>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form action="" method="post" autocomplete="off">
                <?php echo isset($alert) ? $alert : ''; ?>
                <div class="form-group">
                    <label for="producto">Producto</label>
                    <select class="form-control" name="producto" id="producto">
                        <?php
                        require "../conexion.php";

                        $query = mysqli_query($conexion, "SELECT id_prod, nombre FROM productos");
                        mysqli_close($conexion);

                        while ($producto = mysqli_fetch_array($query)) {
                            echo "<option value='" . $producto['id_prod'] . "'>" . $producto['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad a Agregar</label>
                    <input type="number" class="form-control" placeholder="Ingrese Cantidad" name="cantidad" id="cantidad">
                </div>
                <button type="submit" class="btn btn-primary">Agregar Cantidad</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>
