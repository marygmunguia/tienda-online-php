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
        $pdo = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, clave, estado, tipo, imagen, fecha_registro) VALUES 
        (:nombre, :email, :clave, :estado, :tipo, :imagen, :fecha_registro)");

        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        $pdo->bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);
        $pdo->bindParam(":imagen", $datosC["imagen"], PDO::PARAM_STR);
        $pdo->bindParam(":fecha_registro", $datosC["fecha"], PDO::PARAM_STR);

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
        email = :email, estado = :estado, tipo = :tipo, imagen = :imagen WHERE idusuario = :idUsuario");

        $pdo->bindParam(":idUsuario", $datosC["idUsuario"], PDO::PARAM_INT);
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

     static public function mdlCambiarFotoPerfil($tablaDB, $id, $ruta)
    {
        $pdo = Conexion::conectar()->prepare("UPDATE $tablaDB SET imagen = :imagen WHERE idusuario = :idUsuario");

        $pdo->bindParam(":idUsuario", $id, PDO::PARAM_INT);
        $pdo->bindParam(":imagen", $ruta, PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }


    static public function mdlIngresarDireccion($tablaDB, $datosC)
    {

        $pdo = Conexion::conectar()->prepare("INSERT INTO $tablaDB(idusuario, direccion1, direccion2, ciudad, departemento, pais, telefono, celular) VALUES 
        (:idusuario, :direccion1, :direccion2, :ciudad, :departemento, :pais, :telefono, :celular)");

        $pdo->bindParam(":idusuario", $datosC["idusuario"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion1", $datosC["direccion1"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion2", $datosC["direccion2"], PDO::PARAM_STR);
        $pdo->bindParam(":ciudad", $datosC["ciudad"], PDO::PARAM_STR);
        $pdo->bindParam(":departemento", $datosC["departemento"], PDO::PARAM_STR);
        $pdo->bindParam(":pais", $datosC["pais"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo->bindParam(":celular", $datosC["celular"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }else{
            return false;
        }

        return print_r(Conexion::conectar()->errorInfo());
    }

    static public function mdlRestablecerPasswordM($tablaDB, $email, $password)
    {

        $pdo = Conexion::conectar()->prepare("UPDATE $tablaDB SET clave = :Rpassword WHERE email = :Remail");

        $pdo->bindParam(":Rpassword", $password, PDO::PARAM_STR);
        $pdo->bindParam(":Remail", $email, PDO::PARAM_STR);

        if ($pdo->execute()) {

            return true;

        } else {
            
            return false;
        }
    }

    static public function mdlNuevosUsuarios($tabla, $fechaInicio, $fechaFinal, $tipo)
    {

        $pdo = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE tipo = :tipo AND fecha_registro BETWEEN :inicio AND :final");

        $pdo->bindParam(":inicio", $fechaInicio, pdo::PARAM_STR);
        $pdo->bindParam(":final", $fechaFinal, pdo::PARAM_STR);
        $pdo->bindParam(":tipo", $tipo, pdo::PARAM_STR);

        $pdo->execute();

        return $pdo->fetchAll();
    }




}
