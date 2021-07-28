<?php

class ControladorUsuario
{

	/* INGRESO DE USUARIO */
	public static function ctrIngresoUsuario()
	{
		if (isset($_POST["email"])) {
			$tabla = "usuarios";

			$columna = "email";
			$valor = $_POST["email"];

			$encriptar = crypt($_POST["clave"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $columna, $valor);

			if ($respuesta["email"] == $_POST["email"] && $respuesta["clave"] == $encriptar) {
				if ($respuesta["estado"] == "A") {
					$_SESSION["iniciarSesion"] = "ok";
					$_SESSION["idusuario"] = $respuesta["idusuario"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["usuario"] = $respuesta["email"];
					$_SESSION["imagen"] = $respuesta["imagen"];
					$_SESSION["tipo"] = $respuesta["tipo"];

					echo '<script> 
                
                    window.location = "home";

                    </script>';
				} else {
					echo '<br><div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>ERROR!</strong> Usuario Inactivo
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>';

					echo '<script> 
                
                    window.location = "login";

                    </script>';
				}
			} else {
				echo '<br><div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>ERROR!</strong> Correo electrónico o/y contraseña incorrecto.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';

				echo '<script> 
                
                    window.location = "login";

                    </script>';
			}
		}
	}

	/* CREAR USUARIO */
	public static function ctrCrearUsuario()
	{
		if (isset($_POST["nombre"])) {
			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave"])
			) {

				/*=============================================
                VALIDAR IMAGEN
                =============================================*/

				$ruta = "";

				if (isset($_FILES["imagenNueva"]["tmp_name"])) {
					list($ancho, $alto) = getimagesize($_FILES["imagenNueva"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
                    CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                    =============================================*/

					$directorio = "vistas/img/usuarios/" . $_POST["nombre"];

					mkdir($directorio, 0755);

					/*=============================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                    =============================================*/

					if ($_FILES["imagenNueva"]["type"] == "image/jpeg") {

						/*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/usuarios/" . $_POST["nombre"] . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["imagenNueva"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["imagenNueva"]["type"] == "image/png") {

						/*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/usuarios/" . $_POST["nombre"] . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["imagenNueva"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}
				}

				$tabla = "usuarios";

				$encriptar = crypt($_POST["clave"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array(
					"nombre" => $_POST["nombre"],
					"email" => $_POST["email"],
					"clave" => $encriptar,
					"tipo" => $_POST["tipo"],
					"estado" => $_POST["estado"],
					"imagen" => $ruta
				);

				$respuesta = ModeloUsuarios::mdlInsertarUsuario($tabla, $datos);

				if ($respuesta == true) {
					echo '<script>

					swal({

						type: "success",
						title: "¡El registro se ha guardado de forma exitosa!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

					</script>';
				} else {
					echo '<script>

					swal({

						type: "error",
						title: "¡El registro NO se ha guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

					</script>';
				}
			} else {
				echo '<script>

					swal({

						type: "error",
						title: "¡El nombre y la contraseña no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';
			}
		}
	}

	/* MOSTRAR USUARIOS */
	public static function ctrMostrarUsuarios($columna, $valor)
	{
		$tablaDB = "usuarios";

		$resultado = ModeloUsuarios::mdlMostrarUsuarios($tablaDB, $columna, $valor);

		return $resultado;
	}

	public static function ctrEliminarUsuario()
	{
		if (isset($_POST["idUsuario"])) {

			$tabla = "usuarios";

			$id = $_POST["idUsuario"];

			$respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla, $id);

			if ($respuesta == true) {
				echo '<script>
	
				swal({
	
					type: "success",
					title: "¡El registro se ha eliminado de forma exitosa!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
	
				}).then(function(result){
	
					if(result.value){
					
						window.location = "usuarios";
	
					}
	
				});
			
	
				</script>';
			} else {
				echo '<script>
	
				swal({
	
					type: "error",
					title: "¡El registro NO se ha eliminado correctamente!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
	
				}).then(function(result){
	
					if(result.value){
					
						window.location = "usuarios";
	
					}
	
				});
			
	
				</script>';
			}
		}
	}

	public static function ctrCrearUsuarioCliente()
	{
		if (isset($_POST["nombre"])) {
			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave"])
			) {

				$tabla = "usuarios";

				$encriptar = crypt($_POST["clave"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array(
					"nombre" => $_POST["nombre"],
					"email" => $_POST["email"],
					"clave" => $encriptar,
					"tipo" => 'C',
					"estado" => 'A',
					"imagen" => 'vistas/img/boxed-bg.jpg'
				);

				$respuesta = ModeloUsuarios::mdlInsertarUsuario($tabla, $datos);

				if ($respuesta == true) {
					echo '<script>

					swal({

						type: "success",
						title: "¡El registro se ha guardado de forma exitosa!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "login";

						}

					});
				

					</script>';
				} else {
					echo '<script>

					swal({

						type: "error",
						title: "¡El registro NO se ha guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "registro";

						}

					});
				

					</script>';
				}
			} else {
				echo '<script>

					swal({

						type: "error",
						title: "¡El nombre y la contraseña no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "registro";

						}

					});
				

				</script>';
			}
		}
	}


}
