<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Almacenaje de materia prima</h1>
    </div>

    <!-- Formulario de selección de categoría -->
    <form method="get" action="">
        <div class="form-group">
            <label for="categoria">Filtrar por Categoría:</label>
            <select class="form-control" style="width: 20%;" id="categoria" name="categoria">
                <option value="">Todas las Categorías</option>
                <?php
                require "../conexion.php";
                $query_categorias = mysqli_query($conexion, "SELECT id_categoria, nombre FROM categoria");
                while ($categoria = mysqli_fetch_array($query_categorias)) {
                    echo '<option value="' . $categoria['id_categoria'] . '">' . $categoria['nombre'] . '</option>';
                }
                mysqli_close($conexion);
                ?>
            </select>
        </div>
    </form>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Medida</th>
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
                        $where = "";

                        if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
                            $categoria_id = $_GET['categoria'];
                            $where = "WHERE m.categoria_id = $categoria_id";
                            echo '<script>document.getElementById("categoria").value = "' . $categoria_id . '";</script>';
                        }

                        $query = mysqli_query($conexion, "SELECT m.id_materia, m.nombre, me.medida, m.cantidad, m.descripcion
                            FROM materia_prima m
                            INNER JOIN medida me ON m.medida_id = me.id_medida
                            $where");

                        mysqli_close($conexion);
                        $materias = mysqli_num_rows($query);

                        if ($materias > 0) {
                            while ($dato = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td style="color: black;"><?php echo $dato['id_materia']; ?></td>
                                    <td style="color: black;"><?php echo $dato['nombre']; ?></td>
                                    <td style="color: black;"><?php echo $dato['medida']; ?></td>
                                    <td style="color: black;"><?php echo $dato['cantidad']; ?></td>
                                    <td style="color: black;"><?php echo $dato['descripcion']; ?></td>
                                    <?php if ($_SESSION['rol'] == 1) { ?>
                                        <td>
                                            <a href="editar_materia_prima.php?id=<?php echo $dato['id_materia']; ?>"
                                                class="btn btn-success"><i class='fas fa-edit'></i> Editar</a>
                                            <form action="eliminar_materia_prima.php?id=<?php echo $dato['id_materia']; ?>" method="post"
                                                class="confirmar d-inline">
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
    // Agrega un listener para el evento "onchange" del elemento "select" de categoría
    document.getElementById("categoria").onchange = function() {
        this.form.submit();
    };
</script>
