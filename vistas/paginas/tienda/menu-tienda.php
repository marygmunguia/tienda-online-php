<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="tienda"><img src="vistas/img/2.png" alt="AllOnlineHN" width="150px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="tienda">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buscador">Buscar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carrito">Carrito(<?php if(isset($_SESSION["carrito"])){
                        echo count($_SESSION["carrito"]);
                    }else{
                        echo 0;
                    } ?>)</a>
                </li>
            </ul>
            <div class="pr-3">
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-danger btn-flat my-2 my-sm-0" href="login">Entrar</a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-success btn-flat my-2 my-sm-0" href="registro">Registrate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>