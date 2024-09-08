<?php

    $host = "localhost";
    $user = "root";
    $clave = "";
    $bd = "sis_venta";

    $conexion = mysqli_connect($host,$user,$clave,$bd);
    if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }

    mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");

    mysqli_set_charset($conexion,"utf8");


    
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Manejar la solicitud AJAX para obtener componentes
if (isset($_GET['obtener_componentes'])) {
    $componentes = array();

    // Realiza una consulta para obtener los componentes de la tabla "materia_prima"
    $query_componentes = mysqli_query($conexion, "SELECT id_materia, nombre FROM materia_prima");

    while ($componente = mysqli_fetch_assoc($query_componentes)) {
        $componentes[] = $componente;
    }

    // Devuelve los componentes como respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($componentes);
    exit;
}


?>



