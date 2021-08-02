<?php
include 'vistas/paginas/tienda/menu-tienda.php';


if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == 'ok') {

$columna = 'idusuario';
$valor = $_SESSION["idusuario"];

$consulta = ControladorUsuario::ctrConsultarDireccion($columna, $valor);

if (empty($consulta) == false) {

    $_SESSION["direccion"] = $consulta["iddireccion"];

    echo '<script>						
	window.location = "detalle";		
	</script>';
}




?>

<div class="container-fluid pt-5" style="background-color: #cd820a;">
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
            <form method="POST">
                <div class="card">
                    <h3 class="p-3">Ingresa la dirección de entraga de tu compra</h3><br>
                    <p class="pl-3"><span style="color: red;"> * Campos obrigatorios</span></p><br>
                    <div class="card-body">
                        <input type="hidden" name="idusuario" value="<?php echo $_SESSION["idusuario"]; ?>">
                        <div class="form-group">
                            <label for="direccion1"><span style="color: red;"> * </span>Dirección (Linea 1)</label>
                            <input type="text" class="form-control form-control-border" id="direccion1" name="direccion1" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion2">Dirección (Linea 2)</label>
                            <input type="text" class="form-control form-control-border" id="direccion2" name="direccion2" required>
                        </div>
                        <div class="form-group">
                            <label for="ciudad"><span style="color: red;"> * </span>Ciudad</label>
                            <input type="text" class="form-control form-control-border" id="ciudad" name="ciudad" required>
                        </div>
                        <div class="form-group">
                            <label for="departemento"><span style="color: red;"> * </span>Departamento</label>
                            <input type="text" class="form-control form-control-border" id="departemento" name="departemento" required>
                        </div>
                        <div class="form-group">
                            <label for="pais"><span style="color: red;"> * </span>País</label>
                            <select class="custom-select form-control-border" id="pais" name="pais" required>
                                <option value="">Seleccione el país</option>
                                <option value="Honduras">Honduras</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono Fijo</label>
                            <input type="text" class="form-control form-control-border" id="telefono" name="telefono">
                        </div>
                        <div class="form-group">
                            <label for="celular"><span style="color: red;"> * </span>Teléfono Celular</label>
                            <input type="text" class="form-control form-control-border" id="celular" name="celular" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Continuar</button>
                    </div>
                </div>
                <?php

                $guardar = new ControladorUsuario();
                $guardar->ctrIngresarDireccion();

                ?>
            </form>
        </div>
        <div class="col-lg-3">

        </div>
    </div>
</div>


<?php

}else{
    echo'<script>

            swal({
                  type: "error",
                  title: "Registrate o Inicia Sesión para realizar tu compra!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar"
                  }).then(function(result){
                            if (result.value) {

                            window.location = "registro";

                            }
                        })

            </script>';
}

?>
