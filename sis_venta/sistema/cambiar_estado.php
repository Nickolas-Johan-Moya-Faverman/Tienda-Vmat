<?php
include "../conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idVenta = $_POST['id_venta'];
    $nuevoEstado = $_POST['nuevo_estado'];

    // Realiza la actualización en la base de datos
    $query = "UPDATE ventas SET Estado = $nuevoEstado WHERE ID_Ventas = $idVenta";
    if (mysqli_query($conexion, $query)) {
        echo 'success'; // Devuelve 'success' si la actualización es exitosa
    } else {
        echo 'error'; // Devuelve 'error' en caso de error
    }
}
?>
