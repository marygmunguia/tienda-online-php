<?php

class ControladorProducto
{
    static public function ctrMostrarProducto($columna, $valor)
    {
        $tablaDB = "productos";

        $resultado = ModeloProducto::mdlMostrarProductos($tablaDB, $columna, $valor);

        return $resultado;
    }

    static public function ctrIngresarProducto()
    {

        if (isset($_POST["nombre"])) {


            /*=============================================
				VALIDAR IMAGEN
				=============================================*/

            $ruta = "";

            if (isset($_FILES["imagenProducto"]["tmp_name"])) {

                list($ancho, $alto) = getimagesize($_FILES["imagenProducto"]["tmp_name"]);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                /*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

                $directorio = "vistas/img/productos";

                mkdir($directorio, 0755);

                /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                if ($_FILES["imagenProducto"]["type"] == "image/jpeg") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 99999);

                    $ruta = "vistas/img/productos/" . $aleatorio . ".jpg";

                    $origen = imagecreatefromjpeg($_FILES["imagenProducto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);
                }

                if ($_FILES["imagenProducto"]["type"] == "image/png") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "vistas/img/" . $_POST["nombre"] . "/" . $aleatorio . ".png";

                    $origen = imagecreatefrompng($_FILES["imagenProducto"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);
                }
            }

            $tabla = "productos";

            $datos = array(
                "nombre" => $_POST["nombre"],
                "descripcion" => $_POST["descripcion"],
                "idcategoria" => $_POST["idcategoria"],
                "precio" => $_POST["precio"],
                "costo" => $_POST["costo"],
                "isv" => $_POST["isv"],
                "stock" => $_POST["stock"],
                "estado" => $_POST["estado"],
                "codigoBarras" => $_POST["codigoBarras"],
                "idproveedor" => $_POST["idproveedor"],
                "imagen" => $ruta
            );

            $respuesta = ModeloProducto::mdlIngresarProducto($tabla, $datos);

            if ($respuesta == true) {
                echo '<script>

					swal({

						type: "success",
						title: "¡El producto ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "productos";

						}

					});
				

					</script>';
            } else {
                echo '<script>

					swal({

						type: "success",
						title: "¡El producto NO ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "productos";

						}

					});
				

					</script>';
            }
        }
    }


    static public function ctrEliminarProducto()
    {
        if (isset($_POST["idproductoDelete"])) {

            $tablaDB = "productos";

            $id = $_POST["idproductoDelete"];

            $resultado = ModeloProducto::mdlEliminarProducto($tablaDB, $id);

            if ($resultado == true) {
                echo '<script>

					swal({

						type: "success",
						title: "¡El producto ha sido eliminado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "productos";

						}

					});
				

					</script>';
            } else {
                echo '<script>

					swal({

						type: "success",
						title: "¡El producto NO ha sido eliminado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "productos";

						}

					});
				

					</script>';
            }
        }
    }


    
	static public function ctrEditarProducto(){

		if(isset($_POST["idproducto"])){

		
			   	$ruta = $_POST["imagenActual"];

			   	if(isset($_FILES["imagenProductoE"]["tmp_name"]) && !empty($_FILES["imagenProductoE"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["imagenProductoE"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/productos";

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default-150x150.png"){

						unlink($_POST["imagenActual"]);

					}else{

						mkdir($directorio, 0755);	
					
					}
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["imagenProductoE"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["imagenProductoE"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["imagenProductoE"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["imagenProductoE"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "productos";

				$datos = array(
                    "id" => $_POST["idproducto"],
                    "nombre" => $_POST["nombreE"],
                    "descripcion" => $_POST["descripcionE"],
                    "idcategoria" => $_POST["idcategoriaE"],
                    "precio" => $_POST["precioE"],
                    "costo" => $_POST["costoE"],
                    "idproveedor" => $_POST["idproveedorE"],
                    "isv" => $_POST["isvE"],
                    "stock" => $_POST["stockE"],
                    "estado" => $_POST["estadoE"],
                    "codigoBarras" => $_POST["codigoBarrasE"],
                    "imagen" => $ruta);

				$respuesta = ModeloProducto::mdlActualizarProducto($tabla, $datos);

				if($respuesta == true){

					echo'<script>

						swal({
							  type: "success",
							  title: "El producto ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "productos";

										}
									})

						</script>';

				}else{
                    echo'<script>

						swal({
							  type: "error",
							  title: "El producto NO ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "productos";

										}
									})

						</script>';

                }

		}

	}


}
