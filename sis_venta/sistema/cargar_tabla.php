<?php
include "../conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $estado = $_POST['estado']; // Estado de la tabla recibido desde la solicitud AJAX

  $query = "SELECT * FROM ventas WHERE Estado = $estado"; // Obtener datos según el estado
  $result = mysqli_query($conexion, $query);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['ID_Ventas'] . "</td>";
      echo "<td>" . $row['Precio_Total'] . "</td>";
      echo "<td>" . $row['Productos'] . "</td>";
      echo "<td>" . $row['Fecha'] . "</td>";
      echo "<td>" . $row['Correo'] . "</td>";
      echo "<td>" . $row['Nombre'] . "</td>";
      echo "<td>" . $row['Apellido'] . "</td>";
      echo "<td>" . $row['Direccion'] . "</td>";
      echo "<td><button class='btn btn-primary'>Cambiar Estado</button></td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan='9'>No se encontraron registros.</td></tr>";
  }
}
?>
