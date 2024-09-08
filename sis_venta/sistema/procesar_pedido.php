<?php
include "../conexion.php";

if (isset($_POST['procesar_pedido'])) {
    $id_venta = $_POST['id_venta'];
    
    // Obtener información de la venta
    $query = "SELECT * FROM ventas WHERE ID_Ventas = $id_venta";
    $result = mysqli_query($conexion, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Obtener la cantidad de productos disponibles para el producto en la venta
        $queryProductos = "SELECT cantidad FROM productos WHERE id_prod = " . $row['Productos'];
        $resultProductos = mysqli_query($conexion, $queryProductos);

        if (mysqli_num_rows($resultProductos) > 0) {
            $producto = mysqli_fetch_assoc($resultProductos);
            $cantidadDisponible = $producto['cantidad'];

            // Verificar si la cantidad disponible es suficiente
            if ($cantidadDisponible >= $row['cantidad']) {
                // Actualizar el estado de la venta a 3 (procesado)
                $queryUpdateEstado = "UPDATE ventas SET Estado = 3 WHERE ID_Ventas = $id_venta";
                mysqli_query($conexion, $queryUpdateEstado);

                // Restar la cantidad de productos vendidos de la cantidad de productos disponibles
                $nuevaCantidad = $cantidadDisponible - $row['cantidad'];
                $queryUpdateCantidad = "UPDATE productos SET cantidad = $nuevaCantidad WHERE id_prod = " . $row['Productos'];
                mysqli_query($conexion, $queryUpdateCantidad);
            } else {
                // Actualizar el estado de la venta a 2 (faltante)
                $queryUpdateEstado = "UPDATE ventas SET Estado = 2 WHERE ID_Ventas = $id_venta";
                mysqli_query($conexion, $queryUpdateEstado);
            }
        }
    }

    // Redirigir de nuevo a la página de pedidos pendientes
    header("Location: lista_productos.php");
    exit();
}
?>
