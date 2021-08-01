<?php

include 'vistas/paginas/tienda/menu-tienda.php';

?>
<div class="container-fluid pt-4 pb-1 pr-5 pl-5">
    <label for="buscar">Buscar producto:</label>
    <input type="text" id="buscar" class="form-control form-control">
    <br><br><br>

    <div class="row" id="producto">
    </div>

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

</div>