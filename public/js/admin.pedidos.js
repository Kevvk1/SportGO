function VerProductos(id_pedido) {
    const modal = new bootstrap.Modal("#ver-productos");
    modal.show();

    // Limpiar el contenido anterior
    $('#listado_productos_modal').empty();

    $.ajax({
        url: '/getProductosPedido/' + id_pedido,
        type: 'GET',
        success: function(data) {
            let productosHTML = ''; // Variable para almacenar el HTML de los productos

            // Iterar sobre los productos y construir el HTML
            data[0].forEach(producto => {
                productosHTML += `
                    <tr class="text-center">
                        <th scope="row">${producto.codigo_producto}</th>
                        <td>${producto.nombre}</td>
                        <td>${producto.precio}</td>
                        <td>${producto.pivot.cantidad}</td>
                    </tr>
                `;
            });

            // Construir el HTML final con la tabla completa
            const tablaHTML = `
                <div class="table-responsive container-fluid w-100 mx-auto">
                    <table class="table">
                        <thead>
                            <tr style="background-color: #d9db26 !important;" class="text-center">
                                <th scope="col">Código producto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${productosHTML} <!-- Inserta las filas de productos aquí -->
                        </tbody>
                    </table>
                </div>
            `;

            // Añadir el HTML al modal
            $('#listado_productos_modal').append(`<li>${tablaHTML}</li>`);
        }
    });
}