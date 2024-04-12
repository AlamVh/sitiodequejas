<?php
require('conexion.php');

$id = $_POST['id_marca'];
$nombreM = $_POST['nombreM'];

$actualizar ="UPDATE `marcas` SET `nombreM`='$nombreM' WHERE id_marca = '$id'";

$resultado=$conectado->query($actualizar);

if(!$resultado) {
    
    echo "<script text='text/javascript'>
        alert('No se pudo actualizar 😢');
        window.location='aTipos.php';
        </script>";

}
else {
    echo "<script text='text/javascript'>
        alert('Se actualizo con exito');
        window.location='aTipos.php';
        </script>";
}

mysqli_close($conectado);
?>