

function VerProductos(id_pedido){

    const modal = new bootstrap.Modal("#ver-productos");
    modal.show();

    let contador = 0;

    $.ajax({
        url: '/getProductosPedido/'+id_pedido,
        type: 'GET',
        success: function(data){
            
            data[0].forEach(function(producto){
                $('#listado_productos_modal').append('<li>'+producto["nombre"]+"</li>");
            })
        }
    })
        

    

}