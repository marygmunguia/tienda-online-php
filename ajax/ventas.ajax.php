<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class AjaxVentas
{
    public $idventa;

    public function ventasAjax()
    {

        $item = "idventa";
        $valor = $this->idventa;

        $respuesta = ControladorVentas::ctrConsultarVentas($item, $valor);

        echo json_encode($respuesta);
    }
}


if (isset($_POST["idventa"])) {
    $eS = new AjaxVentas();
    $eS->idventa = $_POST["idventa"];
    $eS->ventasAjax();
}
