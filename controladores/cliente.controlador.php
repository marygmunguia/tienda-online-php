<?php

class ControladorCliente
{
    public static function ctrComprasRealizadas($columna, $valor)
    {
        $tablaDB = "ventas";

        $resultado = ModeloCliente::mdlComprasRealizadas($tablaDB, $columna, $valor);

        return $resultado;
    }
}
