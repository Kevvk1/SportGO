

function ModificarProducto(codigo_producto){

    const modal = new bootstrap.Modal("#editar-producto");
    modal.show();

    $.ajax({
        url: '/getProducto/'+codigo_producto,
        type: 'GET',
        success: function(data){
            $('#nombre_producto_modal').attr("value", data[0]["nombre"]);
            $('#descripcion_producto_modal').attr("value", data[0]["descripcion"]);
            $('#imagen_producto_modal').attr("src", data[0]["imagen"]);
            $('#precio_producto_modal').attr("value", data[0]["precio"]);
            $('#cantidad_producto_modal').attr("value", data[0]["stock_disponible"]);
            $('#codigo_producto_modal').attr("value", data[0]["codigo_producto"]);

        }
    })
        




    

    

}