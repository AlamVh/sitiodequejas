<?php

include ("conexion.php");

if (isset($_POST['contact'])){
    if(
        strlen ($_POST['nombreC']) >= 1 &&
        strlen ($_POST['apellidoC']) >= 1 &&
        strlen ($_POST['comentarioC']) >= 1 &&
        strlen ($_POST['telefonoC']) >= 1 &&
        strlen ($_POST['correoC']) >= 1 
    ){
        $nombreC = trim($_POST['nombreC']);
        $apellidoC = trim($_POST['apellidoC']);
        $comentarioC = trim($_POST['comentarioC']);
        $telefonoC = trim($_POST['telefonoC']);
        $correoC= trim($_POST['correoC']);


        $consulta = "INSERT INTO contactos(nombre, apellido, duda, telefono, correo)
        VALUES ('$nombreC', '$apellidoC','$comentarioC','$telefonoC','$correoC')";
        $resultado= mysqli_query($conectado, $consulta);


        if($resultado){
            ?>
            <h4 class="succes" event.preventDefault>Tu comentario se a enviado</h4>
            <?php
        } else {
            ?>
            <h3 class="error" event.preventDefault>Ocurrio un error</h3>
            <?php
        }
    } else { ?> <h4 class="error" event.preventDefault>Llena todos los campos</h4> <?php
    }

}

?>
