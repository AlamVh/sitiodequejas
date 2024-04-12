<?php
require('conexion.php');

$id = $_GET['id_contacto'];

$eliminar ="DELETE FROM contactos WHERE id_contacto='$id'";
$resultado=$conectado->query($eliminar);

if(!$resultado) {
    
    echo "<script text='text/javascript'>
        alert('No se pudo eliminar 😢');
        window.location='aCliente.php';
        </script>";

}
else {
    echo "<script text='text/javascript'>
        alert('Se ha borrado el contacto');
        window.location='aCliente.php';
        </script>";
}

mysqli_close($conectado);
?>