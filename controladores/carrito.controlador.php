<?php

class ControladorCarrito
{

    static public function AddCarrito()
    {

        if (isset($_POST["idproductoAdd"])) {

            $isv = 0.15;

            $columna = "idproducto";
            $valor = $_POST["idproductoAdd"];

            $consulta = ControladorProducto::ctrMostrarProducto($columna, $valor);

            if (!isset($_SESSION['carrito'])) {

                $precio = $consulta["precio"];
                $cantidad = $_POST["cantidad"];

                $totalProducto = $precio * $cantidad;

                $carrito = array(
                    'id' => $_POST["idproductoAdd"],
                    'nombre' => $consulta["nombre"],
                    'imagen' => $consulta["imagen"],
                    'precio' => $precio,
                    'cantidad' => $cantidad,
                    'total' => number_format($totalProducto, 2)
                );

                $_SESSION["carrito"][0] = $carrito;

                $isvP = $totalProducto * $isv;
                $subtotal = $totalProducto - $isvP;

                $_SESSION["total"] = $totalProducto;
                $_SESSION["isv"] = $isvP;
                $_SESSION["subtotal"] = $subtotal;

                echo '<script>

swal({
    type: "success",
    title: "Haz añadido tu producto al carrito correctamente",
    showConfirmButton: true,
    confirmButtonText: "Cerrar"
    }).then(function(result){
        if (result.value) {
            window.location = "tienda";
        }
    })
</script>';
            } else {

                $totalProductos = count($_SESSION["carrito"]);

                $precio = $consulta["precio"];
                $cantidad = $_POST["cantidad"];

                $totalProducto1 = $precio * $cantidad;

                $carrito = array(
                    'id' => $_POST["idproductoAdd"],
                    'nombre' => $consulta["nombre"],
                    'imagen' => $consulta["imagen"],
                    'precio' => $precio,
                    'cantidad' => $cantidad,
                    'total' => number_format($totalProducto1, 2)
                );

                $_SESSION["carrito"][$totalProductos] = $carrito;


                $_SESSION["total"] = $_SESSION["total"] + $totalProducto1;

                $_SESSION["isv"]  = $_SESSION["isv"]  + ($totalProducto1 * $isv);

                $_SESSION["subtotal"]  = $_SESSION["subtotal"]  + ($totalProducto1 - ($totalProducto1 * $isv));


                echo '<script>

swal({
    type: "success",
    title: "Haz añadido tu producto al carrito correctamente",
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
    }


    static public function DeleteCarrito()
    {

        $isv = 0.15;

        if (isset($_POST["idproductoDelete"])) {

            $idproducto = $_POST["idproductoDelete"];

            foreach ($_SESSION["carrito"] as $key => $valor) {

                if ($valor['id'] ==  $idproducto) {

                    $_SESSION["total"] = $_SESSION["total"] - ($valor['precio'] * $valor['cantidad']);

                    $_SESSION["isv"]  = $_SESSION["isv"]  - (($valor['precio'] * $valor['cantidad']) * $isv);

                    $_SESSION["subtotal"]  = $_SESSION["subtotal"]  - (($valor['precio'] * $valor['cantidad']) - (($valor['precio'] * $valor['cantidad']) * $isv));

                    unset($_SESSION["carrito"][$key]);

                    echo '<script>

                    swal({
                        type: "success",
                        title: "Haz eliminado tu producto del carrito correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if (result.value) {
                                window.location = "carrito";
                            }
                        })
                    </script>';
                }
            }
        }
    }
}
