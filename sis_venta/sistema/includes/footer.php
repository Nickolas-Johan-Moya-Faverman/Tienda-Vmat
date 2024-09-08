<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Nacek insdustries <?php echo date("Y"); ?></span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/all.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script src="js/sweetalert2@10.js"></script>
<script type="text/javascript" src="js/producto.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      language: {
        "decimal": "",
        "emptyTable": "No hay datos",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "infoEmpty": "Mostrando 0 a 0 de 0 registros",
        "infoFiltered": "(Filtro de _MAX_ total registros)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ registros",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron coincidencias",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        },
        "aria": {
          "sortAscending": ": Activar orden de columna ascendente",
          "sortDescending": ": Activar orden de columna desendente"
        }
      }
    });
    var usuarioid = '<?php echo $_SESSION['idUser']; ?>';
    searchForDetalle(usuarioid);
  });
</script>
<!-- Agrega el script JavaScript aquí -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Agrega esto después de incluir jQuery -->
<script>
$(document).ready(function() {
    // Manejar el clic en el botón "Cambiar Estado"
    $('.cambiar-estado').click(function() {
        // Obtener el ID de la transacción desde el atributo de datos
        var idVenta = $(this).data('id-venta');
        var estadoActual = $(this).data('estado-actual'); // Nuevo atributo de datos para almacenar el estado actual

        // Aumentar el estado en 1
        var nuevoEstado = estadoActual + 1;
        
        // Realizar una solicitud AJAX para cambiar el estado
        $.ajax({
            url: 'http://localhost/sis_venta/sistema/cambiar_estado.php', // Reemplaza con la ruta correcta
            method: 'POST',
            data: { id_venta: idVenta, nuevo_estado: nuevoEstado },
            success: function(response) {
                // Actualizar la tabla o realizar otras acciones según sea necesario
                if (response === 'success') {
                    // Actualizar la tabla o mostrar un mensaje de éxito
                    location.reload(); // Recargar la página por ejemplo
                } else {
                    // Mostrar un mensaje de error si es necesario
                    alert('Error al cambiar el estado.');
                }
            }
        });
    });
});
</script>

<script>
$(document).ready(function() {
  // Inicializar el tab content
  $('#myTab a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
    var targetTab = $(e.target).attr("href"); // Obtener el ID del tab activo
    var targetTable = $(targetTab).find('.table'); // Obtener la tabla dentro del tab activo

    // Verificar si la tabla ya ha sido cargada, si no, cargarla
    if (targetTable.find('tbody').is(':empty')) {
      var estado = targetTable.data('estado'); // Obtener el estado de la tabla

      // Realizar una solicitud AJAX para cargar los datos de la tabla
      $.ajax({
        url: 'http://localhost/sis_venta/sistema/cargar_tabla.php', // Ruta del archivo PHP para cargar la tabla
        method: 'POST',
        data: { estado: estado }, // Enviar el estado correspondiente
        success: function(response) {
          // Insertar los datos en la tabla
          targetTable.find('tbody').html(response);
        },
        error: function() {
          alert('Error al cargar la tabla.');
        }
      });
    }
  });

  // Activar la primera pestaña por defecto
  $('#myTab a:first').tab('show');
});
</script>


</body>
</html>
