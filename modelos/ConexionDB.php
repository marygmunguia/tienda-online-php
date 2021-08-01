<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=allonlinehn",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}


$mysqli = new mysqli("localhost","root","","allonlinehn");

if(mysqli_connect_errno()){
    echo 'CONEXION FALLIDA: ', mysqli_connect_error();
    exit();
}
