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
                            <table id="TB" class="table table-bordered table-striped text-center tablas">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
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
                                            <td><?php echo $value["fecha"];  ?></td>
                                            <td><?php echo $value["subtotal"];  ?></td>
                                            <td><?php echo $value["isv"];  ?></td>
                                            <td><?php echo $value["total"];  ?></td>
                                            <td><?php echo $value["estado"];  ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-flat cambiar-estado-venta" id="<?php echo $value["idventa"] ?>" data-toggle="modal" data-target="#cambiar-estado-venta"><i class="fas fa-history"></i></button>
                                                <button type="button" class="btn btn-info btn-flat ver-detalle-venta" id="<?php echo $value["idventa"] ?>" data-toggle="modal" data-target="#ver-info-venta"><i class="fas fa-info-circle"></i></button>
                                                <button type="button" class="btn btn-primary btn-flat imprimir-factura" id="<?php echo $value["idventa"] ?>"><i class="fas fa-print"></i></button>
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
                <h4>INFORMACIÓN DE LA VENTA</h4>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="idventa">ID de Venta:</label>
                            <input id="idventa" class="form-control" type="text" disabled>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="fechaventa">Fecha de venta:</label>
                            <input id="fechaventa" class="form-control" type="text" disabled>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="estadoventa">Estado de la venta:</label>
                            <input id="estadoventa" class="form-control" type="text" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="cliente">Nombre del cliente:</label>
                            <input id="cliente" class="form-control" type="text" disabled>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="emailCliente">Email del cliente:</label>
                            <input id="emailCliente" class="form-control" type="text" disabled>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <h3 class="text-center p-2">Detalle de Venta</h3>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detalleVenta">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="subtotal">Subtotal</label>
                        </div>
                        <div class="form-group"><label for="isv">ISV</label></div>
                        <div class="form-group"><label for="total">Total</label></div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <input id="subtotal" class="form-control-sm" type="text" disabled>
                        </div>
                        <div class="form-group">
                            <input id="isv" class="form-control-sm" type="text" disabled>
                        </div>
                        <div class="form-group">
                            <input id="total" class="form-control-sm" type="text" disabled>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Imprimir Factura</button>
                <button type="button" class="btn  btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="cambiar-estado-venta" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <h4>CAMBIAR ESTADO DE LA VENTA</h4>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger">Aceptar</button>
            </div>
        </div>
    </div>
</div>