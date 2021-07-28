<?php

require_once 'controladores/plantilla.controlador.php';
require_once 'controladores/usuario.controlador.php';
require_once 'controladores/categoria.controlador.php';
require_once 'controladores/producto.controlador.php';
require_once 'controladores/carrito.controlador.php';
require_once 'controladores/proveedor.controlador.php';

require_once 'modelos/usuarios.modelo.php';
require_once 'modelos/categorias.modelo.php';
require_once 'modelos/productos.modelo.php';
require_once 'modelos/proveedores.modelo.php';

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
