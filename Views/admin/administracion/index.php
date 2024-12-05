<?php include_once 'Views/template/header-admin.php'; ?>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Pedidos Pendientes</p>
                        <h4 class="my-1 text-warning"><?php echo $data['pendientes']['total']; ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='fas fa-exclamation-circle'></i>
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
                        <p class="mb-0 text-secondary">Pedidos en Proceso</p>
                        <h4 class="my-1 text-info"><?php echo $data['proceso']['total']; ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='fas fa-spinner'></i>
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
                        <p class="mb-0 text-secondary">Pedidos Finalizados</p>
                        <h4 class="my-1 text-success"><?php echo $data['finalizados']['total']; ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='fas fa-check-circle'></i>
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
                        <p class="mb-0 text-secondary">Total Productos</p>
                        <h4 class="my-1 text-warning"><?php echo $data['productos']['total']; ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bxs-group'></i>
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
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Proceso <span class="badge bg-primary rounded-pill"><?php echo $data['proceso']['total']; ?></span>
                </li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Pendientes <span class="badge bg-warning text-dark rounded-pill"><?php echo $data['pendientes']['total']; ?></span>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="card radius-10 w-100">
            <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Productos con Stock Mínimo </h6>
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
                        <h6 class="mb-0">Productos más vendidos</h6>
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




<?php include_once 'Views/template/footer-admin.php'; ?>

<script>
    var ctx = document.getElementById("reportePedidos").getContext('2d');

    var gradients = [
        ctx.createLinearGradient(0, 0, 0, 300),
        ctx.createLinearGradient(0, 0, 0, 300),
        ctx.createLinearGradient(0, 0, 0, 300)
    ];
    gradients[0].addColorStop(0, '#fc4a1a');
    gradients[0].addColorStop(1, '#f7b733');
    gradients[1].addColorStop(0, '#4776e6');
    gradients[1].addColorStop(1, '#8e54e9');
    gradients[2].addColorStop(0, '#42e695');
    gradients[2].addColorStop(1, '#3bb2b8');

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Pendientes", "Proceso", "Finalizados"],
            datasets: [{
                backgroundColor: gradients,
                hoverBackgroundColor: gradients,
                data: [
                    <?php echo isset($data['pendientes']['total']) ? $data['pendientes']['total'] : 0; ?>,
                    <?php echo isset($data['proceso']['total']) ? $data['proceso']['total'] : 0; ?>,
                    <?php echo isset($data['finalizados']['total']) ? $data['finalizados']['total'] : 0; ?>
                ],
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
                callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.labels[tooltipItem.index] || '';
                        var value = data.datasets[0].data[tooltipItem.index] || 0;
                        return label + ': ' + value + ' pedidos';
                    }
                },
                displayColors: false,
            }
        }
    });
</script>


<script src="<?php echo BASE_URL; ?>assets/js/index.js"></script>




</body>

</html>