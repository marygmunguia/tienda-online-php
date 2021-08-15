<?php

require_once 'ConexionDB.php';

class ModeloReportes extends Conexion
{

    static public function mdlConsultarVentas($tablaDB)
    {
        $pdo = Conexion::conectar()->prepare("SELECT * FROM $tablaDB");

        $pdo->execute();

        return $pdo->fetchAll();
    }

    static public function mdlMostrarProductosMasVendidos($tablaDB)
    {
        $pdo = Conexion::conectar()->prepare("SELECT * FROM $tablaDB");

        $pdo->execute();

        return $pdo->fetchAll();
    }

    static public function mdlmostrarVentas($tablaDB)
    {
        $pdo = Conexion::conectar()->prepare("SELECT * FROM $tablaDB");

        $pdo->execute();

        return $pdo->fetchAll();
    }
    
    
    static public function mdlmostrarVentasporFecha($tabla, $fechaInicio, $fechaFinal)
    {

        $pdo = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN :inicio AND :final");

        $pdo->bindParam(":inicio", $fechaInicio, pdo::PARAM_STR);
        $pdo->bindParam(":final", $fechaFinal, pdo::PARAM_STR);

        $pdo->execute();

        return $pdo->fetchAll();
    }

}
