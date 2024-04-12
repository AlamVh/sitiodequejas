<?php
require('conexion.php');

$id = $_POST['id_cat'];
$nombreC = $_POST['nombreC'];

$actualizar ="UPDATE `categorias` SET `nombreC`='$nombreC' WHERE id_categoria = '$id'";

$resultado=$conectado->query($actualizar);

if(!$resultado) {
    
    echo "<script text='text/javascript'>
        alert('No se pudo actualizar 😢');
        window.location='aCategorias.php';
        </script>";

}
else {
    echo "<script text='text/javascript'>
        alert('Se actualizo con exito');
        window.location='aCategorias.php';
        </script>";
}

mysqli_close($conectado);
?>