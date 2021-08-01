<?php

$url = $_SERVER["REQUEST_URI"];
$IdTransaccion = substr($url, 15);


$_SESSION["IdTransaccion"] = $IdTransaccion;


$venta = new ControladorVentas();
$venta -> ctrCrearVenta();