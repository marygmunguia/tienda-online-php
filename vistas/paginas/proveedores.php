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
                            <th>RTN</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono fijo</th>
                            <th>Sitio Web</th>
                            <th>Nombre del Contacto</th>
                            <th>Email del Contacto</th>
                            <th>Teléfono Celular Contacto</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $columna = null;
                        $valor = null;

                        $resultado = ControladorProveedor::ctrMostrarProveedores($columna, $valor);

                        foreach ($resultado as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value["idproveedor"]; ?></td>
                                <td><?php echo $value["RTN"]; ?></td>
                                <td><?php echo $value["nombre"]; ?></td>
                                <td><?php echo $value["email"]; ?></td>
                                <td><?php echo $value["telefono"]; ?></td>
                                <td><?php echo $value["sitioWeb"]; ?></td>
                                <td><?php echo $value["nomContacto"]; ?></td>
                                <td><?php echo $value["emailContacto"]; ?></td>
                                <td><?php echo $value["celularContacto"]; ?></td>
                                <td>
                                    <center>
                                        <button type="button" class="btn btn-info btn-block EditarProveedor" id="<?php echo $value["idproveedor"]; ?>" data-toggle="modal" data-target="#EditarProveedor"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-secondary btn-block EliminarProveedor" id="<?php echo $value["idproveedor"]; ?>" data-toggle="modal" data-target="#EliminarProveedor"><i class="fas fa-trash-alt"></i></button>
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
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input id="email" class="form-control" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono Fijo</label>
                                <input id="telefono" class="form-control" type="text" name="telefono">
                            </div>
                            <div class="form-group">
                                <label for="sitioWeb">Sitio Web</label>
                                <input id="sitioWeb" class="form-control" type="text" name="sitioWeb">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="nomContacto">Nombre del Contacto</label>
                                <input id="nomContacto" class="form-control" type="text" name="nomContacto">
                            </div>

                            <div class="form-group">
                                <label for="emailContacto">Correo Electrónico del Contacto</label>
                                <input id="emailContacto" class="form-control" type="email" name="emailContacto">
                            </div>

                            <div class="form-group">
                                <label for="celularContacto">Teléfono Celular del Contacto</label>
                                <input id="celularContacto" class="form-control" type="text" name="celularContacto">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Guardar</button>
                </div>
                <?php

                $crearProveedor = new ControladorProveedor();
                $crearProveedor->ctrInsertarProveedor();

                ?>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="EditarProveedor" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Información Proveedor</h4>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">

                            <div class="form-group">
                                <input id="idproveedorE" class="form-control" type="hidden" name="idproveedorE" minlength="14" pattern="[0-9]+">
                            </div>
                            <div class="form-group">
                                <label for="rtnE">RTN</label>
                                <input id="rtnE" class="form-control" type="text" name="rtnE" minlength="14" pattern="[0-9]+">
                            </div>
                            <div class="form-group">
                                <label for="nombreE">Nombre</label>
                                <input id="nombreE" class="form-control" type="text" name="nombreE">
                            </div>
                            <div class="form-group">
                                <label for="emailE">Correo Electrónico</label>
                                <input id="emailE" class="form-control" type="email" name="emailE">
                            </div>
                            <div class="form-group">
                                <label for="telefonoE">Teléfono Fijo</label>
                                <input id="telefonoE" class="form-control" type="text" name="telefonoE">
                            </div>
                            <div class="form-group">
                                <label for="sitioWebE">Sitio Web</label>
                                <input id="sitioWebE" class="form-control" type="text" name="sitioWebE">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label for="nomContactoE">Nombre del Contacto</label>
                                <input id="nomContactoE" class="form-control" type="text" name="nomContactoE">
                            </div>

                            <div class="form-group">
                                <label for="emailContactoE">Correo Electrónico del Contacto</label>
                                <input id="emailContactoE" class="form-control" type="email" name="emailContactoE">
                            </div>

                            <div class="form-group">
                                <label for="celularContactoE">Teléfono Celular del Contacto</label>
                                <input id="celularContactoE" class="form-control" type="text" name="celularContactoE">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Aceptar</button>
                </div>
                <?php

                $actualizarProveedor = new ControladorProveedor();
                $actualizarProveedor -> ctrActualizarProveedor();

                ?>
            </form>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1" id="EliminarProveedor" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar proveedor del sistema</h5>
                </div>
                <div class="modal-body">
                    <p>¿Deseas eliminar definiticamente el registro?</p>
                    <br />

                    <input name="idproveedor" id="idproveedor" placeholder="" class="form-control" type="hidden">

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Eliminar nuevo</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>

                <?php

                $eliminarProveedor = new ControladorProveedor();
                $eliminarProveedor->ctrEliminarProveedor();

                ?>

            </form>
        </div>
    </div>
</div>