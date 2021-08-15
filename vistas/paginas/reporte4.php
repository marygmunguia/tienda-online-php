                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Ingresos por categoría</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>


                <script>
                    $(function() {
                        var donutData = {
                            labels: [<?php

                                        $resultado = ControladorReporte::ctrMostrarIngresosPorCategorias();

                                        foreach ($resultado as $key => $values) {

                                        ?>

                                    '<?php echo $values["nombre"]; ?>',

                                <?php } ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php

                                    $resultado = ControladorReporte::ctrMostrarIngresosPorCategorias();

                                    foreach ($resultado as $key => $values) {

                                    ?>

                                        '<?php echo $values["total"]; ?>',

                                    <?php } ?>
                                ],
                                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                            }]
                        }


                        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                        var pieData = donutData;
                        var pieOptions = {
                            maintainAspectRatio: false,
                            responsive: true,
                        }

                        new Chart(pieChartCanvas, {
                            type: 'pie',
                            data: pieData,
                            options: pieOptions
                        })

                    })
                </script>