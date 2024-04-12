<?php
    require('conexion.php');
    session_start();
    $rol = $_SESSION['rol'];
    if ($rol != 'Administrador') {
        header("location:index.php");
    }
    
    // Verifica si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtiene los datos del formulario
        $id_queja = $_POST['id_queja'];
        $id_vendedor = $_POST['id_vendedor'];

        // Actualiza el estado de la queja a "Asignada"
        $consulta_update = "UPDATE quejas SET estado = 'Asignada', asignar = $id_vendedor WHERE id_queja = $id_queja";
        $resultado_update = mysqli_query($conectado, $consulta_update);

        // Verifica si la actualización fue exitosa
        if ($resultado_update) {
            // Muestra un mensaje de éxito
            echo "<script>alert('La queja ha sido asignada exitosamente.'); window.location.href = 'AsignarQueja.php';</script>";
        } else {
            // Si hubo un error, muestra un mensaje de error
            echo "<script>alert('Error al actualizar el estado de la queja.'); window.location.href = 'AsignarQueja.php';</script>";
        }
    } else {
        // Si no se envió el formulario, redirige a la página principal
        header("Location: AsignarQueja.php");
        exit();
    }
?>
