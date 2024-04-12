<?php
require('conexion.php');
session_start();
$id_vendedor = $_SESSION['id_vendedor'];

$rol = $_SESSION['rol'];

// Verificar que el usuario es un vendedor
if ($rol != 'Vendedor') {
    header("location:index.php");
    exit();
}

// Obtener el id_queja de la URL
if (isset($_GET['id_queja'])) {
    $id_queja = $_GET['id_queja'];
} else {
    // Si no se proporciona un id_queja, redirige al usuario
    header("location:PaginaEmpleado.php");
    exit();
}

// Consulta para obtener los detalles de la queja específica
$query = "SELECT nombre_cliente, queja, estado FROM quejas WHERE id_queja = ? AND asignar = ?";
$stmt = $conectado->prepare($query);
$stmt->bind_param('ii', $id_queja, $id_vendedor);
$stmt->execute();
$stmt->bind_result($nombre_cliente, $descripcion_queja, $estado);
$stmt->fetch();
$stmt->close();

// Verificar si se encontraron resultados
if (!$nombre_cliente) {
    echo "No se encontró la queja especificada.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/58db920ed6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="shortcut icon" href="img/ico.png" />
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <title>Mis refacciones</title>
</head>

<body onload="cantidadMenor()">

    <?php include('fragmentos/menuVendedor.php'); ?>

    <div class="container breadDetalles">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="cerrarsesion.php">Cerrar Sesion</a></li>
                <li class="breadcrumb-item"><a href="PaginaEmpleado.php">Pagina Principal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quejas y Devoluciones</li>
            </ol>
        </nav>
    </div>

    <div class="container text-center gridDetalles">
        <div class="row fs-4">
            <!-- Puedes agregar contenido aquí -->
        </div>
        <br><br>
        <div class="row fs-4">
            <div class="col">
                <span class="fw-bold textoRe">Nombre Cliente: </span>
                <?php echo htmlspecialchars($nombre_cliente); ?>
            </div>
            <div class="col">
                <span class="fw-bold textoRe">Tipo: </span>
                <span>Queja</span>
            </div>
            <div class="col">
                <span class="fw-bold textoRe">Descripción: </span>
                <?php echo htmlspecialchars($descripcion_queja); ?>
            </div>
        </div>
        <br><br>
        <div class="row fs-4">
            <div class="col">
                <span class="fw-bold textoRe">Estado: </span>
                <?php echo htmlspecialchars($estado); ?>
            </div>
            <div class="col">
                <span class="fw-bold textoRe">Responder:</span>
                <!-- Cuadro de texto para responder -->
                <textarea class="form-control" name="respuesta" rows="4"></textarea>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col">
                <a href="#?id_refaccion=<?php echo $id_queja; ?>">
                    <button class="botonBuscar mb-3" id="btnbuscadorA" type="button">Enviar</button>
                </a>
            </div>
            <div class="col">
                <a href="PaginaEmpleado.php">
                    <button class="btn btn-outline-danger mb-3" id="" type="button">Regresar</button>
                </a>
            </div>
        </div>
    </div>

    <?php include('fragmentos/footer.php'); ?>

</body>

<script src="js/confirmarEliminacion.js"></script>
<script src="js/cantidadMenor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>
