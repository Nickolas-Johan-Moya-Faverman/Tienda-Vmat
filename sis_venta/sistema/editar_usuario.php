<?php
include "includes/header.php";
include "../conexion.php";

if (!empty($_POST)) {
  $alert = "";

  if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario'])) {
    $alert = '<p class="error">Todos los campos, excepto la contraseña, son requeridos</p>';
  } else {
    $idusuario = $_GET['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena']; // Dejar como 'contrasena' si ese es el nombre en el formulario

    // Verificar si se proporcionó una contraseña y, si es así, realizar la encriptación MD5
    $contrasena_md5 = empty($contrasena) ? "" : md5($contrasena);

    $sql_update = mysqli_query($conexion, "UPDATE usuario SET nombre = '$nombre', correo = '$correo', usuario = '$usuario', clave = '$contrasena_md5' WHERE idusuario = $idusuario");
    $alert = '<p>Usuario Actualizado</p>';
  }
}
// Resto de tu código...





// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_usuarios.php");
}
$idusuario = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM usuario WHERE idusuario = $idusuario");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_usuarios.php");
} else {
  if ($data = mysqli_fetch_array($sql)) {
    $idcliente = $data['idusuario'];
    $nombre = $data['nombre'];
    $correo = $data['correo'];
    $usuario = $data['usuario'];
  }
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar datos de usuario</h1>
        <a href="lista_usuarios.php" class="btn btn-primary">Regresar</a>
    </div>
  <div class="row">
    <div class="col-lg-6 m-auto">
      <form class="" action="" method="post">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id" value="<?php echo $idusuario; ?>">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" placeholder="Ingrese nombre" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>">

        </div>
        <div class="form-group">
          <label for="correo">Correo</label>
          <input type="text" placeholder="Ingrese correo" class="form-control" name="correo" id="correo" value="<?php echo $correo; ?>">

        </div>
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" placeholder="Ingrese usuario" class="form-control" name="usuario" id="usuario" value="<?php echo $usuario; ?>">

        </div>
        <div class="form-group">
         <label for="contrasena">Cambiar contraseña</label>
         <input type="password" placeholder="Ingrese contraseña" class="form-control" name="contrasena" id="contrasena">
        </div>
          <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Usuario</button>
      </form>

    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<script>
  // Función para redirigir a la pestaña anterior
  function redirigirAtras() {
    window.history.back(); // Utiliza la función para volver a la página anterior
    return false; // Evita que el formulario se envíe
  }
</script>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>