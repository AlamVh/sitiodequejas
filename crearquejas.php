<?php
require('conexion.php');
session_start();
$id_vendedor = $_SESSION['id_comprador'];
$nombre = $_SESSION['nombre']; 
$rol = $_SESSION['rol']; 

if ($rol != 'Comprador') {
    header("location:index.php");
}

$consultaS = "SELECT `refacciones`.`estatus`, `marcas`.`nombreM`, `categorias`.`nombreC`
FROM `refacciones` 
    LEFT JOIN `marcas` ON `refacciones`.`id_marca` = `marcas`.`id_marca` 
    LEFT JOIN `categorias` ON `refacciones`.`id_categoria` = `categorias`.`id_categoria`;";
$resultadoS = mysqli_query($conectado, $consultaS);

$consultaC = "SELECT `refacciones`.`estatus`, `marcas`.`nombreM`, `categorias`.`nombreC`
FROM `refacciones` 
    LEFT JOIN `marcas` ON `refacciones`.`id_marca` = `marcas`.`id_marca` 
    LEFT JOIN `categorias` ON `refacciones`.`id_categoria` = `categorias`.`id_categoria`;";
$resultadoC = mysqli_query($conectado, $consultaC);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="img/ico.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Refacciones y autopartes</title>
</head>

<body>
    <header class="header" id="inicio">
        <?php include("fragmentos/menuComprador.php"); ?>
        <div class="contenedor head" id="inicio">
            <h1 class="titulo">Bienvenido <?php echo $nombre; ?></h1>
            <p class="copy">¡Nosotros Te Escuchamos!</p>
        </div>
    </header>

    <main>
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item linkBreadcrumb"><a href="cerrarsesion.php">Cerrar sesión</a></li>
                    <li class="breadcrumb-item linkBreadcrumb"><a href="PaginaPrincipal.php">Pagina Principal</a></li>
                    <li class="breadcrumb-item linkBreadcrumb active" aria-current="page" >Crear Queja</li>
                </ol>
            </nav>
        </div>

        <section class="contenedor" id="expertos">
            <h2>Formulario de Solicitudes</h2>
            <form action="CrearQueja.php" method="POST">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="mb-3">
        <label for="correo" class="form-label">Correo Electrónico</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción de la Queja</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
    </div>

    <div class="d-flex justify-content-center" style="gap: 10cm;">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="PaginaPrincipal.php" class="btn btn-outline-danger">Regresar</a>
    </div>
</form>

            
        </section>

        <section class="imagen-light">
            <img class="close" src="img/closeLight.svg" alt="">
            <img class="agregar-imagen" src="" alt="">
        </section>
    </main>

    <?php include('fragmentos/footer.php'); ?>
    <script src="js/cerrarMenu.js"></script>
    <script src="js/lightbox.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
