$("#buscar").keypress(function () {
  var buscar = $(this).val();
  $.post(
    "ajax/buscador.ajax.php",
    {
      buscar: buscar,
    },
    function (data) {
      $("#producto").html(data);
      console.log(data);
    }
  );
});
