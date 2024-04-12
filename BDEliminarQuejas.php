<?php
require('conexion.php');

$id = $_GET['id_queja'];

$eliminar ="DELETE FROM quejas WHERE id_queja='$id'";
$resultado=$conectado->query($eliminar);

if(!$resultado) {
    
    echo "<script text='text/javascript'>
        alert('No se pudo cancelar 😢');
        window.location='VistaSeguimientoQuejas.php';
        </script>";

}
else {
    echo "<script text='text/javascript'>
        alert('Se ha cancelado con éxito');
        window.location='VistaSeguimientoQuejas.php';
        </script>";
}

mysqli_close($conectado);
?>