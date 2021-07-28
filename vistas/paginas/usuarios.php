<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administración de usuarios de sistema</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#crearUsuario">
                    Agregar Nuevo Usuario
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped tablas" id="TB">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Tipo</th>
                            <th>Foto</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $columna = null;
                        $valor = null;

                        $resultado = ControladorUsuario::ctrMostrarUsuarios($columna, $valor);

                        foreach ($resultado as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value["idusuario"] ?></td>
                                <td><?php echo $value["nombre"] ?></td>
                                <td><?php echo $value["email"] ?></td>
                                <td>
                                    <?php if ($value["estado"] == "A") {
                                        echo '<button class="btn btn-primary btn-xs">Activo</button>';
                                    } else {
                                        echo '<button class="btn btn-secondary btn-xs">Inactivo</button>';
                                    } ?>
                                </td>
                                <td>
                                    <?php if ($value["tipo"] == "A") {
                                        echo '<button class="btn btn-primary btn-xs">Administrador</button>';
                                    } elseif ($value["tipo"] == "E") {
                                        echo '<button class="btn btn-info btn-xs">Empleado</button>';
                                    } else {
                                        echo '<button class="btn btn-success btn-xs">Cliente</button>';
                                    } ?>
                                </td>
                                <td>
                                    <center><img class="rounded-circle" src="<?php echo $value["imagen"] ?>" height="80px"> </center>
                                </td>
                                <td>
                                    <center>
                                        <button type="button" class="btn btn-info editarUsuario" id="<?php echo $value["idusuario"]; ?>" data-toggle="modal" data-target="#editarUsuario"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-secondary eliminarUsuario" idUsuario="<?php echo $value["idusuario"]; ?>" nombreU="<?php echo $value["nombre"]; ?>" data-toggle="modal" data-target="#eliminarUsuario"><i class="fas fa-trash-alt"></i></button>
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


<div class="modal" tabindex="-1" id="crearUsuario" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo usuario al sistema</h5>
                </div>
                <div class="modal-body">
                    <p>Complete todos los campos para realizar el registro.</p>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre completo" name="nombre" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="Correo Electrónico" name="email" id="emailValidar" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Contraseña" name="clave" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estado">Selecciona el estado del usuario:</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="0">Seleccionar una opción</option>
                            <option value="A">Activo</option>
                            <option value="I">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipo">Selecciona el tipo de acceso del usuario:</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option value="0">Seleccionar una opción</option>
                            <option value="A">Administrador</option>
                            <option value="E">Empleado</option>
                            <option value="C">Cliente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Seleccione la imagen en <span style="color: red;">formato .jpg o .png</span></label>
                        <input type="file" class="form-control-file border" name="imagenNueva" id="imagenNueva" class="imagenNueva" required>
                        <img src="vistas/img/default-150x150.png" class="img-thumbnail previsualizar" width="100px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Crear nuevo</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
        </div>

        <?php

        $crearUsuario = new ControladorUsuario();
        $crearUsuario->ctrCrearUsuario();

        ?>

        </form>
    </div>
</div>


<div class="modal" tabindex="-1" id="editarUsuario" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Editar usuario del sistema</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input name="idUsuarioE" id="idUsuarioE" placeholder="" class="form-control" type="text">
                        <input name="FotoActual" id="FotoActual" placeholder="" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre completo" name="nombreE" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="Correo Electrónico" name="emailE" id="emailUsuario" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estadoE">Selecciona el estado del usuario:</label>
                        <select name="estadoE" id="estadoE" class="form-control">
                            <option value="0">Seleccionar una opción</option>
                            <option value="A">Activo</option>
                            <option value="I">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipoE">Selecciona el tipo de acceso del usuario:</label>
                        <select name="tipoE" id="tipoE" class="form-control" required>
                            <option value="0">Seleccionar una opción</option>
                            <option value="A">Administrador</option>
                            <option value="E">Empleado</option>
                            <option value="C">Cliente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Seleccione la imagen en <span style="color: red;">formato .jpg o .png</span></label>
                        <input type="file" class="form-control-file border" name="imagenNuevaE" id="imagenNuevaE" class="imagenNuevaE" required>
                        <img src="vistas/img/default-150x150.png" class="img-thumbnail previsualizarE" width="100px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Aceptar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
        </div>

        <?php

        // $crearUsuario = new ControladorUsuario();
        // $crearUsuario->ctrCrearUsuario();

        ?>

        </form>
    </div>
</div>


<!-- MODAL ELIMINAR -->
<div class="modal" tabindex="-1" id="eliminarUsuario" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar usuario del sistema</h5>
                </div>
                <div class="modal-body">
                    <p>¿Deseas eliminar definiticamente el registro?</p>
                    <br />

                    <input name="idUsuario" id="idUsuario" placeholder="" class="form-control" type="hidden">
                    <input name="nombreU" id="nombreU" placeholder="" class="form-control" type="hidden">


                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Eliminar nuevo</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>

                <?php

                $eliminarUsuario = new ControladorUsuario();
                $eliminarUsuario->ctrEliminarUsuario();

                ?>

            </form>
        </div>
    </div>
</div>