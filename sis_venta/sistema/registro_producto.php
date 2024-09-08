<?php
include "includes/header.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['cantidad']) || empty($_POST['descripcion'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todos los campos son obligatorios
                </div>';
    } else {
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];

        // Realiza la inserción en la base de datos
        $query_insert = mysqli_query($conexion, "INSERT INTO productos (nombre, cantidad, descripcion) VALUES ('$nombre', '$cantidad', '$descripcion')");

        if ($query_insert) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Producto registrado
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar el producto
                    </div>';
        }
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nuevo Producto</h1>
        <a href="almacenaje_p.php" class="btn btn-primary">Regresar</a>
    </div>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form action="" method="post" autocomplete="off">
                <?php echo isset($alert) ? $alert : ''; ?>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" placeholder="Ingrese Nombre" name="nombre" id="nombre">
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control" placeholder="Ingrese Cantidad" name="cantidad" id="cantidad">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" placeholder="Ingrese Descripción" name="descripcion" id="descripcion"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Producto</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>
