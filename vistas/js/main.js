$(function () {
  $("#TB").DataTable({
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  });
});




/*=============================================
EDITAR USUARIO
=============================================*/
$("#TB").on("click", ".editarUsuario", function () {

  var idUsuario = $(this).attr("id");
  var datos = new FormData();

  datos.append("idUsuario", idUsuario);

  $.ajax({

      url: "ajax/usuario.ajax.php",
      method: "POST",
      data: datos,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,

      success: function (resultado) {

          $("#idUsuarioE").val(resultado["idusuario"]);
          $("#nombreE").val(resultado["nombre"]);
          $("#emailE").val(resultado["email"]);
          $("#estadoE").val(resultado["estado"]);
          $("#tipoE").val(resultado["tipo"]);
          $("#FotoActual").val(resultado["imagen"]);
      }

  })

})


/*=============================================
ELIMINAR USUARIO
=============================================*/
$("#TB").on("click", ".eliminarUsuario", function () {
  var idUsuario = $(this).attr("idUsuario");
  var nombre = $(this).attr("nombreU");

  $("#idUsuario").val(idUsuario);
  $("#nombreU").val(nombre);
});

/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$("#imagenNueva").change(function () {
  var imagen = this.files[0];

  /*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".imagenNueva").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $(".imagenNueva").val("");

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

      $(".previsualizar").attr("src", rutaImagen);
    });
  }
});

/*=============================================
EDITANDO LA FOTO DEL USUARIO
=============================================*/
$("#imagenNuevaE").change(function () {
  var imagen = this.files[0];

  /*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $(".imagenNuevaE").val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $(".imagenNuevaE").val("");

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

      $(".previsualizarE").attr("src", rutaImagen);
    });
  }
});


/*=============================================
VALIDAR EMAIL DE USUARIO
=============================================*/

$("#emailValidar").change(function () {
  var usuario = $(this).val();

  var datos = new FormData();

  datos.append("validarUsuario", usuario);

  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta) {
        swal({
          titltype: "error",
          title: "¡ERROR!",
          text: "ERROR: EL EMAIL YA EXISTE EN EL SISTEMA",
          showConfirmButtom: true,
          confirmButtomText: "Aceptar",
        }).then((result) => {
          if (result.value) {
            $("#emailValidar").val("");
          }
        });
      }
    },
  });
});
