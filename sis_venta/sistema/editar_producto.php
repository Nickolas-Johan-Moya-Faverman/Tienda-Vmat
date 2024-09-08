<?php
include "includes/header.php";

if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['cantidad']) || empty($_POST['descripcion'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todos los campos son obligatorios
                </div>';
    } else {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];

        // Realiza la actualización en la base de datos
        $query_update = mysqli_query($conexion, "UPDATE productos SET nombre = '$nombre', cantidad = '$cantidad', descripcion = '$descripcion' WHERE id_prod = $id");

        if ($query_update) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Producto actualizado
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                        Error al actualizar el producto
                    </div>';
        }
    }
}

if (empty($_REQUEST['id'])) {
    header("Location: almacenaje_p.php");
}
$id = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM productos WHERE id_prod = $id");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
    header("Location: almacenaje_p.php");
} else {
    if ($data = mysqli_fetch_array($sql)) {
        $nombre = $data['nombre'];
        $cantidad = $data['cantidad'];
        $descripcion = $data['descripcion'];
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Producto</h1>
        <a href="almacenaje_p.php" class="btn btn-primary">Regresar</a>
    </div>
    <form action="" method="post" autocomplete="off">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" placeholder="Ingrese Nombre" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" placeholder="Ingrese Cantidad" name="cantidad" id="cantidad" value="<?php echo $cantidad; ?>">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" placeholder="Ingrese Descripción" name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>
