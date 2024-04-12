<?php
require('conexion.php');

$id = $_GET['id_vendedor'];

$eliminar ="DELETE FROM vendedores WHERE id_vendedor='$id'";
$resultado=$conectado->query($eliminar);

if(!$resultado) {
    
    echo "<script text='text/javascript'>
        alert('No se pudo eliminar 😢');
        window.location='aEmpleado.php';
        </script>";

}
else {
    echo "<script text='text/javascript'>
        alert('Se ha borrado el empleado');
        window.location='aEmpleado.php';
        </script>";
}

mysqli_close($conectado);
?>