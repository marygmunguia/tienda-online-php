<?php

include '../modelos/ConexionDB.php';

$buscardor = $_POST["buscar"];

$query = "SELECT * FROM productos WHERE nombre LIKE '%" . $buscardor . "%' OR descripcion LIKE '%" . $buscardor . "%'";

$resultado = $mysqli->query($query);

if (mysqli_num_rows($resultado) == 0) {
    $cadena = '<div class="alert alert-warning alert-dismissible col-sm-12">
    <h5><i class="icon fas fa-exclamation-triangle"></i> Atención!</h5>
    No tenemos ningun producto que consida con tu busqueda.
  </div>';
} else {
    $cadena = '<div class="col-sm-12 col-lg-12">
    <h5>Resultado de la búsqueda: </h5>
    </div>';
    while ($ver = mysqli_fetch_row($resultado)) {
        $cadena = $cadena . '
        <div class="col-sm-12 col-lg-3">
            <div class="card" style="width:300px;">
                <img class="card-img-top" src="' . utf8_encode($ver[9]) . '" alt="' . utf8_encode($ver[1]) . '" width="150px">
                <div class="card-body">
                    <h4 class="card-title">' . utf8_encode($ver[1]) . '</h4><br>
                    <div class="pt-3">
                        <p>Precio: <b class="text-danger">' . utf8_encode($ver[4]) . ' Lps</b></p>
                    </div>
                    <div class="pt-2"></div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-danger" data-toggle="modal" data-target="#agregarCarrito" onclick="AgregarCarrito(' . utf8_encode($ver[0]) . ')">
                        <i class="fa fa-shopping-cart"></i> Agregar al carrito </button>
                </div>
            </div>
        </div>';
    }
}

echo  $cadena;
