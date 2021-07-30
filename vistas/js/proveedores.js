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


$(".tablas").on("click", ".EliminarProveedor", function () {
  
  var id = $(this).attr("id");
  $("#idproveedor").val(id);

});
