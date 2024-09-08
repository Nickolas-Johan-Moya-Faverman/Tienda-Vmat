<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto cf-container">
            <form action="" method="post">
              <div class="cf-cover">
               <div class="session-title row">
                 <h2>Formulario de administracion de fabricacion</h2>
                 <p>Llene con los datos correspondientes</p>
               </div>
               <div class="form-row row">
                 <div class="col-md-6">
                   <label for="">Nombre</label>
                   <input type="text" required="" placeholder="Ingrese nombre" class="form-control">
                 </div>
                 <div class="col-md-6">
                   <label for="">Apellido</label>
                   <input type="text" placeholder="Ingrese apellido" class="form-control">
                 </div>
               </div>
               <div class="form-row row">
                 <div class="col-md-12">
                   <label for="">Encargados operarios</label>
                   <input type="text" placeholder="Ingrese operarios" class="form-control">
                 </div>

               </div>
               <div class="form-row row">
                 <div class="col-md-12">
                   <label for="">Maquinarias utilizadas</label>
                   <input type="text" placeholder="Ingrese maquinas utilizadas" class="form-control">
                 </div>
               </div>
               <div class="form-row row">
                 <div class="col-md-12">
                   <label for="">Materia prima utilizada</label>
                   <input type="text" placeholder="Ingrese materia prima utilizada" class="form-control">
                 </div>
               </div>
               <div class="form-row row">
                 <div class="col-md-12">
                   <label for="">Observaciones</label>
                   <textarea placeholder="Ingrese observaciones" rows="3" class="form-control"></textarea>
                 </div>
               </div>
               <!-- <div class="form-row row agre">
                 <div class="col-md-12">
                   <p><input type="checkbox"> By Selecting This you Agree our <a href="#">Terms & Conditions</a></p>
                 </div>
               </div> -->
               <div class="form-row row" style="padding-top: 10px">
                 <div class="col-md-12">
                   <button class="btn btn-primary w-100">Submit</button>
                 </div>
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </div> 
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>