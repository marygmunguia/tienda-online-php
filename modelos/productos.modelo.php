<?php

require_once 'conexionDB.php';

class ModeloProducto extends Conexion
{
    public static function mdlMostrarProductos($tablaDB, $columna, $valor)
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

    static public function mdlIngresarProducto($tabla, $datos)
    {

        $pdo = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, descripcion, idcategoria, precio, costo, isv, stock, estado, imagen, codigo_barras)
         VALUES (:nombre, :descripcion, :idcategoria, :precio, :costo, :isv, :stock, :estado, :imagen, :codigobarras)");

        $pdo->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $pdo->bindParam(":idcategoria", $datos["idcategoria"], PDO::PARAM_STR);
        $pdo->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        $pdo->bindParam(":costo", $datos["costo"], PDO::PARAM_STR);
        $pdo->bindParam(":isv", $datos["isv"], PDO::PARAM_STR);
        $pdo->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
        $pdo->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $pdo->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $pdo->bindParam(":codigobarras", $datos["codigobarras"], PDO::PARAM_STR);

        if ($pdo->execute()) {

            return true;
        } else {

            return false;
        }
    }
}
