<?php
require('conexion.php');

$id = $_GET['id_marca'];

$eliminar ="DELETE FROM marcas WHERE id_marca='$id'";
$resultado=$conectado->query($eliminar);

if(!$resultado) {
    
    echo "<script text='text/javascript'>
        alert('No se pudo eliminar 😢');
        window.location='aTipos.php';
        </script>";

}
else {
    echo "<script text='text/javascript'>
        alert('Se ha borrado el tipo');
        window.location='aTipos.php';
        </script>";
}

mysqli_close($conectado);
?>