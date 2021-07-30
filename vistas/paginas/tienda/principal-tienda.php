<div class="container-fluid p-5">
    <div class="jumbotron" style="background-image: url('vistas/img/photo1.png');">
        <h1 class="text-white">Nuestros Productos</h1>
        <p class="text-white">Todo lo que necesitas al alcance de tus manos.</p>
    </div>

    <div class="row">
        <?php

        $columna = null;
        $valor = null;

        $consulta = ControladorProducto::ctrMostrarProducto($columna, $valor);

        foreach ($consulta as $key => $values) {

            $item = "idcategoria";
            $id = $values["idcategoria"];

            $respuesta = ControladorCategoria::ctrMostrarCategorias($item, $id);

        ?>

            <div class="col-sm-3">
                <div class="card" style="width:300px;">
                    <img class="card-img-top" src="<?php echo $values["imagen"]; ?>" alt="<?php echo $values["nombre"]; ?>" width="150px">
                    <div class="card-body">
                        <div class="pb-2"><span class="badge badge-dark"> <?php echo $respuesta["nombre"]; ?></span></div>
                        <h4 class="card-title"><?php echo $values["nombre"]; ?></h4><br>
                        <div class="pt-3">
                            <p>Precio: <b class="text-danger"><?php echo $values["precio"]; ?> Lps</b></p>
                        </div>
                        <div class="pt-2"></div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-danger" data-toggle="modal" data-target="#agregarCarrito" onclick="AgregarCarrito(<?php echo $values['idproducto']; ?>)">
                            <i class="fa fa-shopping-cart"></i> Agregar al carrito </button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<script>



</script>

<div id="agregarCarrito" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <div class="modal-header">

                    <h4 class="modal-title">Carrito de compras</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <div class="modal-body">

                    <div class="box-body">

                        <p>¿Cuantas unidades deseas añadir al carrito?</p>

                        <input type="hidden" name="idproductoAdd" id="idproductoAdd">
                        <div class="form-group">
                            <input type="number" class="form-control" value="1" min="1" name="cantidad" id="cantidad">
                        </div>


                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-danger">Aceptar</button>

                </div>
                <?php

                $addCarrito = new ControladorCarrito();
                $addCarrito->AddCarrito();

                ?>

            </form>

        </div>

    </div>

</div>