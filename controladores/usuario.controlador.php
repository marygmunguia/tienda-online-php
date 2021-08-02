<?php

class ControladorUsuario
{

	/* INGRESO DE USUARIO */
	static public function ctrIngresoUsuario()
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
	static public function ctrCrearUsuario()
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
						title: "¡El registro se ha actualizado de forma exitosa!",
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
	static public function ctrMostrarUsuarios($columna, $valor)
	{
		$tablaDB = "usuarios";

		$resultado = ModeloUsuarios::mdlMostrarUsuarios($tablaDB, $columna, $valor);

		return $resultado;
	}

	static public function ctrEliminarUsuario()
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

	static public function ctrCrearUsuarioCliente()
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


	static public function ctrActualizarUsuario()
	{
		if (isset($_POST["nombreE"])) {

			$ruta = $_POST["FotoActual"];

			if (isset($_FILES["imagenNuevaE"]["tmp_name"]) && !empty($_FILES["imagenNuevaE"]["tmp_name"])) {

				list($ancho, $alto) = getimagesize($_FILES["imagenNuevaE"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

				$directorio = "vistas/img/usuarios";

				/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

				if (!empty($_POST["FotoActual"])) {

					unlink($_POST["FotoActual"]);
				} else {

					mkdir($directorio, 0755);
				}

				/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

				if ($_FILES["imagenNuevaE"]["type"] == "image/jpeg") {

					/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

					$aleatorio = mt_rand(100, 9999);

					$ruta = "vistas/img/usuarios/" . $aleatorio . ".jpg";

					$origen = imagecreatefromjpeg($_FILES["imagenNuevaE"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);
				}

				if ($_FILES["imagenNuevaE"]["type"] == "image/png") {

					/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

					$aleatorio = mt_rand(100, 9999);

					$ruta = "vistas/img/usuarios/" . $aleatorio . ".png";

					$origen = imagecreatefrompng($_FILES["imagenNuevaE"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);
				}
			}

			$tabla = "usuarios";

			$datos = array(
				"idUsuario" => $_POST["idUsuarioE"],
				"nombre" => $_POST["nombreE"],
				"email" => $_POST["emailE"],
				"tipo" => $_POST["tipoE"],
				"estado" => $_POST["estadoE"],
				"imagen" => $ruta
			);

			$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $datos);

			if ($respuesta == true) {
				echo '<script>

					swal({

						type: "success",
						title: "¡El registro se ha actualizado de forma exitosa!",
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
						title: "¡El registro NO se ha actualizado correctamente!",
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


	static public function ctrCambiarFotoPerfil()
	{
		if (isset($_POST["idUsuarioFoto"])) {

			$ruta = $_POST["fotoActual"];

			if (isset($_FILES["imagenNueva"]["tmp_name"]) && !empty($_FILES["imagenNueva"]["tmp_name"])) {

				list($ancho, $alto) = getimagesize($_FILES["imagenNueva"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

				$directorio = "vistas/img/usuarios";

				/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

				if (!empty($_POST["fotoActual"])) {

					unlink($_POST["fotoActual"]);
				} else {

					mkdir($directorio, 0755);
				}

				/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

				if ($_FILES["imagenNueva"]["type"] == "image/jpeg") {

					/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

					$aleatorio = mt_rand(100, 9999);

					$ruta = "vistas/img/usuarios/" . $aleatorio . ".jpg";

					$origen = imagecreatefromjpeg($_FILES["imagenNueva"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);
				}

				if ($_FILES["imagenNueva"]["type"] == "image/png") {

					/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

					$aleatorio = mt_rand(100, 9999);

					$ruta = "vistas/img/usuarios/" . $aleatorio . ".png";

					$origen = imagecreatefrompng($_FILES["imagenNueva"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);
				}
			}

			$tablaDB = "usuarios";

			$id = $_POST["idUsuarioFoto"];

			$respuesta = ModeloUsuarios::mdlCambiarFotoPerfil($tablaDB, $id, $ruta);

			if ($respuesta == true) {

				$_SESSION["imagen"] = $ruta;

				echo '<script>

					swal({

						type: "success",
						title: "¡La foto se ha actualizado de forma exitosa!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "perfil";

						}

					});
				

					</script>';
			} else {
				echo '<script>

					swal({

						type: "error",
						title: "¡La foto NO se ha actualizado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "perfil";

						}

					});
				

					</script>';
			}
		}
	}


	static public function ctrIngresarDireccion()
	{

		if (isset($_POST["idusuario"])) {

			$tablaDB = "direccion";

			$datosC = array(
				"idusuario" => $_POST["idusuario"],
				"direccion1" => $_POST["direccion1"],
				"direccion2" => $_POST["direccion2"],
				"ciudad" => $_POST["ciudad"],
				"departemento" => $_POST["departemento"],
				"pais" => $_POST["pais"],
				"telefono" => $_POST["telefono"],
				"celular" => $_POST["celular"]
			);

			$resultado = ModeloUsuarios::mdlIngresarDireccion($tablaDB, $datosC);

			if ($resultado == true) {
				echo '<script>						
					window.location = "detalle";		
					</script>';
			} else {
				echo '<script>

					swal({

						type: "error",
						title: "¡No hemos podido guardar tu dirección, intentalo más tarde!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "carrito";

						}

					});
				

					</script>';
			}
		}
	}


	static public function ctrConsultarDireccion($columna, $valor)
	{
		$tablaDB = "direccion";

		$resultado = ModeloUsuarios::mdlMostrarUsuarios($tablaDB, $columna, $valor);

		return $resultado;
	}


}
