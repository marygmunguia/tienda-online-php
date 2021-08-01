<?php

require_once 'conexionDB.php';

class ModeloCliente extends Conexion
{
    public static function mdlComprasRealizadas($tablaDB, $columna, $valor)
    {
        $pdo = Conexion::conectar()->prepare("SELECT * FROM $tablaDB WHERE $columna =:$columna");

        $pdo->bindParam(":" . $columna, $valor, pdo::PARAM_STR);

        $pdo->execute();

        return $pdo->fetchAll();
    }
}
