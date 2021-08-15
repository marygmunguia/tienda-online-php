<div class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-danger">
            <div class="card-header text-center">
                <a href="tienda" class="h1"><img src="vistas/img/1.png" width="300px"></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Ingresa tu correo electrónico para recupertar el acceso a tu cuenta.</p>
                <form method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="correoRestablecer" placeholder="Correo Electrónico">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger btn-block">Recuperar Contraseña</button>
                        </div>
                    </div>
                    <?php

                    $recuperar = new ControladorUsuario();
                    $recuperar -> ctrRestablecerPassword();

                    ?>
                </form>
                <p class="mt-3 mb-1">
                    <a href="login">Volver a inicio de sesión</a>
                </p>
            </div>
        </div>
    </div>
</div>