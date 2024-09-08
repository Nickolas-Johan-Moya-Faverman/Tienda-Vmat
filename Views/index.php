<?php include_once 'Views/template/header-principal.php'; ?>

<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
    <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="container">
        <div class="row p-5">
          <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
            <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/images/carrusel/img1.jpg" alt="0" width="300">
          </div>
          <div class="col-lg-6 mb-0 d-flex align-items-center">
            <div class="text-align-left align-self-center">
              <h1 class="h1 text-util">Te ofrecemos las <b>mejores bobinas</b></h1>
              <p>Tenemos las mejores bobinas para el uso diario como material escolar
                o material de produccion.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="container">
        <div class="row p-5">
          <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
            <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/images/carrusel/bobina2.jpg" alt="0s" width="350">
          </div>
          <div class="col-lg-6 mb-0 d-flex align-items-center">
            <div class="text-align-left">
              <h1 class="h1">Fabricamos nuestros proyectos con la <b>mejor maquinaria</b></h1>
              <p>Nuestas maquinaria estan al nivel de grandes empresas, para producir
                cantidades numerables de nuestros productos.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="container">
        <div class="row p-5">
          <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
            <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/images/carrusel/botella.png" alt="0" width="300" style="margin-top: 40px;">
          </div>
          <div class="col-lg-6 mb-0 d-flex align-items-center">
            <div class="text-align-left">
              <h1 class="h1"><b>El mejor material</b> para tu dia a dia</h1>
              <p>Tenemos una variedad grande de envases para el uso diario.
                Ofrecemos distintos tamaños en todos nuestros productos.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev" style="color: #000;">
    <i class="fa fa-chevron-left"></i>
  </a>
  <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next" style="color: #000;">
    <i class="fa fa-chevron-right"></i>
  </a>
</div>
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->
<section class="container py-5">
  <div class="row text-center pt-3">
    <div class="col-lg-6 m-auto">
      <h1 class="h1">Categorias</h1>
      <br>
      <br>
    </div>
  </div>
  <div class="row">
    <?php foreach ($data['categorias'] as $categoria) { ?>
      <div class="col-12 col-md-3 p-4" style="border-radius: 20px; box-shadow: 1px 1px 0 0px #66a6ef, -3px -3px 0 -1px #66a6ef;">
        <a href="<?php echo BASE_URL . 'principal/categorias/' . $categoria['id']; ?>"><img src="<?php echo $categoria['imagen']; ?>" class="img-fluid border-none"></a>
        <h5 class="text-center mt-3 mb-3"><?php echo $categoria['categoria']; ?></h5>
      </div>
    <?php } ?>
  </div>
</section>
<!-- End Categories of The Month -->


<!-- Start Values -->
<section class="bg-light">
  <div class="imghome">
    <div class="contval">
      <img src="<?php echo BASE_URL; ?>assets/images/valores/mision.png" alt="Mision">
      <h2>MISION</h2>
      <p class="val">La actividad de MICRO es comercializar envases de plástico en el sector alimenticio. Trabajamos orientados a la satisfacción de nuestros clientes, disponemos de un personal polivalente, una infraestructura de medios y recursos adaptados a las demandas, una flota de distribución y unas instalaciones que se adaptan a las demandas del sector</p>
    </div>
    <div class="contval">
      <img src="<?php echo BASE_URL; ?>assets/images/valores/vision.png" alt="pro1">
      <h2>VISION</h2>
      <p class="val">Pretendemos ser referencia en el sector escolar y oficinas a nivel nacional por la gestión, identidad y profesionalidad de PLASTIC Z.</p>
    </div>
    <div class="contval">
      <img src="<?php echo BASE_URL; ?>assets/images/valores/valor.png" alt="pro1">
      <h2>NUESTROS VALORES</h2>
      <p class="val">Llevamos 10 años de experiencia en el sector. Nuestra razón de ser es la calidad del servicio en las necesidades de nuestros clientes: <br> <br>
        - Calidad en las materias primas <br>
        - Calidad en el tratamiento de nuestros productos <br>
        - Calidad en el servicio <br> </p>
    </div>
  </div>
</section>
<!-- End Values -->
<?php include_once 'Views/template/footer-principal.php'; ?>
</body>

</html>