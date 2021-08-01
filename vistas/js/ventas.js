$(".tablas").on("click", ".ver-detalle-venta", function () {
  var id = $(this).attr("id");
  var datos = new FormData();
  datos.append("idventa", id);

  $.ajax({
    url: "ajax/ventas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",

    success: function (respuesta) {
      $("#idventa").val(respuesta["idventa"]);
      $("#fechaventa").val(respuesta["fecha"]);
      $("#estadoventa").val(respuesta["estado"]);
      $("#cliente").val(respuesta["nombre"]);
      $("#emailCliente").val(respuesta["email"]);
      $("#subtotal").val(respuesta["subtotal"]);
      $("#isv").val(respuesta["isv"]);
      $("#total").val(respuesta["total"]);
    },
    error: function (respuesta) {
      console.log(respuesta);
    },
  });
});

$(".tablas").on("click", ".ver-detalle-venta", function () {
  var idventa = $(this).attr("id");
  $.post(
    "ajax/detalle.ajax.php",
    {
      idventa: idventa,
    },
    function (data) {
      $("#detalleVenta").html(data);
      console.log(data);
    }
  );
});
