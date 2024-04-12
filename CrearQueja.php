<?php
  require('conexion.php');
  session_start();
  $rol = $_SESSION['rol'];
  if ($rol != 'Comprador') {
    header("location:index.php");
  }
?>
<?php


// Verifica que el método de solicitud sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los datos del formulario
    $nombre = mysqli_real_escape_string($conectado, $_POST['nombre']);
    $correo = mysqli_real_escape_string($conectado, $_POST['correo']);
    $descripcion = mysqli_real_escape_string($conectado, $_POST['descripcion']);
    
    // Define el estado como "Pendiente"
    $estado = 'Pendiente';
    
    // Inserta la queja en la tabla "quejas" con el estado "Pendiente"
    $consulta = "INSERT INTO quejas (nombre_cliente, email_cliente, queja, estado) VALUES ('$nombre', '$correo', '$descripcion', '$estado')";
    $resultado = mysqli_query($conectado, $consulta);
    
    if ($resultado) {
        // Si la inserción fue exitosa, muestra un mensaje de éxito
        echo "<script>alert('Queja enviada con éxito.'); window.location.href = 'PaginaPrincipal.php';</script>";
    } else {
        // Si hubo un error, muestra un mensaje de error
        echo "<script>alert('Hubo un error al procesar la queja: " . mysqli_error($conectado) . "'); window.location.href = 'PaginaPrincipal.php';</script>";
    }
} else {
    // Si el método de solicitud no es POST, redirige a la página de inicio
    header('Location: index.php');
}

mysqli_close($conectado);
?>
