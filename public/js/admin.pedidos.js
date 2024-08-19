

function VerProductos(id_pedido){



    $.ajax({
        url: '/getProductosPedido/'+id_pedido,
        type: 'GET',
        success: function(data){
            console.log(data);
        }
    })
        

    

}