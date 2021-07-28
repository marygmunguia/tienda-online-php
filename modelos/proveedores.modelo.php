<?php

class ModeloProveedor{

    public static function mdlMostrarProveedores($tablaDB, $columna, $valor)
    {
        if ($columna == null) {

            $pdo = Conexion::conectar()->prepare("SELECT * FROM $tablaDB");

            $pdo->execute();

            return $pdo->fetchAll();
        } else {
            $pdo = Conexion::conectar()->prepare("SELECT * FROM $tablaDB WHERE $columna =:$columna");

            $pdo->bindParam(":" . $columna, $valor, pdo::PARAM_STR);

            $pdo->execute();

            return $pdo->fetch();
        }
    }

}