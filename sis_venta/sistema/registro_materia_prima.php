<?php
include "includes/header.php";

// Consulta para obtener las categorías disponibles
$query_categorias = mysqli_query($conexion, "SELECT id_categoria, nombre FROM categoria");
$categorias = mysqli_fetch_all($query_categorias, MYSQLI_ASSOC);

if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre']) || empty($_POST['medida']) || empty($_POST['cantidad']) || empty($_POST['descripcion'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todos los campos son obligatorios
                </div>';
    } else {
        $nombre = $_POST['nombre'];
        $medida = $_POST['medida'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];

        // Obtén la categoría seleccionada desde el formulario
        $categoria = $_POST['categoria'];

        // Realiza la inserción en la base de datos, incluyendo la categoría
        $query_insert = mysqli_query($conexion, "INSERT INTO materia_prima (nombre, cantidad, descripcion, medida_id, categoria_id) VALUES ('$nombre', '$cantidad', '$descripcion', '$medida', '$categoria')");

        if ($query_insert) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Material registrado
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar el material
                    </div>';
        }
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nuevo Material</h1>
        <a href="almacenaje_m.php" class="btn btn-primary">Regresar</a>
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
            <label for="medida">Medida</label>
            <select class="form-control" name="medida" id="medida">
                <option value="1">Gramos</option>
                <option value="2">Mililitros</option>
                <option value="3">Metros</option>
            </select>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" placeholder="Ingrese Cantidad" name="cantidad" id="cantidad">
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <select class="form-control" name="categoria" id="categoria">
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" placeholder="Ingrese Descripción" name="descripcion" id="descripcion"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Material</button>
    </form>
    </div>
    </div> 
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>
