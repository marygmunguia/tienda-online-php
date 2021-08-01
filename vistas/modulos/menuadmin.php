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
                    <a href="home" class="nav-link">
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
                            Perfil
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Inventario
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="productos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Productos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="categorias" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categorias</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="usuarios" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Usuarios
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Compras
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="proveedores" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Proveedores</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="pedidos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pedidos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="ingresos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ingresos</p>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Ventas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="facturacion" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Facturación</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="clientes" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Clientes</p>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="reportes" class="nav-link">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Reportes
                        </p>
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