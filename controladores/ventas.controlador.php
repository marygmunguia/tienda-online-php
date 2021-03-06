<?php

class ControladorVentas
{

    static public function ctrCrearVenta()
    {

        $fecha = date('Y-m-d');
        $tablaVenta = "ventas";

        $idTransaccion = $_SESSION["IdTransaccion"];

        $datos = array(
            "ClaveTransaccion" => session_id(),
            "paypalDatos" => $idTransaccion,
            "idusuario" => $_SESSION["idusuario"],
            "fecha" => $fecha,
            "subtotal" => $_SESSION["subtotal"],
            "isv" => $_SESSION["isv"],
            "total" => $_SESSION["total"],
            "estado" => "PROCESADA"
        );

        $respuesta = ModeloVentas::mdlIngresarVenta($tablaVenta, $datos);

        $column = "paypalDatos";
        $value = $idTransaccion;

        $ventas = ModeloVentas::mdlConsultaVenta($tablaVenta, $column, $value);

        if ($respuesta == true) {

            if (isset($_SESSION["carrito"]) && count($_SESSION["carrito"]) > 0) {

                foreach ($_SESSION["carrito"] as $key => $productos) {

                    $tablaProductos = "productos";

                    $item = "idproducto";
                    $valor = $productos["id"];

                    $traerProducto = ModeloProducto::mdlMostrarProductos($tablaProductos, $item, $valor);

                    $valor1a = $traerProducto["stock"] - $productos["cantidad"];

                    $restarStock = ModeloVentas::mdlActualizarProducto($tablaProductos, $valor1a, $valor);

                    if ($restarStock == true) {

                        $tablaDetalle = "detallesventas";

                        $datosProducto = array(
                            "idventa" => $ventas["idventa"],
                            "idproducto" => $productos["id"],
                            "cantidad" => $productos["cantidad"],
                            "precio" => $productos["precio"],
                            "total" => $productos["total"]
                        );

                        $ventaProducto = ModeloVentas::mdlIngresarProductoVendido($tablaDetalle, $datosProducto);

                    }
                }
            }

            unset($_SESSION["carrito"]);
            unset($_SESSION["subtotal"]);
            unset($_SESSION["isv"]);
            unset($_SESSION["total"]);

            echo '<script>

            swal({
                  type: "success",
                  title: "Tu compra ha sido procesada con ??xito!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "tienda";

                            }
                        })

            </script>';
        } else {

            echo '<script>

            swal({
                  type: "success",
                  title: "Tu compra NO ha sido procesada con ??xito comunicate con info@allonlinehn.com!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "tienda";

                            }
                        })

            </script>';
        }
    }


    static public function ctrConsultarVentas($columna, $valor)
    {

        $tablaDB = "ventas_realizadas";

        $resultado = ModeloVentas::mdlConsultaVenta($tablaDB, $columna, $valor);

        return $resultado;
    }

    static public function ctrConsultarVenta($columna, $valor)
    {

        $tablaDB = "ventas";

        $resultado = ModeloVentas::mdlConsultaVenta($tablaDB, $columna, $valor);

        return $resultado;
    }


    static public function ctrConsultarDetalleVentas($columna, $valor)
    {

        $tablaDB = "detalle_ventas_realizadas";

        $resultado = ModeloVentas::mdlConsultarDetalleVentas($tablaDB, $columna, $valor);

        return $resultado;
    }

    static public function ctrProductosMasVendidos($tablaDB)
    {

        $resultado = ModeloVentas::mdlProductosMasVendidos($tablaDB);

        return $resultado;
    }
}
