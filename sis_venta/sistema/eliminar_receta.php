<?php
if (!empty($_GET['id'])) {
    include "../conexion.php";
    $id_receta = $_GET['id'];

    // Realizamos la eliminación de la receta
    $query_delete = mysqli_query($conexion, "DELETE FROM recetas WHERE id_receta = $id_receta");

    // Comprobamos si se eliminó correctamente
    if ($query_delete) {
        mysqli_close($conexion);
        header("Location: recetas.php");
    } else {
        echo "Error al eliminar la receta.";
    }
} else {
    // Manejo de error si no se proporciona un ID válido
    echo "ID de receta no válido.";
}
?>
