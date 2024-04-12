<?php
require('conexion.php');


$opinion = $_POST["opinion"]; 
$idComprador = $_POST["idComprador"]; 
$idVendedor = $_POST["idVendedor"]; 
$id_refaccion = $_POST["id_refaccion"]; 

$insertar = "INSERT INTO `opiniones` (`id_opinion`, `opinion`, `id_comprador`, `id_vendedor`) 
VALUES ('', '$opinion', '$idComprador', '$idVendedor')";
    
    $rta = mysqli_query($conectado, $insertar);

    if(!$rta){
        echo "<script text='text/javascript'>
        alert('No pudimos registrar tu opinion, lo sentimos');
        window.location='compradorDetalles.php?id_refaccion=$id_refaccion';
        </script>";
    }else{
        echo "<script text='text/javascript'>
            alert('¡GRACIAS POR DEJAR TU OPINION!');
            window.location='compradorDetalles.php?id_refaccion=$id_refaccion';
            </script>";
        
        } 
mysqli_free_result($rta);
mysqli_close($conectado);
?>