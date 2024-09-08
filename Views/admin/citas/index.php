<?php include_once 'Views/template/header-admin.php'; ?>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblCitas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>Mensaje</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once 'Views/template/footer-admin.php'; ?>
<script src="<?php echo  BASE_URL . 'assets/js/modulos/citas.js'; ?>"></script>
</body>

</html>