<?php
include "includes/header.php";

if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['materia_prima']) || empty($_POST['cantidad'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todos los campos son obligatorios
                </div>';
    } else {
        $materia_prima_id = $_POST['materia_prima'];
        $cantidad = $_POST['cantidad'];

        // Realiza la actualización en la base de datos para agregar la cantidad
        $query_update = mysqli_query($conexion, "UPDATE materia_prima SET cantidad = cantidad + $cantidad WHERE id_materia = $materia_prima_id");

        if ($query_update) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Cantidad agregada a la materia prima
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                        Error al agregar cantidad a la materia prima
                    </div>';
        }
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agregar Cantidad a Materia Prima</h1>
        <a href="almacenaje_m.php" class="btn btn-primary">Regresar</a>
    </div>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form action="" method="post" autocomplete="off">
                <?php echo isset($alert) ? $alert : ''; ?>
                <div class="form-group">
                    <label for="materia_prima">Materia Prima</label>
                    <select class="form-control" name="materia_prima" id="materia_prima">
                        <?php
                        require "../conexion.php";

                        $query = mysqli_query($conexion, "SELECT id_materia, nombre FROM materia_prima");
                        mysqli_close($conexion);

                        while ($materia_prima = mysqli_fetch_array($query)) {
                            echo "<option value='" . $materia_prima['id_materia'] . "'>" . $materia_prima['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad a Agregar</label>
                    <input type="number" step="0.01" class="form-control" placeholder="Ingrese Cantidad" name="cantidad" id="cantidad">
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
