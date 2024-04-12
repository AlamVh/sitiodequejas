<?php

require 'conexion.php';

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['email'];
$password = $_POST['password'];

$query_comprobacion = "select count(*) as verificar from usuarios where telefono = '$telefono' or correo = '$correo'";

$stmt = $conn->prepare($query_comprobacion);
$stmt -> execute();

foreach($stmt as $v){
    if ($v['verificar'] == 1){
        echo '<script>alert("El correo o el teléfono ya existen");window.location.href="index.php"</script>';
    }
}

$query_registro = "insert into usuarios (id_comprador, nombre, telefono, correo, contrasena) values (null, '$nombre','$telefono','$correo', '$password')";

$stmt = $conn->prepare($query_registro);

if ($stmt -> execute()){
    echo '<script>alert("Usuario registrado");window.location.href="index.php"</script>';
}