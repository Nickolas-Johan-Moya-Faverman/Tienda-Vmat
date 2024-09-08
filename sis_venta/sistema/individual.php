<?php
include "includes/header.php";
include "../conexion.php";

// Verificar si el usuario ha iniciado sesión
if (empty($_SESSION['active'])) {
    header('location: ../'); // Redirige si el usuario no ha iniciado sesión
    exit;
}

$idusuario = $_SESSION['idUser']; // Utiliza la ID del usuario actual

$alert = '';

if (!empty($_POST)) {
    if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario'])) {
        $alert = '<p class="error">Todos los campos, excepto la contraseña, son requeridos</p>';
    } else {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        // Verificar si se proporcionó una contraseña y, si es así, realizar la encriptación MD5
        $contrasena_md5 = empty($contrasena) ? '' : md5($contrasena);

        // Actualizar los datos del usuario en la base de datos
        $sql_update = mysqli_query($conexion, "UPDATE usuario SET nombre = '$nombre', correo = '$correo', usuario = '$usuario', clave = '$contrasena_md5' WHERE idusuario = $idusuario");
        if ($sql_update) {
            $alert = '<p>Usuario Actualizado</p>';
        } else {
            $alert = '<p class="error">Error al actualizar el usuario</p>';
        }
    }
}

// Obtener los datos del usuario
$sql = mysqli_query($conexion, "SELECT * FROM usuario WHERE idusuario = $idusuario");
if ($sql) {
    if (mysqli_num_rows($sql) > 0) {
        $data = mysqli_fetch_assoc($sql);
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
            <form action="" method="post">
                <?php echo $alert; ?>
                <input type="hidden" name="id" value="<?php echo $idusuario; ?>">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="form-group">
                    <label for="correo">Correo</label>
                    <input type="text" class="form-control" name="correo" id="correo" placeholder="Ingrese correo" value="<?php echo $correo; ?>">
                </div>
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese usuario" value="<?php echo $usuario; ?>">
                </div>
                <div class="form-group">
                    <label for="contrasena">Cambiar contraseña</label>
                    <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Ingrese contraseña">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Usuario</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>
