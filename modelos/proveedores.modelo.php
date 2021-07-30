<?php

require_once 'ConexionDB.php';

class ModeloProveedor extends Conexion{

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

    static public function mdlInsertarProveedor($tabla, $datosC)
    {
        $pdo = Conexion::conectar()->prepare("INSERT INTO $tabla(RTN, nombre, email, telefono, sitioWeb, nomContacto, emailContacto, celularContacto) VALUES 
        (:RTN, :nombre, :email, :telefono, :sitioWeb, :nomContacto, :emailContacto, :celularContacto)");

        $pdo->bindParam(":RTN", $datosC["RTN"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo->bindParam(":sitioWeb", $datosC["sitioWeb"], PDO::PARAM_STR);
        $pdo->bindParam(":nomContacto", $datosC["nomContacto"], PDO::PARAM_STR);
        $pdo->bindParam(":emailContacto", $datosC["emailContacto"], PDO::PARAM_STR);
        $pdo->bindParam(":celularContacto", $datosC["celularContacto"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }


    static public function mdlActualizarProveedor($tablaDB, $datosC)
    {
        $pdo = Conexion::conectar()->prepare("UPDATE $tablaDB SET RTN = :RTN, nombre = :nombre, email = :email, 
        telefono = :telefono, sitioWeb = :sitioWeb, nomContacto = :nomContacto, emailContacto = :emailContacto, 
        celularContacto = :celularContacto WHERE idproveedor = :id");

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_STR);
        $pdo->bindParam(":RTN", $datosC["RTN"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo->bindParam(":sitioWeb", $datosC["sitioWeb"], PDO::PARAM_STR);
        $pdo->bindParam(":nomContacto", $datosC["nomContacto"], PDO::PARAM_STR);
        $pdo->bindParam(":emailContacto", $datosC["emailContacto"], PDO::PARAM_STR);
        $pdo->bindParam(":celularContacto", $datosC["celularContacto"], PDO::PARAM_STR);
        
    
        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }

    static public function ctrEliminarProveedor($tablaDB, $id)
    {
        $pdo = Conexion::conectar()->prepare("DELETE FROM $tablaDB WHERE idproveedor = :id");

        $pdo->bindParam(":id", $id, PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }

}