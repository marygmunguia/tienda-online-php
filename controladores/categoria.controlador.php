<?php

class ControladorCategoria
{

    static public function ctrMostrarCategorias($columna, $valor)
    {

        $tablaDB = "categorias";

        $resultado = ModeloCategoria::mdlMostrarCategorias($tablaDB, $columna, $valor);

        return $resultado;
    }


    static public function ctrInsertarCategoria()
    {

        if (isset($_POST["nombre"])) {

            $tablaDB = "categorias";

            $nombre = $_POST["nombre"];

            $resultado = ModeloCategoria::mdlInsertarCategoria($tablaDB, $nombre);


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
                                window.location = "categorias";
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
                                window.location = "categorias";
                            }
                        })

                    });
                </script>

            <?php

            }
        }
    }



    static public function ctrEditarCategoria()
    {

        if (isset($_POST["idcategoriaE"])) {

            $tablaDB = "categorias";

            $id = $_POST["idcategoriaE"];
            $nombre = $_POST["nombreE"];

            $resultado = ModeloCategoria::mdlEditarCategoria($tablaDB, $id, $nombre);

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
                                window.location = "categorias";
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
                                window.location = "categorias";
                            }
                        })

                    });
                </script>

<?php

            }
        }
    }


    /* ELIMINAR CATEGORIA */
    static public function ctrEliminarCategoria()
    {
        if (isset($_POST["idcategoria"])) {

            $tablaDB = "categorias";

            $id = $_POST["idcategoria"];

            $resultado = ModeloCategoria::mdlEliminarCategoria($tablaDB, $id);

            if ($resultado == true) {

                ?>
                    <script LANGUAGE="javascript">
                        $(document).ready(function() {
    
                            swal({
                                titltype: "success",
                                title: "¡CORRECTO!",
                                text: "SE HA ELIMINADO EL REGISTRO SATISFACTORIAMENTE",
                                showConfirmButtom: true,
                                confirmButtomText: "Aceptar"
                            }).then((result) => {
                                if (result.value) {
                                    window.location = "categorias";
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
                                    window.location = "categorias";
                                }
                            })
    
                        });
                    </script>
    
    <?php
    
                }
        }
    }
}
