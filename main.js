
$(document).ready(function(){
    $(".id").click(function () {
        id = $(this).parents("tr").find("td").eq(0) .html();
        $('.idUpdate').val(id)
        tipoMotoUpdate = $(this).parents("tr").find("td").eq(1).html();
        $('.tipoMotoUpdate').val(tipoMotoUpdate);
        marcaUpdate = $(this).parents("tr").find("td").eq(2).html();
        $('.marcaUpdate').val(marcaUpdate);
        precioUpdate = $(this).parents("tr").find("td").eq(3).html();
        $('.precioUpdate').val(precioUpdate);
    });
});