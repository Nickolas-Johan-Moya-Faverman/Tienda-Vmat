<?php include_once 'Views/template/header-admin.php'; ?>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-danger">Pedidos pendientes</p>
                        <h4 class="my-1 text-danger"><?php echo $data['pendientes']['total']; ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-danger text-white ms-auto"><i class='fas fa-exclamation-circle'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-info">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Pedido en proceso</p>
                        <h4 class="my-1 text-info"><?php echo $data['procesos']['total']; ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-info text-white ms-auto"><i class='fas fa-spinner'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-success">Pedidos finalizados</p>
                        <h4 class="my-1 text-success"><?php echo $data['finalizados']['total']; ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-success text-white ms-auto"><i class='fas fa-check-circle'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total productos</p>
                        <h4 class="my-1 text-warning"><?php echo $data['productos']['total']; ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='fas fa-check-circle'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->

<div class="row">
    <div class="col-12 col-lg-4">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Pedidos</h6>
                    </div>
                </div>
                <div class="chart-container-2 mt-4">
                    <canvas id="reportePedidos"></canvas>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Finalizados <span class="badge bg-success rounded-pill"><?php echo $data['finalizados']['total']; ?></span>
                </li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Proceso <span class="badge bg-primary rounded-pill"><?php echo $data['procesos']['total']; ?></span>
                </li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Pendientes <span class="badge bg-warning rounded-pill"><?php echo $data['pendientes']['total']; ?></span>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="card radius-10 w-100">
            <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Productos con Stock minimo</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container-1">
                    <canvas id="chart4"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="card radius-10 w-100">
            <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Productos mas vendidos</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container-1">
                    <canvas id="topProductos"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->
<?php include_once 'Views/template/footer-admin.php'; ?>

<script>
    // chart 2

    var ctx = document.getElementById("reportePedidos").getContext('2d');

    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke1.addColorStop(0, '#fc4a1a');
    gradientStroke1.addColorStop(1, '#f7b733');

    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke2.addColorStop(0, '#4776e6');
    gradientStroke2.addColorStop(1, '#8e54e9');


    var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke3.addColorStop(0, '#42e695');
    gradientStroke3.addColorStop(1, '#3bb2b8');

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Pendientes", "Proceso", "Finalizados"],
            datasets: [{
                backgroundColor: [
                    gradientStroke1,
                    gradientStroke2,
                    gradientStroke3
                ],
                hoverBackgroundColor: [
                    gradientStroke1,
                    gradientStroke2,
                    gradientStroke3
                ],
                data: [<?php echo $data['pendientes']['total']; ?>,
                <?php echo $data['procesos']['total']; ?>,
                <?php echo $data['finalizados']['total']; ?>],
                borderWidth: [1, 1, 1]
            }]
        },
        options: {
            maintainAspectRatio: false,
            cutoutPercentage: 75,
            legend: {
                position: 'bottom',
                display: false,
                labels: {
                    boxWidth: 8
                }
            },
            tooltips: {
                displayColors: false,
            }
        }
    });
</script>

<script src="<?php echo BASE_URL; ?>assets/js/index.js"></script>
</body>

</html>