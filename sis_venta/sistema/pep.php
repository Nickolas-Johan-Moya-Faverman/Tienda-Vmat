<?php
ob_start(); 
include_once "includes/header.php";
include "../conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pep'])) {
    $id_venta = $_POST['id_venta'];

    // Obtener la cantidad de productos y la cantidad de venta
    $queryCantidadProductos = "SELECT productos.id_prod, productos.cantidad as cantidad_productos, ventas.cantidad as cantidad_venta
                                FROM ventas
                                INNER JOIN productos ON ventas.Productos = productos.id_prod
                                WHERE ventas.ID_Ventas = $id_venta";
    $resultCantidadProductos = mysqli_query($conexion, $queryCantidadProductos);

    if ($resultCantidadProductos) {
        $rowCantidadProductos = mysqli_fetch_assoc($resultCantidadProductos);

        // Calcular la cantidad resultante (cantidad de venta - cantidad de productos)
        $cantidadProductos = $rowCantidadProductos['cantidad_productos'];
        $cantidadVenta = $rowCantidadProductos['cantidad_venta'];
        $cantidadResultante = $cantidadVenta - $cantidadProductos;
        
        // Verificar que la cantidad resultante no sea negativa
        if ($cantidadResultante >= 0) {
            // Buscar el nombre del producto en la tabla de recetas
            $queryRecetas = "SELECT * FROM recetas WHERE nombre = (SELECT Productos FROM ventas WHERE ID_Ventas = $id_venta)";
            $resultRecetas = mysqli_query($conexion, $queryRecetas);

            if ($resultRecetas) {
                if (mysqli_num_rows($resultRecetas) > 0) {
                    $rowRecetas = mysqli_fetch_assoc($resultRecetas);

                    // Multiplicar las cantidades de los componentes por la cantidad de productos vendidos
                    for ($i = 1; $i <= 8; $i++) {
                        $componenteID = $rowRecetas["componente{$i}_id"];
                        $cantidadComponente = $rowRecetas["cantidad{$i}"];

                        // Verificar si el componente tiene un valor antes de continuar
                        if (!is_null($componenteID) && !is_null($cantidadComponente) && is_numeric($componenteID) && is_numeric($cantidadComponente)) {
                            // Calcular la cantidad a restar en la tabla de materia_prima
                            $cantidadRestar = $cantidadResultante * $cantidadComponente;

                            // Verificar que no resulte en una cantidad negativa
                            if ($cantidadRestar >= 0) {
                                // Restar la cantidad calculada de la tabla de materia_prima
                                $queryRestar = "UPDATE materia_prima SET cantidad = cantidad - $cantidadRestar WHERE id_materia = $componenteID";
                                $resultRestar = mysqli_query($conexion, $queryRestar);

                                if ($resultRestar) {
                                    // Cambiar la cantidad de productos a 0 en la tabla de productos
                                    $productoID = $rowCantidadProductos['id_prod'];
                                    $queryActualizarProductos = "UPDATE productos SET cantidad = 0 WHERE id_prod = $productoID";
                                    $resultActualizarProductos = mysqli_query($conexion, $queryActualizarProductos);

                                    // Actualizar el estado de la venta a 3 (procesado)
                                    $queryUpdateEstado = "UPDATE ventas SET Estado = 3, creados = $cantidadResultante WHERE ID_Ventas = $id_venta";
                                    mysqli_query($conexion, $queryUpdateEstado);

                                    if (!$resultActualizarProductos) {
                                        echo "<script>alert('Error al actualizar la cantidad de productos');</script>";
                                    }
                                } else {
                                    echo "<script>alert('Error al restar la cantidad de materia prima');</script>";
                                }
                            } else {
                                echo "<script>alert('Error: La operación resultaría en una cantidad negativa');</script>";
                            }
                        }
                    }

                    // Mostrar un mensaje de éxito
                    echo "<script>alert('Proceso completado con éxito');</script>";
                    $redirectURL = "lista_productos1.php";
                } else {
                    echo "<script>alert('No se encontraron recetas para el producto seleccionado');</script>";
                }
            } else {
                echo "<script>alert('Error al obtener la información de la receta');</script>";
            }
        } else {
            echo "<script>alert('Error: La cantidad resultante sería negativa');</script>";
        }
    } else {
        echo "<script>alert('Error al obtener la cantidad de productos y la cantidad de venta');</script>";
    }

}
header("Location: $redirectURL");
exit();
ob_end_flush();
?>
