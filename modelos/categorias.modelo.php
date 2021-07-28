<?php 

require_once 'ConexionDB.php';

class ModeloCategoria extends Conexion{

    /* CONSULTAR CATEGORIA */
    static public function mdlMostrarCategorias($tablaDB, $columna, $valor)
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

    /* INSERTAR CATEGORIA */
    static public function mdlInsertarCategoria($tablaDB, $nombre)
    {

        $pdo = Conexion::conectar()->prepare("INSERT INTO $tablaDB(nombre) VALUES 
        (:nombre)");

        $pdo->bindParam(":nombre", $nombre, PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        return print_r(Conexion::conectar()->errorInfo());
    }

    /* EDITAR CATEGORIA */
    static public function mdlEditarCategoria($tablaDB,$id, $nombre)
    {
        $pdo = Conexion::conectar()->prepare("UPDATE $tablaDB SET nombre = :nombre WHERE idcategoria = :id");

        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        $pdo->bindParam(":nombre", $nombre, PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }


    /* ELIMINAR CATEGORIA */
    static public function mdlEliminarCategoria($tablaDB, $id)
    {

        $pdo = Conexion::conectar()->prepare("DELETE FROM $tablaDB WHERE idcategoria = :id");

        $pdo->bindParam(":id", $id, PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }

}