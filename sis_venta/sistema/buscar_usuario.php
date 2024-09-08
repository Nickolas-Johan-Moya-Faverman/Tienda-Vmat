<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Busqueda por nombre de usuario</h1>
        
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
            <input type="text" style="width: 20%;" class="form-control search-input" id="searchInput" placeholder="Buscar">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>CORREO</th>
                            <th>USUARIO</th>
                            <th>ROL</th>
                            <?php if ($_SESSION['rol'] == 1) { ?>
                            <th>ACCIONES</th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../conexion.php";

                        $query = mysqli_query($conexion, "SELECT u.idusuario, u.nombre, u.correo, u.usuario, r.rol FROM usuario u INNER JOIN rol r ON u.rol = r.idrol");
                        $result = mysqli_num_rows($query);
                        if ($result > 0) {
                            while ($data = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <td><?php echo $data['idusuario']; ?></td>
                                    <td><?php echo $data['nombre']; ?></td>
                                    <td><?php echo $data['correo']; ?></td>
                                    <td><?php echo $data['usuario']; ?></td>
                                    <td><?php echo $data['rol']; ?></td>
                                    <?php if ($_SESSION['rol'] == 1) { ?>
                                    <td>
                                        <a href="editar_usuario.php?id=<?php echo $data['idusuario']; ?>" class="btn btn-success"><i class='fas fa-edit'></i> Editar</a>
                                        <form action="eliminar_usuario.php?id=<?php echo $data['idusuario']; ?>" method="post" class="confirmar d-inline">
                                        <?php if ($data['rol'] != 'Administrador') { ?>
                                             <button class="btn btn-warning" type="submit"><i class='fas fa-toggle-off'></i> Inhabilitar</button>
                                              
                                        <?php } ?>

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
    // Función para realizar la búsqueda en tiempo real
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("table");
        tr = table.getElementsByTagName("tr");
        
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Cambia el número (1) para buscar en una columna específica
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Agrega un listener para llamar a la función de búsqueda cuando se escriba en el campo de búsqueda
    document.getElementById("searchInput").addEventListener("input", searchTable);
</script>
