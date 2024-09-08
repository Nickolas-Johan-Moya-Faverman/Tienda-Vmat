<?php include_once 'Views/template/header-admin.php'; ?>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" style="width: 100%;" id="tblClientien">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>perfil</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="nuevoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" style="border-radius: 100px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="titleModal"></h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form id="frmRegistro">
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group mb-2">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombres">
                        </div>
                        <div class="form-group mb-2">
                            <label for="correo">Correo</label>
                            <input id="correo" class="form-control" type="email" name="correo" placeholder="Correo electronico">
                        </div>
                        <div class="form-group mb-2">
                            <label for="clave">Contraseña</label>
                            <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" id="btnAccion">Registrar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once 'Views/template/footer-admin.php'; ?>
<script src="<?php echo  BASE_URL . 'assets/js/modulos/clientien.js'; ?>"></script>
</body>

</html>