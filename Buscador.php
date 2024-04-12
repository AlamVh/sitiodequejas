<?php

$buscar = $_POST["buscar"];

if ($buscar == "cuenta" || $buscar == "registrarme" || $buscar == "vender") {
    echo "<script text='text/javascript'>
    window.location='index.php#cuenta';
    </script>";
} else if($buscar == "refacciones" || $buscar == "productos" || $buscar == "autopartes") {
    echo "<script text='text/javascript'>
    window.location='index.php#carrusel';
    </script>";
} else if($buscar == "quienes somos" || $buscar == "quienes son" || $buscar == "informacion") {
    echo "<script text='text/javascript'>
    window.location='index.php#servicio2';
    </script>";
} else if($buscar == "marcas" || $buscar == "autos" || $buscar == "logos" || $buscar == "portafolio") {
    echo "<script text='text/javascript'>
    window.location='index.php#portafolio';
    </script>";
} else if($buscar == "contacto" || $buscar == "informes" || $buscar == "dudas") {
    echo "<script text='text/javascript'>
    window.location='index.php#contactoF';
    </script>";
} else {
    echo "<script text='text/javascript'>
    window.location='index.php';
    </script>";
}
?>
