<?php
require('conexion.php');
$id_comprador = $_POST["id_comprador"]; 
$nombre = $_POST["nombre"]; 
$tel = $_POST["tel"]; 
$correo = $_POST["correo"]; 
$pass = $_POST["pass"]; 


$actualizar = "UPDATE `usuarios` SET `nombre`='$nombre',`telefono`='$tel',`correo`='$correo',`contrasena`='$pass' WHERE `id_comprador` = '$id_comprador'";
$rta = mysqli_query($conectado, $actualizar);

if(!$rta){
    echo "<script text='text/javascript'>
    alert('No pudimos actualizar tu informacion');
    window.location='clienteActualizar.php';
    </script>";
}else{
    echo "<script text='text/javascript'>
        alert('Tus datos se actualizaron correctamente');
        window.location='clienteActualizar.php';
        </script>";
} 
mysqli_free_result($rta);
    
?>