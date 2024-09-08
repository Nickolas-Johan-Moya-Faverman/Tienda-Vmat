<?php
include "includes/header.php";
include "../conexion.php";

$alert = "";

if (!empty($_POST)) {
    $id_receta = $_GET['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $sql_update = mysqli_query($conexion, "UPDATE recetas SET nombre = '$nombre', descripcion = '$descripcion' WHERE id_receta = $id_receta");

    if ($sql_update) {
        $alert = '<p class="success">Receta Actualizada</p>';
    } else {
        $alert = '<p class="error">Error al actualizar la receta</p>';
    }
}

if (empty($_GET['id'])) {
    header("Location: lista_recetas.php");
}

$id_receta = $_GET['id'];
$sql = mysqli_query($conexion, "SELECT * FROM recetas WHERE id_receta = $id_receta");
$result_sql = mysqli_num_rows($sql);

if ($result_sql == 0) {
    header("Location: lista_recetas.php");
} else {
    if ($data = mysqli_fetch_array($sql)) {
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Receta</h1>
        <a href="recetas.php" class="btn btn-primary">Regresar</a>
    </div>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form class="" action="" method="post">
                <?php echo isset($alert) ? $alert : ''; ?>
                <input type="hidden" name="id" value="<?php echo $id_receta; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" placeholder="Ingrese nombre" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" placeholder="Ingrese descripción" name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Editar Receta</button>
            </form>
        </div>
    </div>
</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>
