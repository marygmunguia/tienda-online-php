<?php

require_once "../controladores/producto.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProducto
{
    public $idproducto;

    public function productoAjax()
    {

        $item = "idproducto";
        $valor = $this->idproducto;

        $respuesta = ControladorProducto::ctrMostrarProducto($item, $valor);

        echo json_encode($respuesta);
    }
}


if (isset($_POST["idproducto"])) {
    $eS = new AjaxProducto();
    $eS->idproducto = $_POST["idproducto"];
    $eS->productoAjax();
}
