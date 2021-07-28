<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administración de registro de Proveedores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Proveedores</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-danger card-outline">
            <div class="card-body">
                <div class="form-group">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#agregarProveedor">
                        Agregar nuevo proveedor
                    </button>
                </div>
                <table class="table table-bordered table-striped tablas" id="TB">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>Costo</th>
                            <th>Incluye impuesto</th>
                            <th>Stock</th>
                            <th>Estado</th>
                            <th>Imagen</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $columna = null;
                        $valor = null;

                        $resultado = ControladorProducto::ctrMostrarProducto($columna, $valor);

                        foreach ($resultado as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value["idproducto"]; ?></td>
                                <td><?php echo $value["nombre"]; ?></td>
                                <td>
                                    <?php

                                    $columna = "idcategoria";
                                    $valor = $value["idcategoria"];

                                    $resultado = ControladorCategoria::ctrMostrarCategorias($columna, $valor);

                                    echo $resultado["nombre"];
                                    ?>
                                </td>
                                <td><?php echo $value["precio"]; ?></td>
                                <td><?php echo $value["costo"]; ?></td>
                                <td><?php
                                    if ($value["isv"] == "S") {
                                        echo 'Si, impuestos incluidos';
                                    } else {
                                        echo 'No, impuestos no incluidos';
                                    }

                                    ?></td>
                                <td><?php echo $value["stock"]; ?></td>
                                <td><?php
                                    if ($value["estado"] == "N") {
                                        echo 'Normal';
                                    } else {
                                        echo 'Descontinuado';
                                    }
                                    ?></td>
                                <td>
                                    <center><img class="rounded-circle" src="<?php echo $value["imagen"]; ?>" height="80px"> </center>
                                </td>
                                <td>
                                    <center>
                                        <button type="button" class="btn btn-info editarProducto" id="<?php echo $value["idproducto"]; ?>" data-toggle="modal" data-target="#editarProducto"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-secondary eliminarProducto" id="<?php echo $value["idproducto"]; ?>" data-toggle="modal" data-target="#eliminarProducto"><i class="fas fa-trash-alt"></i></button>
                                    </center>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>


<div class="modal fade" id="agregarProveedor" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar Nuevo Proveedor</h4>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">

                        <div class="form-group">
                            <label for="rtn">RTN</label>
                            <input id="rtn" class="form-control" type="text" name="rtn" minlength="14" pattern="[0-9]+">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre">
                        </div>

                        </div>
                        <div class="col-lg-6 col-sm-12"></div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Guardar</button>
                </div>
                <?php



                ?>
            </form>
        </div>
    </div>
</div>