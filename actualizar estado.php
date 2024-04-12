<?php
$(document).ready(function() {
    // Asignar evento de clic a los enlaces de detalle de queja
    $("a[href^='QuejaDetalles.php']").on("click", function(event) {
        // Prevenir la acción predeterminada del enlace
        event.preventDefault();
        
        // Obtener el id_queja del enlace (a partir del URL)
        const url = $(this).attr("href");
        const urlParams = new URLSearchParams(url.split('?')[1]);
        const idQueja = urlParams.get('id_queja');
        
        // Realizar la solicitud AJAX para actualizar el estado de la queja
        $.ajax({
            url: 'actualizarEstado.php',
            type: 'POST',
            data: { id_queja: idQueja, nuevo_estado: 'En Proceso' },
            success: function(response) {
                // Manejar la respuesta del servidor
                if (response.success) {
                    // Redirigir a la página de detalles de la queja
                    window.location.href = url;
                } else {
                    // Manejar el error si no se pudo actualizar el estado
                    alert('Error al cambiar el estado de la queja.');
                }
            },
            error: function() {
                // Manejar el error si la solicitud AJAX falla
                alert('Error al conectar con el servidor.');
            }
        });
    });
});
<?