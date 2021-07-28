<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administración de categorias de producto</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Categorias</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#crearCategoria">
                    Agregar Nueva Categoria
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped tablas" id="TB">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $columna = null;
                        $valor = null;

                        $resultado = ControladorCategoria::ctrMostrarCategorias($columna, $valor);

                        foreach ($resultado as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value["idcategoria"] ?></td>
                                <td><?php echo $value["nombre"] ?></td>
                                <td>
                                    <center>
                                        <button type="button" class="btn btn-info editarCategoria" id="<?php echo $value["idcategoria"]; ?>" nombre="<?php echo $value["nombre"]; ?>" data-toggle="modal" data-target="#editarCategoria"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-secondary eliminarCategoria" id="<?php echo $value["idcategoria"]; ?>" data-toggle="modal" data-target="#eliminarCategoria"><i class="fas fa-trash-alt"></i></button>
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


<div class="modal" tabindex="-1" id="crearCategoria" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nueva categoria al sistema</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-th"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre de categoria" name="nombre" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Crear nueva</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
        </div>

        <?php

        $crearCategoria = new ControladorCategoria();
        $crearCategoria->ctrInsertarCategoria();

        ?>

        </form>
    </div>
</div>




<div class="modal" tabindex="-1" id="editarCategoria" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Editar categoria del sistema</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-th"></i></span>
                            </div>
                            <input type="hidden" class="form-control" id="idcategoriaE" name="idcategoriaE" required>
                            <input type="text" class="form-control" id="nombreE" placeholder="Nombre de categoria" name="nombreE" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Aceptar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
        </div>

        <?php

        $editarCategoria = new ControladorCategoria();
        $editarCategoria->ctrEditarCategoria();

        ?>

        </form>
    </div>
</div>



<div class="modal" tabindex="-1" id="eliminarCategoria" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar categoria del sistema</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p>¿Estás seguro que deseas eliminar el registro?</p>
                        <input type="hidden" class="form-control" id="idcategoria" name="idcategoria" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Aceptar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
        </div>

        <?php

        $eliminarCategoria = new ControladorCategoria();
        $eliminarCategoria->ctrEliminarCategoria();

        ?>

        </form>
    </div>
</div>