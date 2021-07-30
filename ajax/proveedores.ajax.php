<?php

require_once "../controladores/proveedor.controlador.php";
require_once "../modelos/proveedores.modelo.php";

class AjaxProveedores
{
    public $idproveedor;

    public function proveedoresAjax()
    {

        $item = "idproveedor";
        $valor = $this->idproveedor;

        $respuesta = ControladorProveedor::ctrMostrarProveedores($item, $valor);

        echo json_encode($respuesta);
    }
}


if (isset($_POST["idproveedor"])) {
    $eS = new AjaxProveedores();
    $eS->idproveedor = $_POST["idproveedor"];
    $eS->proveedoresAjax();
}
