/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$("#imagenProducto").change(function () {
  var imagen = this.files[0];

  /*=============================================
        VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
        =============================================*/

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".imagenProducto").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $(".imagenProducto").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 2MB!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;

      $(".previsualizarP").attr("src", rutaImagen);
    });
  }
});

/* CARRITO DE COMPRAS */

function AgregarCarrito(idproducto) {
  document.getElementById("idproductoAdd").value = idproducto;
}



function EliminarCarrito(idproducto) {
  document.getElementById("idproductoDelete").value = idproducto;
}
