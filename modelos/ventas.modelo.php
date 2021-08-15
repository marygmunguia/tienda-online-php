<?php

require_once 'ConexionDB.php';

class ModeloVentas extends Conexion
{

	static public function mdlActualizarProducto($tabla, $stock, $valor)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET stock = :stock WHERE idproducto = :id");

		$stmt->bindParam(":stock", $stock, PDO::PARAM_STR);
		$stmt->bindParam(":id", $valor, PDO::PARAM_STR);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public static function mdlConsultaVenta($tablaDB, $columna, $valor)
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

	public static function mdlConsultarDetalleVentas($tablaDB, $columna, $valor)
	{
		$pdo = Conexion::conectar()->prepare("SELECT * FROM $tablaDB WHERE $columna =:$columna");

		$pdo->bindParam(":" . $columna, $valor, pdo::PARAM_STR);
		
		$pdo->execute();

		return $pdo->fetchAll();
	}

	public static function mdlProductosMasVendidos($tablaDB)
	{
		$pdo = Conexion::conectar()->prepare("SELECT * FROM $tablaDB ORDER BY cantidad DESC");
		
		$pdo->execute();

		return $pdo->fetchAll();
	}

	/*=============================================
	REGISTRO DE VENTA
	=============================================*/

	static public function mdlIngresarVenta($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ClaveTransaccion, paypalDatos, idusuario, fecha, subtotal, isv, total, estado) 
        VALUES (:ClaveTransaccion, :paypalDatos, :idusuario, :fecha, :subtotal, :isv, :total, :estado)");

		$stmt->bindParam(":ClaveTransaccion", $datos["ClaveTransaccion"], PDO::PARAM_STR);
		$stmt->bindParam(":paypalDatos", $datos["paypalDatos"], PDO::PARAM_STR);
		$stmt->bindParam(":idusuario", $datos["idusuario"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":subtotal", $datos["subtotal"], PDO::PARAM_STR);
		$stmt->bindParam(":isv", $datos["isv"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return true;
		} else {

			return false;
		}
	}

	static public function mdlIngresarProductoVendido($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idventa, idproducto, cantidad, precio, total) 
        VALUES (:idventa, :idproducto, :cantidad, :precio, :total)");

		$stmt->bindParam(":idventa", $datos["idventa"], PDO::PARAM_STR);
		$stmt->bindParam(":idproducto", $datos["idproducto"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return true;
		} else {

			return false;
		}
	}
}
