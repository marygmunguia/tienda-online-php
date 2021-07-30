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

                $directorio = "vistas/img/usuarios/productos";

                mkdir($directorio, 0755);

                /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

                if ($_FILES["imagenProducto"]["type"] == "image/jpeg") {

                    /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                    $aleatorio = mt_rand(100, 99999);

                    $ruta = "vistas/img/usuarios/productos/" . $aleatorio . ".jpg";

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

                    $ruta = "vistas/img/usuarios/" . $_POST["nombre"] . "/" . $aleatorio . ".png";

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

}
