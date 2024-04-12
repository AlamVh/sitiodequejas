<?php

$servidor = "localhost";
$usuario = "root";
$pass = "";
$BD = "mirefaccion";

$conectado = new mysqli($servidor,$usuario,$pass,$BD);

mysqli_set_charset($conectado,'utf8');

try{
    $conn = new PDO("mysql:host = $servidor;dbname=$BD", $usuario,$pass);
}catch (Exception $e){
    echo "Ocurrió un error en la conexión" .$e->getMessage();
}

//Agarrar variable $conectado para poder hacer todo


//Conprobar conexion
// if($conectado -> connect_error){
//     echo ("<script text= 'text/javascript'>
//     alert('ERROR!, la conexión no se pudo establecer');
//     </script>");
// } else {
//     echo ("<script text= 'text/javascript'>
//     alert('Conexion establecida');
//     </script>");
// }
?>