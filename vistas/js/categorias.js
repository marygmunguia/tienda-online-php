//ELIMINAR CATEGORIA
$("#TB").on("click", ".eliminarCategoria", function () {

    var id = $(this).attr("id");

    $("#idcategoria").val(id);
})

//EDITAR CATEGORIA
$("#TB").on("click", ".editarCategoria", function () {

    var id = $(this).attr("id");
    var nombre = $(this).attr("nombre");

    $("#idcategoriaE").val(id);
    $("#nombreE").val(nombre);

})