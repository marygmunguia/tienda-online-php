<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">Productos más vendidos</h3>
    </div>
    <div class="card-body">
        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>
</div>

<script>
    $(function() {
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                <?php

                $resultado = ControladorReporte::ctrMostrarProductosMasVendidos();

                foreach ($resultado as $key => $values) {

                ?>

                    '<?php echo $values["nombre"]; ?>',

                <?php } ?>
            ],
            datasets: [{
                data: [<?php

                        $resultado = ControladorReporte::ctrMostrarProductosMasVendidos();

                        foreach ($resultado as $key => $values) {

                        ?>

                        '<?php echo $values["cantidad"]; ?>',

                    <?php } ?>
                ],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

    })
</script>