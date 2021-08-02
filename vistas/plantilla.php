<?php

session_start();

date_default_timezone_set('America/Tegucigalpa');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AllOnlineHN | Dashboard</title>
    <link rel="shortcut icon" href="vistas/img/3.png" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="vistas/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="vistas/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="vistas/plugins/summernote/summernote-bs4.min.css">


    <!-- JS -->
    <!-- jQuery -->
    <script src="vistas/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.css" rel="stylesheet" />
    <!--     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.js"></script>
    <!-- ChartJS -->
    <script src="vistas/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="vistas/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="vistas/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="vistas/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="vistas/plugins/moment/moment.min.js"></script>
    <script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="vistas/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="vistas/plugins/jszip/jszip.min.js"></script>
    <script src="vistas/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="vistas/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="vistas/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="vistas/js/demo.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php

    if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == 'ok') {

        if ($_SESSION["tipo"] == "A" or $_SESSION["tipo"] == "E") {

            if (isset($_GET["ruta"])) {
                if (
                    $_GET["ruta"] == "home" ||
                    $_GET["ruta"] == "perfil" ||
                    $_GET["ruta"] == "productos" ||
                    $_GET["ruta"] == "categorias" ||
                    $_GET["ruta"] == "usuarios" ||
                    $_GET["ruta"] == "pedidos" ||
                    $_GET["ruta"] == "ingresos" ||
                    $_GET["ruta"] == "proveedores" ||
                    $_GET["ruta"] == "facturacion" ||
                    $_GET["ruta"] == "clientes" ||
                    $_GET["ruta"] == "cerrarSesion" ||
                    $_GET["ruta"] == "reportes"
                ) {

                    echo '<div class="wrapper">';

                    include 'vistas/modulos/cabecera.php';

                    include 'vistas/modulos/menuadmin.php';

                    include 'vistas/paginas/' . $_GET["ruta"] . '.php';

                    include 'vistas/modulos/footer.php';

                    echo '</div>';
                } elseif (
                    $_GET["ruta"] == "tienda" ||
                    $_GET["ruta"] == "detalle" ||
                    $_GET["ruta"] == "completo" ||
                    $_GET["ruta"] == "direccion" ||
                    $_GET["ruta"] == "buscador" ||
                    $_GET["ruta"] == "carrito"
                ) {
                    include 'vistas/paginas/' . $_GET["ruta"] . '.php';
                } else {
                    echo '<div class="wrapper">';

                    include 'vistas/modulos/cabecera.php';

                    include 'vistas/modulos/menuadmin.php';

                    if ($_GET["ruta"] == "login") {

                        include 'vistas/paginas/home.php';
                    } else {
                        include 'vistas/modulos/404.php';
                    }

                    include 'vistas/modulos/footer.php';

                    echo '</div>';
                }
            } else {
                echo '<div class="wrapper">';

                include 'vistas/modulos/cabecera.php';

                include 'vistas/modulos/menuadmin.php';

                include 'vistas/paginas/home.php';

                include 'vistas/modulos/footer.php';

                echo '</div>';
            }
        } else {

            if (isset($_GET["ruta"])) {
                if (
                    $_GET["ruta"] == "perfil" ||
                    $_GET["ruta"] == "compras" ||
                    $_GET["ruta"] == "cerrarSesion"
                ) {

                    echo '<div class="wrapper">';

                    include 'vistas/modulos/cabecera.php';

                    include 'vistas/modulos/menucliente.php';

                    include 'vistas/paginas/' . $_GET["ruta"] . '.php';

                    include 'vistas/modulos/footer.php';

                    echo '</div>';
                } elseif (
                    $_GET["ruta"] == "tienda" ||
                    $_GET["ruta"] == "detalle" ||
                    $_GET["ruta"] == "completo" ||
                    $_GET["ruta"] == "direccion" ||
                    $_GET["ruta"] == "buscador" ||
                    $_GET["ruta"] == "carrito"
                ) {
                    include 'vistas/paginas/' . $_GET["ruta"] . '.php';
                } else {
                    echo '<div class="wrapper">';

                    include 'vistas/modulos/cabecera.php';

                    include 'vistas/modulos/menucliente.php';

                    if ($_GET["ruta"] == "login") {

                        include 'vistas/paginas/home.php';
                    } else {
                        include 'vistas/modulos/404.php';
                    }

                    include 'vistas/modulos/footer.php';

                    echo '</div>';
                }
            } else {
                echo '<div class="wrapper">';

                include 'vistas/modulos/cabecera.php';

                include 'vistas/modulos/menuadmin.php';

                include 'vistas/paginas/home.php';

                include 'vistas/modulos/footer.php';

                echo '</div>';
            }
        }
    } else {

        if (isset($_GET["ruta"])) {
            if (
                $_GET["ruta"] == "tienda" ||
                $_GET["ruta"] == "login" ||
                $_GET["ruta"] == "registro" ||
                $_GET["ruta"] == "completo" ||
                $_GET["ruta"] == "detalle" ||
                $_GET["ruta"] == "buscador" ||
                $_GET["ruta"] == "direccion" ||
                $_GET["ruta"] == "carrito"
            ) {
                include 'vistas/paginas/' . $_GET["ruta"] . '.php';
            } else {
                include 'vistas/modulos/404-tienda.php';
            }
        } else {

            include 'vistas/paginas/tienda.php';
        }
    }

    ?>


    <script src="vistas/js/main.js"></script>
    <script src="vistas/js/categorias.js"></script>
    <script src="vistas/js/producto.js"></script>
    <script src="vistas/js/proveedores.js"></script>
    <script src="vistas/js/buscador.js"></script>
    <script src="vistas/js/ventas.js"></script>

</body>

</html>