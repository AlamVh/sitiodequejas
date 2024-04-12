<?php
require('conexion.php');
session_start();
$id_comprador = $_SESSION['id_comprador'];
$id_refaccion = $_GET["id_refaccion"];
$rol = $_SESSION['rol']; 

if ($rol != 'Comprador') {
    header("location:index.php");
  }

$consultaV = "SELECT `refacciones`.*, `marcas`.`nombreM`, `categorias`.`nombreC`, `vendedores`.`telefono`
FROM `refacciones` 
	LEFT JOIN `marcas` ON `refacciones`.`id_marca` = `marcas`.`id_marca` 
	LEFT JOIN `categorias` ON `refacciones`.`id_categoria` = `categorias`.`id_categoria` 
	LEFT JOIN `vendedores` ON `refacciones`.`id_vendedor` = `vendedores`.`id_vendedor`
WHERE `refacciones`.`id_refaccion` = '$id_refaccion'";
$resultadoV = mysqli_query($conectado,$consultaV);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/ico.png" />
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/58db920ed6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <title>Mis refacciones</title>
</head>


<body>

    <?php include("fragmentos/menuComprador.php"); ?>

    <div class="container breadDetalles">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item linkBreadcrumb"><a href="cerrarsesion.php">Cerrar sesión</a></li>
                <li class="breadcrumb-item linkBreadcrumb"><a href="catalogo.php">Lista de refacciones</a></li>
                <li class="breadcrumb-item linkBreadcrumb active" aria-current="page">Detalles de refacción</li>
            </ol>
        </nav>
    </div>
    <?php 
        while ($row = mysqli_fetch_assoc($resultadoV)) {
            $idVendedor = $row["id_vendedor"];
    ?>
    <div class="container text-center gridDetalles">
        <div class="row fs-4">
            <div class="col">
                <img src="imgVendedores/<?php echo $row ["imagen"]; ?>" class="img-thumbnail imf-fluid w-25">
            </div>
        </div>
        <br><br>

        <div class="row fs-4">
            <div class="col">
                <span class="fw-bold textoRe">Refaccion: </span><?php echo $row ["nombreC"]; ?>
            </div>
            <div class="col">
                <span class="fw-bold textoRe">Marca: </span><?php echo $row ["nombreM"]; ?>
            </div>
            <div class="col">
                <span class="fw-bold textoRe">Modelo: </span><?php echo $row ["modelo"]; ?>
            </div>
        </div>
        <br><br>
        <div class="row fs-4">
            <div class="col">
                <span class="fw-bold textoRe">Uso: </span><?php echo $row ["estatus"]; ?>
            </div>
            <div class="col">
                <span class="fw-bold textoRe">Precio: $</span><?php echo $row ["precio"]; ?>
            </div>
            <div class="col">
                <span class="fw-bold textoRe">Contacto: </span><?php echo $row ["telefono"]; ?>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col">
                <span class="fw-bold textoRe fs-4">Descripción: </span> <?php echo $row ["descripcion"]; ?>
            </div>
            <div class="col">
                <a href="https://api.whatsapp.com/send?phone=<?php echo $row ["telefono"]; ?>&text=Hola%2C%20quisiera%20informes%20sobre%20su%20refacción"
                    target="_blank">
                    <button class="botonBuscar mb-3" id="btnbuscadorA" type="button">Ponerse en contacto</button>
                </a>
            </div>
            <div class="col">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <button class="botonBuscar mb-3" id="btnbuscadorA" type="button">Hacer comentario sobre el
                        vendedor</button>
                </a>
            </div>
        </div>
    </div>
    <?php
        }
        mysqli_free_result($resultadoV);
    ?>

    <!-- Carrusel opiniones -->
    <br><br><br>
    <div class="container">
        <div class="d-flex justify-content-center">
            <span class="fw-bold fs-2">Opiniones de compradores hacia el vendedor</span>
        </div>
    </div>
    <hr class="container w-50">
    <br><br><br>

    <div id="carouselExampleDark" class="carousel carousel-dark slide container" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php 
                $opiniones = mysqli_query($conectado, "SELECT `opiniones`.*, `vendedores`.`id_vendedor`, `usuarios`.`nombre`
                FROM `opiniones` 
                    LEFT JOIN `vendedores` ON `opiniones`.`id_vendedor` = `vendedores`.`id_vendedor` 
                    LEFT JOIN `usuarios` ON `opiniones`.`id_comprador` = `usuarios`.`id_comprador`
                WHERE `vendedores`.`id_vendedor` = '$idVendedor';");
                $opinion = mysqli_fetch_array($opiniones);
                if (isset($opinion)) {
            ?>
            <div class="carousel-item active" data-bs-interval="2000">
                <div class="container w-50">
                    <div class="card">
                        <h5 class="card-header">Nombre del comprador: <span
                                class="fw-normal"><?php echo $opinion ["nombre"]; ?></span></h5>
                        <div class="card-body">
                            <h5 class="card-title">Opinion acerca del vendedor:</h5>
                            <p class="card-text"><?php echo $opinion ["opinion"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
                while($ops = mysqli_fetch_array($opiniones)){
                    if (isset($ops)) {
            ?>
            <div class="carousel-item" data-bs-interval="2000">
                <div class="container w-50">
                    <div class="card">
                        <h5 class="card-header">Nombre del comprador: <span
                                class="fw-normal"><?php echo $ops ["nombre"]; ?></span></h5>
                        <div class="card-body">
                            <h5 class="card-title">Opinion acerca del vendedor:</h5>
                            <p class="card-text"><?php echo $ops ["opinion"]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
                mysqli_free_result($opiniones);
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
    <br><br><br>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Opinionen sobre el vendedor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="container fs-6 fw-normal">
                        Realiza un comentario a cerca de la experiencia que tengas con el vendedor.
                    </span>
                    <br><br>
                    <form action="BDOpinion.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" maxlength="250" id="opinion" name="opinion"
                                placeholder="name@example.com">
                            <label for="floatingInput">Deja tu opinion acerca del vendedor</label>
                            <input type="text" name="idComprador" id="idComprador" value="<?php echo $id_comprador?>"
                                hidden>
                            <input type="text" name="idVendedor" id="idVendedor" value="<?php echo $idVendedor?>"
                                hidden>
                            <input type="text" name="id_refaccion" id="id_refaccion" value="<?php echo $id_refaccion?>"
                                hidden>
                            <br>
                            <button type="submit" class="btn" id="btnbuscadorA"
                                onclick="validarOpinion(event);">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" id="btnbuscadorA" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <?php include('fragmentos/footer.php'); ?>
</body>
<script src="js/validaciones.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

</html>