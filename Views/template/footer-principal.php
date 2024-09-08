<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title"><i class="fas fa-cart-arrow-down"></i>Carrito</h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-resposive">
          <table class="table table-bordered table-striped table-hover align-middle" id="tableListaCarrito">
            <thead>
              <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="d-flex justify-content-around mb-3">
        <h3 id="totalGeneral"></h3>
        <?php if (!empty($_SESSION['correoCliente'])) { ?>
          <a class="btn btn-outline-primary" href="<?php echo BASE_URL . 'clientes'; ?>">Procesar pedido</a>
        <?php } else { ?>
          <a class="btn btn-outline-primary" href="#" onclick="abrirModalLogin();">Logeate para comprar</a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<!-- Plantilla de logeo -->
<div id="modalLogin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="titleLogin">INICIAR SESIÓN</h5>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body m-3">
        <form method="get" action="">
          <div class="text-center">
            <img class="img-thumbnail rounded-circle" src="<?php echo BASE_URL . 'assets/img/logo.png'; ?>" alt="" width="100">
          </div>
          <div class="row">
            <div class="col-md-12" id="frmLogin">
              <div class="form-group mb-3">
                <label for="correoLogin"><i class="fas fa-envelope"></i> Correo</label>
                <input id="correoLogin" class="form-control" type="text" name="correoLogin" placeholder="Correo ElectrÓnico">
              </div>
              <div class="form-group mb-3">
                <label for="claveLogin"><i class="fas fa-key"></i> Contraseña</label>
                <input id="claveLogin" class="form-control" type="password" name="claveLogin" placeholder="Contraseña">
              </div>
              <a href="#" id="btnRegister">¿Aún no tienes una cuenta? Regístrate</a>
              <hr>
              <p>¿Eres parte de nuestra familia administrativa? <a href="<?php echo BASE_URL . './sis_venta'; ?>" class="mb-2"><br> Haz click aquÍ</a> </p>
              <div class="float-end">
                <button class="btn btn-primary btn-lg mt-5" type="button" id="login">Login</button>
              </div>
            </div>
            <!-- FORMULARIO DE REGISTRO -->
            <div class="col-md-12 d-none" id="frmRegister">
              <div class="form-group mb-3">
                <label for="nombreRegistro"><i class="fas fa-list"></i> Nombre</label>
                <input id="nombreRegistro" class="form-control" type="text" name="nombreRegistro" placeholder="Nombre Completo">
              </div>
              <div class="form-group mb-3">
                <label for="correoRegisto"><i class="fas fa-envelope"></i> Correo</label>
                <input id="correoRegistro" class="form-control" type="text" name="correoRegisto" placeholder="Correo Electronico">
              </div>
              <div class="form-group mb-3">
                <label for="telefonoRegisto"><i class="fas fa-envelope"></i> Teléfono</label>
                <input id="telefonoRegistro" class="form-control" type="number" name="telefonoRegisto" placeholder="Telefono">
              </div>
              <div class="form-group mb-3">
                <label for="claveRegistro"><i class="fas fa-key"></i> Contraseña</label>
                <input id="claveRegistro" class="form-control" type="password" name="claveRegistro" placeholder="Contraseña">
              </div>
              <a href="#" id="btnLogin">¿Ya tienes una cuenta? Inicia sesión</a>
              <div class="float-end">
                <button class="btn btn-primary btn-lg" type="button" id="registrarse">Regístrarse</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Plantilla de logeo Fin -->

<!-- Start Footer -->
<footer class="" id="tempaltemo_footer" style="background-color: #001d5c;">
  <div class="container">
    <div class="row">

      <div class="col-md-4 pt-5">
        <h2 class="h2 text-util border-bottom pb-3 border-light logo">Ubícanos</h2>
        <ul class="list-unstyled text-light footer-link-list">
          <li>
            <i class="fas fa-map-marker-alt fa-fw"></i>
            <a href="https://www.google.com/maps/place/Plastic+Z/@-16.5182292,-68.2302683,15z/data=!4m2!3m1!1s0x0:0x895de5dc5b581233?sa=X&ved=2ahUKEwjI5IDgzsSCAxX2spUCHZ1iBSQQ_BJ6BAhEEAA&cshid=1700003645742634">El alto zona mercedario, sector 2, av. Periférica No. 200 (cerca condominios Wipala, frente estación de gas Kory Inty)</a>
          </li>
          <li>
            <i class="fa fa-phone fa-fw"></i>
            <a class="text-decoration-none" href="tel:62599255">62599255</a>
          </li>
          <li>
            <i class="fa fa-envelope fa-fw"></i>
            <a class="text-decoration-none" href="mailto:info@company.com">contacto@inplasticz.com</a>
          </li>
        </ul>
      </div>

      <div class="col-md-4 pt-5">
        <h2 class="h2 text-util border-bottom pb-3 border-light logo">Categorías más visitadas</h2>
        <ul class="list-unstyled text-light footer-link-list">
          <li><a class="text-decoration-none" href="<?php echo BASE_URL . 'principal/shop' ?>">Bobinas</a></li>
          <li><a class="text-decoration-none" href="<?php echo BASE_URL . 'principal/shop' ?>">Bolsas de basura</a></li>
          <li><a class="text-decoration-none" href="<?php echo BASE_URL . 'principal/shop' ?>">Ecovallas</a></li>
          <li><a class="text-decoration-none" href="<?php echo BASE_URL . 'principal/shop' ?>">Toldos</a></li>
          <li><a class="text-decoration-none" href="<?php echo BASE_URL . 'principal/shop' ?>">Bandejas</a></li>
          <li><a class="text-decoration-none" href="<?php echo BASE_URL . 'principal/shop' ?>">Alfombras de caucho</a></li>
        </ul>
      </div>

      <div class="col-md-4 pt-5">
        <h2 class="h2 text-util border-bottom pb-3 border-light logo">Secciones</h2>
        <ul class="list-unstyled text-light footer-link-list">
          <li><a class="text-decoration-none" href="<?php echo BASE_URL?>">Home</a></li>
          <li><a class="text-decoration-none" href="<?php echo BASE_URL . 'principal/about' ?>">Servicio</a></li>
          <li><a class="text-decoration-none" href="<?php echo BASE_URL . 'principal/shop' ?>">Tienda</a></li>
          <li><a class="text-decoration-none" href="<?php echo BASE_URL . 'principal/contact' ?>">Contactanos</a></li>
        </ul>
      </div>

    </div>

    <div class="row text-light mb-4">
      <div class="col-12 mb-3">
        <div class="w-100 my-3 border-top border-light"></div>
      </div>
      <div class="col-auto me-auto">
        <ul class="list-inline text-left footer-icons">
          <li class="list-inline-item border border-light rounded-circle text-center">
            <a class="text-light text-decoration-none" target="_blank" href="https://www.facebook.com/IndustriaPlasticZ"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
          </li>
          <li class="list-inline-item border border-light rounded-circle text-center">
            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
          </li>
          <li class="list-inline-item border border-light rounded-circle text-center">
            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="w-100 p-2" style="background-color: #0033a0;">
    <div class="container">
      <div class="row pt-2">
        <div class="col-12">
          <p class="text-left text-light">
            Copyright &copy; 202 PLASTIC Z
          </p>
        </div>
      </div>
    </div>
  </div>

</footer>
<!-- End Footer -->

<!-- Start Script -->
<script src="<?php echo BASE_URL; ?>assets/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/templatemo.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/all.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/sweetalert2.all.min.js"></script>
<script>
  const base_url = '<?php echo BASE_URL; ?>';
</script>
<script src="<?php echo BASE_URL; ?>assets/js/carrito.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/login.js"></script>



<!-- End Script -->