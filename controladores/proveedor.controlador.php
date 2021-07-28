<?php

class ControladorProveedor{

    static public function ctrMostrarProveedores($columna, $valor)
    {
        $tablaDB = "proveedores";

        $resultado = ModeloProveedor::mdlMostrarProveedores($tablaDB, $columna, $valor);

        return $resultado;
    }


}