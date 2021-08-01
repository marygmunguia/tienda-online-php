<?php

include '../modelos/ConexionDB.php';


$idventa = $_POST["idventa"];

$query = "SELECT * FROM detalle_ventas_realizadas WHERE idventa = $idventa ORDER BY idproducto";

$resultado = $mysqli->query($query);

$cadena = '';
while ($ver = mysqli_fetch_row($resultado)) {
    $cadena = $cadena . '<tr>
        <td>' . utf8_encode($ver[1]) . '</td>
        <td>' . utf8_encode($ver[2]) . '</td>
        <td>' . utf8_encode($ver[3]) . '</td>
        <td>' . utf8_encode($ver[4]) . '</td>
        <td>' . utf8_encode($ver[5]) . '</td>
    </tr>';
}

echo  $cadena;
