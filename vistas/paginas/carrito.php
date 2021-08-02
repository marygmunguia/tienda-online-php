<?php

include 'vistas/paginas/tienda/menu-tienda.php';

?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="container-fluid p-4">
          <div class="invoice p-3 mb-3">
            <h3>Mi Carrito</h3>
            <?php

            if (isset($_SESSION["carrito"]) and count($_SESSION["carrito"]) > 0) {
            ?>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($_SESSION["carrito"] as $key => $valor) {
                      ?>
                        <tr>
                          <td>
                            <center><?php echo $valor['id'] ?></center>
                          </td>
                          <td><?php echo $valor['nombre'] ?></td>
                          <td>
                            <center><img class="rounded-circle" width="60px" src="<?php echo $valor['imagen'] ?>"></center>
                          </td>
                          <td>
                            <center><?php echo $valor['precio'] ?> Lps.</center>
                          </td>
                          <td>
                            <center><?php echo $valor['cantidad'] ?></center>
                          </td>
                          <td>
                            <center><?php echo $valor['total'] ?> Lps.</center>
                          </td>
                          <td>
                            <center><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#eliminarCarrito" id="eliminarProducto" onclick="EliminarCarrito(<?php echo $valor['id'] ?>)"><i class="fas fa-trash-alt"></i></button></center>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-6">
                  <p class="lead">Métodos de Pago:</p> 
                  <img src="vistas/img/paypal.png" alt="Paypal" width="80px">&nbsp;
                 <!--  <img src="vistas/img/efectivo.png" alt="Efectivo" width="60px"> -->

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    No olvides revisar nuestras políticas de compra <a href="#">aquí</a>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Detalles de Pago:</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?php echo $_SESSION["subtotal"]; ?> Lps</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Impuesto sobre venta:</th>
                        <td><?php echo number_format($_SESSION["isv"], 2); ?> Lps</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Total a Pagar:</th>
                        <td><?php echo $_SESSION["total"]; ?> Lps</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>

              <div class="row no-print">
                <div class="col-12">
                  <a href="direccion" class="btn btn-success btn-block float-right"><i class="far fa-credit-card"></i>  Completar Compra
                    </a>
                </div>
              </div>
            <?php

            } else {
            
            ?>

              <div class="alert alert-secondary" role="alert">
                No hay produtos en el carrito. <a href="tienda">Regresar a la tienda.</a>
              </div>

            <?php
            }

            ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>





<div id="eliminarCarrito" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <div class="modal-header">

          <h4 class="modal-title">Eliminar produto del carrito de compras</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">

          <div class="box-body">

            <p>¿Estás seguro que deseas eliminar este producto del carrito de compras?</p>

            <input type="hidden" name="idproductoDelete" id="idproductoDelete">


          </div>

        </div>

        <div class="modal-footer">

          <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-danger">Aceptar</button>

        </div>
        <?php

        $deleteCarrito = new ControladorCarrito();
        $deleteCarrito->DeleteCarrito();
        ?>

      </form>

    </div>

  </div>

</div>