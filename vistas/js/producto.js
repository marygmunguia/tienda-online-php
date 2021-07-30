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


$(".tablas").on("click", ".eliminarProducto", function () {
  
  var id = $(this).attr("id");
  $("#idproductoDelete").val(id);

});



$(".tablas").on("click", ".EditarProveedor", function () {
  var id = $(this).attr("id");
  var datos = new FormData();

  datos.append("idproveedor", id);

  $.ajax({
    url: "ajax/proveedores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idproveedorE").val(respuesta["idproveedor"]);
      $("#rtnE").val(respuesta["RTN"]);
      $("#nombreE").val(respuesta["nombre"]);
      $("#emailE").val(respuesta["email"]);
      $("#sitioWebE").val(respuesta["sitioWeb"]);
      $("#telefonoE").val(respuesta["telefono"]);
      $("#nomContactoE").val(respuesta["nomContacto"]);
      $("#emailContactoE").val(respuesta["emailContacto"]);
      $("#celularContactoE").val(respuesta["celularContacto"]);
      console.log(respuesta);
    },
    error: function (respuesta) {
      console.log(respuesta);
    },
  });
});