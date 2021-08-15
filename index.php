<?php

require_once 'controladores/plantilla.controlador.php';
require_once 'controladores/usuario.controlador.php';
require_once 'controladores/categoria.controlador.php';
require_once 'controladores/producto.controlador.php';
require_once 'controladores/carrito.controlador.php';
require_once 'controladores/proveedor.controlador.php';
require_once 'controladores/cliente.controlador.php';
require_once 'controladores/ventas.controlador.php';
require_once 'controladores/reportes.controlador.php';


require_once 'modelos/usuarios.modelo.php';
require_once 'modelos/categorias.modelo.php';
require_once 'modelos/productos.modelo.php';
require_once 'modelos/proveedores.modelo.php';
require_once 'modelos/clientes.modelo.php';
require_once 'modelos/ventas.modelo.php';
require_once 'modelos/reportes.modelo.php';


require_once "extenciones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
