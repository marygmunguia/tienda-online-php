<?php

class ControladorProveedor
{

    static public function ctrMostrarProveedores($columna, $valor)
    {
        $tablaDB = "proveedores";

        $resultado = ModeloProveedor::mdlMostrarProveedores($tablaDB, $columna, $valor);

        return $resultado;
    }


    static public function ctrInsertarProveedor()
    {

        if (isset($_POST["nombre"])) {

            $tablaDB = "proveedores";

            $datosC = array(
                'RTN' => $_POST["rtn"],
                'nombre' => $_POST["nombre"],
                'email' => $_POST["email"],
                'telefono' => $_POST["telefono"],
                'sitioWeb' => $_POST["sitioWeb"],
                'nomContacto' => $_POST["nomContacto"],
                'emailContacto' => $_POST["emailContacto"],
                'celularContacto' => $_POST["celularContacto"]
            );

            $resultado = ModeloProveedor::mdlInsertarProveedor($tablaDB, $datosC);

            if ($resultado == true) {

?>
                <script LANGUAGE="javascript">
                    $(document).ready(function() {

                        swal({
                            titltype: "success",
                            title: "¡CORRECTO!",
                            text: "SE HA GUARDADO EL REGISTRO SATISFACTORIAMENTE",
                            showConfirmButtom: true,
                            confirmButtomText: "Aceptar"
                        }).then((result) => {
                            if (result.value) {
                                window.location = "proveedores";
                            }
                        })

                    });
                </script>

            <?php

            } else {

            ?>
                <script LANGUAGE="javascript">
                    $(document).ready(function() {

                        swal({
                            titltype: "error",
                            title: "¡ERROR!",
                            text: "NO SE HA GUARDADO EL REGISTRO SATISFACTORIAMENTE",
                            showConfirmButtom: true,
                            confirmButtomText: "Cerrar"
                        }).then((result) => {
                            if (result.value) {
                                window.location = "proveedores";
                            }
                        })

                    });
                </script>

            <?php

            }
        }
    }



    static public function ctrActualizarProveedor(){

        if (isset($_POST["idproveedorE"])) {

            $tablaDB = "proveedores";

            $datosC = array(
                "id" => $_POST["idproveedorE"],
                "RTN" => $_POST["rtnE"],
                "nombre" => $_POST["nombreE"],
                "email" => $_POST["emailE"],
                "telefono" => $_POST["telefonoE"],
                "sitioWeb" => $_POST["sitioWebE"],
                "nomContacto" => $_POST["nomContactoE"],
                "emailContacto" => $_POST["emailContactoE"],
                "celularContacto" => $_POST["celularContactoE"]
            );

            $resultado = ModeloProveedor::mdlActualizarProveedor($tablaDB, $datosC);

            if ($resultado == true) {
                ?>
                <script LANGUAGE="javascript">
                    $(document).ready(function() {

                        swal({
                            titltype: "success",
                            title: "¡CORRECTO!",
                            text: "SE HA ACTUALIZADO EL REGISTRO SATISFACTORIAMENTE",
                            showConfirmButtom: true,
                            confirmButtomText: "Aceptar"
                        }).then((result) => {
                            if (result.value) {
                                window.location = "proveedores";
                            }
                        })

                    });
                </script>

            <?php
            } else {
                ?>
                <script LANGUAGE="javascript">
                    $(document).ready(function() {

                        swal({
                            titltype: "error",
                            title: "¡ERROR!",
                            text: "NO SE HA ACTUALIZADO EL REGISTRO SATISFACTORIAMENTE",
                            showConfirmButtom: true,
                            confirmButtomText: "Cerrar"
                        }).then((result) => {
                            if (result.value) {
                                window.location = "proveedores";
                            }
                        })

                    });
                </script>
        <?php
            }
        }
    }

    static public function ctrEliminarProveedor()
    {
        if (isset($_POST["idproveedor"])) {

            $tablaDB = "proveedores";

            $datosC = $_POST["idproveedor"];

            $resultado = ModeloProveedor::ctrEliminarProveedor($tablaDB, $datosC);

            if ($resultado == true) {
            ?>
                <script LANGUAGE="javascript">
                    $(document).ready(function() {

                        swal({
                            titltype: "success",
                            title: "¡CORRECTO!",
                            text: "SE HA ELIMINADO EL REGISTRO SATISFACTORIAMENTE",
                            showConfirmButtom: true,
                            confirmButtomText: "Cerrar"
                        }).then((result) => {
                            if (result.value) {
                                window.location = "proveedores";
                            }
                        })

                    });
                </script>

            <?php

            } else {

            ?>
                <script LANGUAGE="javascript">
                    $(document).ready(function() {

                        swal({
                            titltype: "error",
                            title: "¡ERROR!",
                            text: "NO SE HA ELIMINADO EL REGISTRO SATISFACTORIAMENTE",
                            showConfirmButtom: true,
                            confirmButtomText: "Cerrar"
                        }).then((result) => {
                            if (result.value) {
                                window.location = "proveedores";
                            }
                        })

                    });
                </script>

            <?php

            }
        }
    }

}
