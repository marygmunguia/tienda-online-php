<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestión de productos en Inventario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Productos</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-danger card-outline">
            <div class="card-body">
                <div class="form-group">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#agregarProducto">
                        Agregar nuevo producto
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


<div class="modal fade" id="agregarProducto" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registrar Nuevo Producto</h4>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombre"><span style="color:red;"> * </span>Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="idcategoria"><span style="color:red;"> * </span>Categoría</label>
                                <select name="idcategoria" id="idcategoria" class="form-control">
                                    <?php
                                    $columna = null;
                                    $valor = null;
                                    $consulta = ControladorCategoria::ctrMostrarCategorias($columna, $valor);
                                    foreach ($consulta as $key => $valor) {
                                    ?>
                                        <option value="<?php echo $valor["idcategoria"]; ?>"><?php echo $valor["nombre"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="precio"><span style="color:red;"> * </span>Precio</label>
                                    <input id="precio" class="form-control" type="number" step="0.01" name="precio">
                                </div>
                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="costo"><span style="color:red;"> * </span>Costo</label>
                                    <input id="costo" class="form-control" type="number" step="0.01" name="costo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="idproveedor"><span style="color:red;"> * </span>Proveedor</label>
                                <select name="idproveedor" id="idproveedor" class="form-control">
                                    <?php
                                    $columna = null;
                                    $valor = null;
                                    $consulta = ControladorProveedor::ctrMostrarProveedores($columna, $valor);
                                    foreach ($consulta as $key => $valor) {
                                    ?>
                                        <option value="<?php echo $valor["idproveedor"]; ?>"><?php echo $valor["nombre"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="isv"><span style="color:red;"> * </span>ISV</label>
                                <select name="isv" id="isv" class="form-control">
                                    <option value="S">Impuesto incluido</option>
                                    <option value="N">Impuesto NO incluido</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stock"><span style="color:red;"> * </span>Stock</label>
                                <input id="stock" class="form-control" type="number" name="stock">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado" class="form-control">
                                    <option value="N">Normal</option>
                                    <option value="D">Descontinuado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="codigoBarras">Código de Barras</label>
                                <input id="codigoBarras" class="form-control" type="text" name="codigoBarras">
                            </div>
                            <div class="form-group">
                                <label>Seleccione la imagen en <span style="color: red;">formato .jpg o .png</span></label>
                                <input type="file" class="form-control-file border" name="imagenProducto" id="imagenProducto" class="imagenProducto" required>
                                <img src="vistas/img/default-150x150.png" class="img-thumbnail previsualizarP" width="100px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Guardar</button>
                </div>
                <?php

                $crearProducto = new ControladorProducto();
                $crearProducto->ctrIngresarProducto();

                ?>
            </form>
        </div>
    </div>
</div>


<div class="modal" tabindex="-1" id="eliminarProducto" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar producto del sistema</h5>
                </div>
                <div class="modal-body">
                    <p>¿Deseas eliminar definiticamente el registro?</p>
                    <br />

                    <input name="idproductoDelete" id="idproductoDelete" placeholder="" class="form-control" type="hidden">

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Eliminar nuevo</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>

                <?php

                $eliminar = new ControladorProducto();
                $eliminar->ctrEliminarProducto();

                ?>

            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editarProducto" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar información de Producto</h4>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <input name="idproducto" id="idproducto" placeholder="" class="form-control" type="hidden">
                            <input name="imagenActual" id="imagenActual" placeholder="" class="form-control" type="hidden">
                            <div class="form-group">
                                <label for="nombreE"><span style="color:red;"> * </span>Nombre</label>
                                <input id="nombreE" class="form-control" type="text" name="nombreE" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcionE">Descripción</label>
                                <textarea class="form-control" name="descripcionE" id="descripcionE" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="idcategoriaE"><span style="color:red;"> * </span>Categoría</label>
                                <select name="idcategoriaE" id="idcategoriaE" class="form-control">
                                    <?php
                                    $columna = null;
                                    $valor = null;
                                    $consulta = ControladorCategoria::ctrMostrarCategorias($columna, $valor);
                                    foreach ($consulta as $key => $valor) {
                                    ?>
                                        <option value="<?php echo $valor["idcategoria"]; ?>"><?php echo $valor["nombre"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="precioE"><span style="color:red;"> * </span>Precio</label>
                                    <input id="precioE" class="form-control" type="number" step="0.01" name="precioE">
                                </div>
                                <div class="form-group col-sm-12 col-lg-6">
                                    <label for="costoE"><span style="color:red;"> * </span>Costo</label>
                                    <input id="costoE" class="form-control" type="number" step="0.01" name="costoE">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="idproveedorE"><span style="color:red;"> * </span>Proveedor</label>
                                <select name="idproveedorE" id="idproveedorE" class="form-control">
                                    <?php
                                    $columna = null;
                                    $valor = null;
                                    $consulta = ControladorProveedor::ctrMostrarProveedores($columna, $valor);
                                    foreach ($consulta as $key => $valor) {
                                    ?>
                                        <option value="<?php echo $valor["idproveedor"]; ?>"><?php echo $valor["nombre"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="isvE"><span style="color:red;"> * </span>ISV</label>
                                <select name="isvE" id="isvE" class="form-control">
                                    <option value="S">Impuesto incluido</option>
                                    <option value="N">Impuesto NO incluido</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stockE"><span style="color:red;"> * </span>Stock</label>
                                <input id="stockE" class="form-control" type="number" name="stockE">
                            </div>
                            <div class="form-group">
                                <label for="estadoE">Estado</label>
                                <select name="estadoE" id="estadoE" class="form-control">
                                    <option value="N">Normal</option>
                                    <option value="D">Descontinuado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="codigoBarrasE">Código de Barras</label>
                                <input id="codigoBarrasE" class="form-control" type="text" name="codigoBarrasE">
                            </div>
                            <div class="form-group">
                                <label>Seleccione la imagen en <span style="color: red;">formato .jpg o .png</span></label>
                                <input type="file" class="form-control-file border" name="imagenProductoE" id="imagenProductoE" class="imagenProductoE">
                                <img src="" class="img-thumbnail previsualizarE" id="previsualizarE" width="100px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Guardar</button>
                </div>
                <?php

                $editar = new ControladorProducto();
                $editar->ctrEditarProducto();

                ?>
            </form>
        </div>
    </div>
</div>