<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reportes de los último 7 días</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Reportes</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
    <?php
                include 'generarReporte1.php';
                ?>
        <div class="row">
            <div class="col-md-12">
                <?php
                include 'reporte2.php';
                ?>
            </div>
            <div class="col-md-6">
                <?php
                include 'reporte4.php';
                ?>
            </div>
            <div class="col-md-6">
                <?php
                include 'reporte1.php';
                ?>
            </div>

            <div class="col-md-12">
                <?php
                include 'reporte3.php';
                ?>
            </div>
    </section>
</div>