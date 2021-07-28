<div class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="tienda"><img src="vistas/img/1.png" width="350px" alt="Logo"></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Inicio sesión con su usuario y contraseña</p>

                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Completo">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" id="emailValidar" placeholder="Correo Electrónico">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="clave" id="clave" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="repetirClave" id="repetirClave" placeholder="Repetir Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">Registrarse</button>

                    <?php

                    $registro = new ControladorUsuario();
                    $registro -> ctrCrearUsuarioCliente();

                    ?>

                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- O -</p>
                    <a href="login" class="btn btn-block btn-secondary">
                        Entrar
                    </a>
                    <a href="tienda" class="btn btn-block btn-info">
                        Volver a la tienda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>