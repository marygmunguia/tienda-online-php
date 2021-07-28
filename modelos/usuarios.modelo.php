<?php

require_once 'ConexionDB.php';

class ModeloUsuarios extends Conexion
{

    static public function mdlMostrarUsuarios($tabla, $columna, $valor)
    {

        if ($columna != null) {

            $pdo = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $columna = :$columna");

            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);

            $pdo->execute();

            return $pdo->fetch();
        } else {

            $pdo = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $pdo->execute();

            return $pdo->fetchAll();
        }
    }

    static public function mdlInsertarUsuario($tabla, $datosC)
    {
        $pdo = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, clave, estado, tipo, imagen) VALUES 
        (:nombre, :email, :clave, :estado, :tipo, :imagen)");

        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        $pdo->bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);
        $pdo->bindParam(":imagen", $datosC["imagen"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }

    static public function mdlEliminarUsuario($tablaDB, $id)
    {
        $pdo = Conexion::conectar()->prepare("DELETE FROM $tablaDB WHERE idusuario = :id");

        $pdo->bindParam(":id", $id, PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }

    static public function mdlActualizarUsuario($tablaDB, $datosC)
    {
        $pdo = Conexion::conectar()->prepare("UPDATE $tablaDB SET nombre = :nombre, 
        email = :email, estado = :estado, tipo = :tipo, imagen = :imagen WHERE idusuario = :id");

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        $pdo->bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);
        $pdo->bindParam(":imagen", $datosC["imagen"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }


}
