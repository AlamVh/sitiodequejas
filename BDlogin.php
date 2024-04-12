<?php
require('conexion.php');
$usr = $_POST["correoL"];
$pass = $_POST["passL"];  

// echo($usr);
// echo('<br>');
// echo($pass);

//consulta administrador
$consultaA = "SELECT * FROM `administrador` WHERE correo = '$usr' and contraseña = '$pass'";

$resultadoA = mysqli_query($conectado,$consultaA);

$filasA = mysqli_fetch_array($resultadoA);

if (isset($filasA['correo']) && isset($filasA['contraseña'])) {
    
    if ($usr == $filasA['correo'] && $pass == $filasA['contraseña']) {
        
        session_start();
        $_SESSION['correo'] = $filasA['correo']; 
        $_SESSION['nombre'] = $filasA['nombre']; 
        $_SESSION['rol'] = "Administrador"; 
        echo "<script text='text/javascript'>
        alert('Inicio de sesión correcto, BIENVENIDO ADMINISTRADOR!!!.');
        window.location='administrador.php';
        </script>";

    }  
        

} else {
    //consulta usuarios
    $consultaU = "SELECT * FROM `usuarios` WHERE correo = '$usr' and contrasena = '$pass'";

    $resultadoU = mysqli_query($conectado,$consultaU);

    $filasU = mysqli_fetch_array($resultadoU);

    if (isset($filasU['correo']) && isset($filasU['contrasena'])) {

        if ($usr == $filasU['correo'] && $pass == $filasU['contrasena']) {

            session_start();
            $_SESSION['correo'] = $filasU['correo']; 
            $_SESSION['nombre'] = $filasU['nombre']; 
            $_SESSION['id_comprador'] = $filasU['id_comprador']; 
            $_SESSION['rol'] = "Comprador"; 
            echo "<script text='text/javascript'>
            alert('Inicio de sesión correcto, BIENVENIDO CLIENTE!!!.');
            window.location='PaginaPrincipal.php';
            </script>";

        } else {
            echo "<script text='text/javascript'>
            alert('Usuario y/o Contraseña incorrecta.');
            window.location='index.php';
            </script>";
        }

        mysqli_free_result($resultadoU);

    } else {
        
        //consulta vendedor
        $consultaV = "SELECT * FROM `vendedores` WHERE correo = '$usr' and contraseña = '$pass'";

        $resultadoV = mysqli_query($conectado,$consultaV);

        $filasV = mysqli_fetch_array($resultadoV);

        if (isset($filasV['correo']) && isset($filasV['contraseña'])) {
    
            if ($filasV['correo'] == $usr && $filasV['contraseña'] == $pass) {
                session_start();
                $_SESSION['correo'] = $filasV['correo']; 
                $_SESSION['nombre'] = $filasV['nombre']; 
                $_SESSION['id_vendedor'] = $filasV['id_vendedor']; 
                $_SESSION['rol'] = "Vendedor"; 
                echo "<script text='text/javascript'>
                alert('Inicio de sesión correcto, BIENVENIDO EMPLEADO!!!.');
                window.location='PaginaEmpleado.php';
                </script>";
            } else {
                echo "<script text='text/javascript'>
                alert('Usuario y/o Contraseña incorrecta.');
                window.location='index.php';
                </script>";
            }

        } else {
            echo "<script text='text/javascript'>
            alert('Usuario y/o Contraseña incorrecta.');
            window.location='index.php';
            </script>";
        }

        mysqli_free_result($resultadoV);
    }

} 

    echo "<script text='text/javascript'>
            alert('Usuario y/o Contraseña incorrecta.');
            window.location='index.php';
            </script>";
    
  
mysqli_free_result($resultadoA);
mysqli_close($conectado);
?>