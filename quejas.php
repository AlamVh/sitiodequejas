<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "don_cangrejo_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar la queja enviada por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $queja = $_POST['queja'];

    // Insertar la queja en la base de datos
    $sql = "INSERT INTO quejas (nombre_cliente, email_cliente, queja, estado) 
            VALUES ('$nombre', '$email', '$queja', 'pendiente')";

    if ($conn->query($sql) === TRUE) {
        echo "Queja enviada correctamente";
    } else {
        echo "Error al enviar la queja: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
