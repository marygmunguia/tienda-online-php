<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mi Perfil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <section class="content">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-3">
                            <div class="card card-widget widget-user-2">
                                <div class="widget-user-header bg-warning">
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="<?php echo $_SESSION["imagen"]; ?>" alt="User Avatar">
                                    </div>
                                    <h3 class="widget-user-username"><?php echo $_SESSION["nombre"]; ?></h3>
                                    <h5 class="widget-user-desc"><?php
                                                                    if ($_SESSION["tipo"] == "A") {
                                                                        echo "ADMINISTRADOR";
                                                                    } elseif ($_SESSION["tipo"] == "E") {
                                                                        echo "EMPLEADO";
                                                                    } else {
                                                                        echo "CLIENTE";
                                                                    } ?></h5>
                                </div>
                                <div class="card-footer p-0">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <center>
                                                <br />
                                                <button class="btn btn-secondary" style="color: #fff;" data-toggle="modal" data-target="#CambiarFoto">Cambiar fotografía</button>
                                                <br /><br />
                                            </center>
                                        </li>
                                        <li class="nav-item">
                                            <center>
                                                <br />
                                                <button class="btn btn-warning" style="color: #000;" data-toggle="modal" data-target="#CambiarClaveAcceso">
                                                    Cambiar contraseña</button>
                                                <br /><br />
                                            </center>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-9">
                            <div class="form-group">
                                <h4>Información principal</h4>
                            </div>
                            <div class="form-group">
                                <label>Nombre Completo</label>
                                <input type="text" class="form-control" placeholder="" value="<?php echo $_SESSION["nombre"]; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Correo Electrónico</label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION["usuario"]; ?>" placeholder="" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3"></div>
                        <div class="col-sm-12 col-lg-9">
                            <?php
                            $columna = 'idusuario';
                            $valor = $_SESSION["idusuario"];

                            $consulta = ControladorUsuario::ctrConsultarDireccion($columna, $valor);

                            if (empty($consulta) == false) {

                            ?>

                                <div class="form-group">
                                    <h4>Dirección en entraga principal</h4>
                                </div>
                                <div class="form-group">
                                    <label>Dirección (Linea 1)</label>
                                    <input type="text" class="form-control" value="<?php echo $consulta["direccion1"]; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Dirección (Linea 2)</label>
                                    <input type="text" class="form-control" value="<?php echo $consulta["direccion2"]; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Ciudad</label>
                                    <input type="text" class="form-control" value="<?php echo $consulta["ciudad"]; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Departamento</label>
                                    <input type="text" class="form-control" value="<?php echo $consulta["departemento"]; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>País</label>
                                    <select class="form-control" disabled>
                                        <option><?php echo $consulta["pais"]; ?></option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Teléfono</label>
                                            <input id="" class="form-control" type="text" value="<?php echo $consulta["telefono"]; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input id="" class="form-control" type="text" value="<?php echo $consulta["celular"]; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <center>
                                            <br />
                                            <button class="btn btn-secondary btn-block" style="color: #fff;" data-toggle="modal" data-target="#CambiarFoto">Actualizar Información</button>
                                            <br /><br />
                                        </center>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <center>
                                            <br />
                                            <button class="btn btn-warning btn-block" data-toggle="modal" data-target="#CambiarFoto">Eliminar Cuenta</button>
                                            <br /><br />
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>




<!-- CAMBIAR CLAVE DE ACCESO -->
<div class="modal fade" rol="dialog" id="CambiarClaveAcceso">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" role="form">

                <div class="modal-header">
                    <h3>Cambiar contreseña</h3>
                </div>

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña Actual:</label>
                            <input type="password" class="form-control" id="claveActual" name="claveActual" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña Nueva:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Repetir Contraseña Nueva:</label>
                            <input type="password" class="form-control" name="password1" id="password1" placeholder="">
                        </div>

                    </div>
                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-danger"> Guardar cambios</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
                </div>
                <?php

                ?>
            </form>
        </div>
    </div>
</div>

<!-- CAMBIAR FOTOGRAFÍA DE PERFIL -->
<div class="modal fade" rol="dialog" id="CambiarFoto">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h3>Cambiar Imagen de Perfil</h3>
                </div>

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">
                            <label for="">Seleccione la imagen recuerda que debe de ser <span style="color: red;">formato .jpg o .png</span></label>
                            <div class="form-group">
                                <input type="hidden" name="idUsuarioFoto" value="<?php echo $_SESSION["idusuario"]; ?>" />
                                <input type="file" class="form-control-file border" name="imagenNueva" id="imagenNueva" required>
                                <input type="hidden" name="fotoActual" value="<?php echo $_SESSION["imagen"]; ?>" />
                                <br /><br />
                                <img src="<?php echo $_SESSION["imagen"]; ?>" alt="" class="previsualizar" width="150px" height="150px">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"> Guardar cambios</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
                </div>
                <?php

                $cambiar = new ControladorUsuario();
                $cambiar->ctrCambiarFotoPerfil();

                ?>

            </form>
        </div>
    </div>
</div>