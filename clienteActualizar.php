<?php
require('conexion.php');
session_start();
$id_comprador = $_SESSION['id_comprador'];
$nombre = $_SESSION['nombre'];
$rol = $_SESSION['rol']; 

if ($rol != 'Comprador') {
    header("location:index.php");
  }


$consultaS = "SELECT `usuarios`.*, `usuarios`.`id_comprador`
FROM `usuarios`
WHERE `usuarios`.`id_comprador` = '$id_comprador';";
$resultadoS = mysqli_query($conectado,$consultaS);

?>
<!DOCTYPE html>
<html lang="es">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="img/ico.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Refacciones y autopartes</title>
</head>

<body>
    <?php include("fragmentos/menuComprador.php"); ?>

    <main>

        <div class="container breadDetalles">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item linkBreadcrumb"><a href="cerrarsesion.php">Cerrar sesión</a></li>
                    <li class="breadcrumb-item linkBreadcrumb"><a href="PaginaPrincipal.php">Pagina Inicial</a></li>
                    <li class="breadcrumb-item linkBreadcrumb active" aria-current="page">Modificar mis datos</li>
                </ol>
            </nav>
        </div>

        <br><br>
        <section>
            <div class="container">
                <div class="d-flex justify-content-center">
                    <span class="fw-bold fs-2">Modificar mis datos</span>
                </div>
            </div>
            <hr class="container w-50">
            <br>
            <form action="BDActualizarCliente.php" method="POST">
                <?php 
                    while ($row = mysqli_fetch_assoc($resultadoS)) {
                ?>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                            <input type="text" id="id_comprador" name="id_comprador" value="<?php echo $row['id_comprador']; ?>" hidden>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="xxxxxxxx"
                                    value="<?php echo $row['nombre']; ?>">
                                <label for="floatingInput">Nombre:</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" maxlength="10" id="tel" name="tel"
                                    placeholder="xxxxxxxx" value="<?php echo $row['telefono']; ?>">
                                <label for="floatingInput">Teléfono:</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="correo" name="correo"
                                    placeholder="example@example.com" value="<?php echo $row['correo']; ?>">
                                <label for="floatingInput">Correo electronico:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="pass" name="pass"
                                    value="<?php echo $row['contrasena']; ?>" placeholder="xxxxxxxx">
                                <label for="floatingInput">Contraseña:</label>
                            </div>
                        </div>
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <?php 
                    } 
                    mysqli_free_result($resultadoS);
                    ?>
                    <div class="row">

                        <div class="col">
                            <button type="submit" class="btn btn-outline-success"
                                onclick="validarActualizarC(event)">Editar</button>
                        </div>
                        <div class="col">
                        <a href="PaginaPrincipal.php" class="btn btn-outline-danger">Regresar</a>


                        </div>
                    </div>
                </div>
            </form>
        </section>
        <br><br><br>
    </main>


    <?php include('fragmentos/footer.php'); ?>
 
   <script src="js/validaciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>