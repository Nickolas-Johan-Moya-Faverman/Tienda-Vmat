<?php
if (!empty($_GET['id'])) {
    require("../conexion.php");
    $id = $_GET['id'];
    $query_delete = mysqli_query($conexion, "DELETE FROM materia_prima WHERE id_materia = $id");
    mysqli_close($conexion);
    header("location: almacenaje_m.php");
}
?>
