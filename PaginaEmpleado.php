<?php
require('conexion.php');
session_start();
$id_vendedor = $_SESSION['id_vendedor'];
$nombre = $_SESSION['nombre']; 
$rol = $_SESSION['rol'];
    
    if ($rol != 'Vendedor') {
        header("location:index.php");
    }
?>
<?php
include("conexion.php");
$consultaP = "SELECT `vendedores`.`id_vendedor`
FROM `vendedores` 
	;";
$resultadoP = mysqli_query($conectado,$consultaP);  
?>
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/ico.PNG" />
    <title>Pagina principal</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>


<body>
<?php include('fragmentos/menuAdministrador.php'); ?>
    
    <header class="header" id="inicio">
        <div class="contenedor head">
            <h1 class="titulo">Bienvenido <?php echo $nombre ?></h1>
            <p class="copy">¡Aquí podrás ver las solicitudes que te fueron asignadas!</p>
        </div>

    </header>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item linkBreadcrumb"><a href="cerrarsesion.php">Cerrar sesión</a></li>
                    <li class="breadcrumb-item linkBreadcrumb">Pagina Principal</a></li>


            </ol>
        </nav>
    </div>
    
    <main> 
        <br>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Modificar Mis Datos</h5>
                            <p class="card-text">Ver mis datos</p>
                            <a href="EmpleadoActualizar.php" class="btn" id="btnbuscadorA">Modificar</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                            <h5 class="card-title">Quejas Y Devoluciones Asignadas</h5>
                            <p class="card-text">Ver quejas y devoluciones asignadas</p>
                            <a href="VistaSeguimientoQuejaEmpleado.php" class="btn" id="btnbuscadorA">Ver</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    
                </div>
                
                
            </div>
        </div>

        <br><br>
    </main>

    <footer id="contacto">
        <div class="contenedor footer-content">
            <div class="contact-us">
                <h2 class="brand">&copy;Restaurante PQR</h2>
                <p>!Nosotros Te Escuchamos¡</p>
            </div>
            <div class="social-media">
                <a href="#" target="_blank" class="social-media-icon">
                    <i class='bx bxl-facebook'></i>
                </a>
                <a href="#" target="_blank" class="social-media-icon">
                    <i class='bx bxl-instagram'></i>
                </a>
            </div>
        </div>
        <div class="line"></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>