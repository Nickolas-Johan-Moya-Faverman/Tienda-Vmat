<?php
include "includes/header.php";
include "../conexion.php";

if (!empty($_POST)) {
    $alert = "";
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Realiza la inserción en la base de datos (asumiendo que tienes una conexión a la base de datos)
    $query_insert = mysqli_query($conexion, "INSERT INTO recetas (nombre, descripcion) VALUES ('$nombre', '$descripcion')");

    if ($query_insert) {
        $receta_id = mysqli_insert_id($conexion);
        $alert = '<div class="alert alert-primary" role="alert">
                    Receta registrada
                </div>';

        // Ahora procesaremos los componentes y cantidades
        for ($i = 1; $i <= 8; $i++) {
            $componente_id = $_POST['componente' . $i . '_id'] ?? null;
            $cantidad = $_POST['cantidad' . $i] ?? null;

            if (!empty($componente_id) && !empty($cantidad)) {
                // Insertar componente y cantidad en la tabla recetas (ajusta la consulta según tu esquema de base de datos)
                $query_insert_componente = mysqli_query($conexion, "UPDATE recetas SET componente{$i}_id = '$componente_id', cantidad{$i} = '$cantidad' WHERE id_receta = $receta_id");
            }
        }
    } else {
        $alert = '<div class="alert alert-danger" role="alert">
                    Error al registrar la receta
                </div>';
    }

    mysqli_close($conexion);
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Nueva Receta</h1>
        <a href="recetas.php" class="btn btn-primary">Regresar</a>
    </div>
    <div class="row">
        <div class="col-lg-6 m-auto">
    <form action="" method="post" autocomplete="off">
        <?php echo isset($alert) ? $alert : ''; ?>
        <div class="form-group">
    <label for="nombre">Producto</label>
    <select class="form-control" name="nombre" id="nombre">
        <option value="">Seleccione un producto</option>
        <?php
        // Conexión a la base de datos para obtener los productos que no están en recetas
        $query_productos = mysqli_query($conexion, "SELECT id_prod, nombre FROM productos WHERE id_prod NOT IN (SELECT DISTINCT nombre FROM recetas)");
        while ($producto = mysqli_fetch_assoc($query_productos)) {
            echo '<option value="' . $producto['id_prod'] . '">' . $producto['nombre'] . '</option>';
        }
        ?>
    </select>
</div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" placeholder="Ingrese Descripción" name="descripcion" id="descripcion"></textarea>
        </div>

        <div class="form-group">
            <label for="numero_componentes">Número de Componentes</label>
            <select class="form-control" name="numero_componentes" id="numero_componentes">
                <option value="0">Seleccione el número de componentes</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
        </div>

        <div id="componentes-container">
            <!-- Aquí se generarán dinámicamente los campos de componentes y cantidades -->
        </div>

        <button type="submit" class="btn btn-primary">Guardar Receta</button>
    </form>
    </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Script para generar campos de componentes y cantidades dinámicamente
    $(document).ready(function () {
        $("#numero_componentes").change(function () {
            const numComponentes = parseInt($(this).val());
            const container = $("#componentes-container");
            container.html(""); // Limpiar el contenedor

            for (let i = 1; i <= numComponentes; i++) {
                container.append('<label for="componente' + i + '_id">Componente ' + i + '</label>');
                const componenteSelect = $('<select class="form-control" name="componente' + i + '_id"><option value="">Seleccione un componente</option></select>');

                // Conexión a la base de datos para obtener los componentes (tabla "materia_prima")
                $.ajax({
                    url: '../conexion.php', // Reemplaza con la URL correcta de tu archivo PHP
                    method: 'GET',
                    dataType: 'json',
                    data: { obtener_componentes: true }, // Indica al servidor que quieres obtener componentes

                    success: function (response) {
                        // Llena el select con los componentes
                        if (response && response.length > 0) {
                            response.forEach(function (componente) {
                                componenteSelect.append('<option value="' + componente.id_materia + '">' + componente.nombre + '</option>');
                            });
                        }
                    }
                });

                container.append(componenteSelect);

                container.append('<label for="cantidad' + i + '">Cantidad ' + i + '</label>');
                container.append('<input type="number" class="form-control" placeholder="Ingrese Cantidad" name="cantidad' + i + '">');
            }
        });
    });
</script>
