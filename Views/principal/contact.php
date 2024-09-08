<?php include_once 'Views/template/header-principal.php';?>

    <!-- Start Content Page -->
    <div class="container-fluid py-5" style="background-color: #fff;">
        <div class="col-md-6 m-auto text-center">
            <h1><i class="fas fa-pencil-square-o"></i> Contáctanos</h1>
            <h2>
            Con este formulario, tienes la opción de programar una visita de nuestros vendedores, ya sea en tu establecimiento o en el lugar que elijas.
            </h2>
        </div>
    </div>

    <!-- Start Contact -->
    <div class="container">
        <div class="row py-5">
            <form class="col-md-9 m-auto" id="frmRegistro">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control mt-1" id="nombre" name="nombre" placeholder="Nombre" style="background-color: #bd9eff;">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="E-mail" style="background-color: #bd9eff;">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control mt-1" id="direccion" name="direccion" placeholder="Direccion, Zona, Avenida o calle, #" style="background-color: #bd9eff;">
                </div>
                <div class="mb-3">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" class="form-control mt-1" name="mensaje" placeholder="Mensaje" rows="8" style="background-color: #bd9eff;"></textarea>
                </div>
                <div class="text-end">
                        <button class="btn btn-success" type="submit" id="btnAccion">Reservar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact -->

    <?php include_once 'Views/template/footer-principal.php';?>
</body>

</html>