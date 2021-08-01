<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Compras Realizadas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Mis compras</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <h5>Estás son todas la compras que haz realizado: <strong><?php echo $_SESSION["nombre"]; ?></strong> </h5>
                  <div class="container">
                    <div class="box">
                        <div class="box-body">
                            <br />
                            <table id="TB" class="table table-bordered table-hover SM text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">ID</th>
                                        <th>Fecha</th>
                                        <th>SubTotal</th>
                                        <th>ISV</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $columna = "idusuario";
                                    $valor = $_SESSION["idusuario"];

                                    $resultado = ControladorCliente::ctrComprasRealizadas($columna, $valor);

                                    foreach ($resultado as $key => $value) {

                                    ?>

                                        <tr>
                                            <td style=""><?php echo $value["idventa"];  ?></td>
                                            <td style=""><?php echo $value["fecha"];  ?></td>
                                            <td style=""><?php echo number_format($value["subtotal"], 2);  ?> Lps</td>
                                            <td style=""><?php echo number_format($value["isv"], 2);  ?> Lps</td>
                                            <td style=""><?php echo number_format($value["total"],2); ?> Lps</td>
                                            <td style=""><?php echo $value["estado"];  ?> </td>
                                        </tr>

                                    <?php

                                    }

                                    ?>
                                </tbody>
                            </table>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>