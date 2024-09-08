<?php
include "includes/header.php";

if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['medida']) || empty($_POST['cantidad']) || empty($_POST['descripcion'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todos los campos son obligatorios
                </div>';
    } else {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $medida = $_POST['medida'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];

        // Realiza la actualización en la base de datos
        $query_update = mysqli_query($conexion, "UPDATE materia_prima SET nombre = '$nombre', medida_id = '$medida', cantidad = '$cantidad', descripcion = '$descripcion' WHERE id_materia = $id");

        if ($query_update) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Material actualizado
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                        Error al actualizar el material
                    </div>';
        }
    }
}

if (empty($_REQUEST['id'])) {
    header("Location: lista_materia_prima.php");
}
$id = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM materia_prima WHERE id_materia = $id");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
    header("Location: lista_materia_prima.php");
} else {
    if ($data = mysqli_fetch_array($sql)) {
        $nombre = $data['nombre'];
        $medida = $data['medida_id']; // Cambié la columna de "medida" a "medida_id"
        $cantidad = $data['cantidad'];
        $descripcion = $data['descripcion'];
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Material</h1>
        <a href="almacenaje_m.php" class="btn btn-primary">Regresar</a>
    </div>
    <form action="" method="post" autocomplete="off">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" placeholder="Ingrese Nombre" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
        </div>
        <div class="form-group">
            <label for="medida">Medida</label>
            <select class="form-control" name="medida" id="medida">
                <option value="1" <?php echo ($medida == 1) ? "selected" : ""; ?>>gramos</option>
                <option value="2" <?php echo ($medida == 2) ? "selected" : ""; ?>>mililitros</option>
                <option value="3" <?php echo ($medida == 3) ? "selected" : ""; ?>>metros</option>
            </select>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" placeholder="Ingrese Cantidad" name="cantidad" id="cantidad" value="<?php echo $cantidad; ?>">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" placeholder="Ingrese Descripción" name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Material</button>
    </form>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>
