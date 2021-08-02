<?php

require_once 'conexionDB.php';

class ModeloProducto extends Conexion
{
    public static function mdlMostrarProductos($tablaDB, $columna, $valor)
    {
        if ($columna == null) {

            $pdo = Conexion::conectar()->prepare("SELECT * FROM $tablaDB ORDER BY rand()");

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

        $pdo = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, descripcion, idcategoria, precio, costo, isv, stock, estado, imagen, codigo_barras, idproveedor)
         VALUES (:nombre, :descripcion, :idcategoria, :precio, :costo, :isv, :stock, :estado, :imagen, :codigobarras, :idproveedor)");

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
        $pdo->bindParam(":idproveedor", $datos["idproveedor"], PDO::PARAM_STR);

        if ($pdo->execute()) {

            return true;
        } else {

            return false;
        }
    }


    static public function mdlEliminarProducto($tablaDB, $id)
    {

        $pdo = Conexion::conectar()->prepare("DELETE FROM $tablaDB WHERE idproducto = :id");

        $pdo->bindParam(":id", $id, PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }

    static public function mdlActualizarProducto($tablaDB, $datosC)
    {
        $pdo = Conexion::conectar()->prepare("UPDATE $tablaDB SET nombre = :nombre, descripcion = :descripcion, 
        idcategoria = :idcategoria, precio = :precio, costo = :costo, isv =:isv, stock=:stock, estado=:estado, 
        imagen=:imagen, codigo_barras = :codigoBarras, idproveedor =:idproveedor WHERE idproducto = :id");

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":descripcion", $datosC["descripcion"], PDO::PARAM_STR);
        $pdo->bindParam(":idcategoria", $datosC["idcategoria"], PDO::PARAM_STR);
        $pdo->bindParam(":precio", $datosC["precio"], PDO::PARAM_STR);
        $pdo->bindParam(":costo", $datosC["costo"], PDO::PARAM_STR);
        $pdo->bindParam(":isv", $datosC["isv"], PDO::PARAM_STR);
        $pdo->bindParam(":stock", $datosC["stock"], PDO::PARAM_STR);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        $pdo->bindParam(":imagen", $datosC["imagen"], PDO::PARAM_STR);
        $pdo->bindParam(":codigoBarras", $datosC["codigoBarras"], PDO::PARAM_STR);
        $pdo->bindParam(":idproveedor", $datosC["idproveedor"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
