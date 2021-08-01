<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Registro de Ventas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Ventas</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="TB" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Email</th>
                                        <th>Fecha</th>
                                        <th>Subtotal</th>
                                        <th>ISV</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $columna = null;
                                    $valor = null;

                                    $resultado = ControladorVentas::ctrConsultarVentas($columna, $valor);

                                    foreach ($resultado as $key => $value) {

                                    ?>
                                        <tr>
                                            <td><?php echo $value["idventa"];  ?></td>
                                            <td><?php echo $value["nombre"];  ?></td>
                                            <td><?php echo $value["email"];  ?></td>
                                            <td><?php echo $value["fecha"];  ?></td>
                                            <td><?php echo $value["subtotal"];  ?></td>
                                            <td><?php echo $value["isv"];  ?></td>
                                            <td><?php echo $value["total"];  ?></td>
                                            <td><?php echo $value["estado"];  ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target=""><i class="fas fa-history"></i></button>
                                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#ver-info-venta"><i class="fas fa-info-circle"></i></button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<div class="modal fade" id="ver-info-venta" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <p>One fine body…</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>