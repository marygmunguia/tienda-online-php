<?php

require_once "../controladores/usuario.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class UsuariosAjax
{
    public $idUsuario;

    public function EUsuariosAjax()
    {
        $columna = "idusuarios";
        $valor = $this->idUsuario;

        $resultado = ControladorUsuario::ctrMostrarUsuarios($columna, $valor);

        echo json_encode($resultado);
 
    }
}
class AjaxUsuarios
{
    public $validarUsuario;

    public function ajaxValidarUsuario()
    {

        $item = "email";
        $valor = $this->validarUsuario;

        $respuesta = ControladorUsuario::ctrMostrarUsuarios($item, $valor);

        echo json_encode($respuesta);
    }
}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if (isset($_POST["validarUsuario"])) {

    $valUsuario = new AjaxUsuarios();
    $valUsuario->validarUsuario = $_POST["validarUsuario"];
    $valUsuario->ajaxValidarUsuario();
}


if (isset($_POST["idUsuario"])) {
    $eS = new UsuariosAjax();
    $eS -> idUsuario = $_POST["idUsuario"];
    $eS -> EUsuariosAjax();
}