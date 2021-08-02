<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-danger">

    <a href="home" class="brand-link">
        <img src="vistas/img/3.png" alt="AdminLTE Logo" class="brand-image img-circle">
        <span class="brand-text font-weight-light">AllOnlineHN</span>
    </a>


    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $_SESSION["imagen"]; ?>" class="img-circle" alt="Imagen de Usuario">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION["nombre"]; ?></a>
            </div>
        </div>


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="home-cliente" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="perfil" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Mi Perfil
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="compras" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Mis Compras</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="cerrarSesion" class="nav-link">
                        <i class="nav-icon fas fa-door-closed"></i>
                        <p>
                            Cerrar Sesión
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tienda" class="nav-link">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            Ir a la tienda
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>