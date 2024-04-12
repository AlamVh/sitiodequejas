<?php
  require('conexion.php');
  session_start();
  $rol = $_SESSION['rol'];
  if ($rol != 'Administrador') {
    header("location:index.php");
  }
  $id_cat = $_GET["id_cat"];

$consulta = "SELECT * FROM `categorias` WHERE id_categoria = '$id_cat' ";
$resultado = mysqli_query($conectado,$consulta);
?>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <?php include('fragmentos/menuAdministrador.php'); ?>

    <div class="container breadDetalles">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="cerrarsesion.php">Pagina principal</a></li>
                <li class="breadcrumb-item"><a href="administrador.php">Administrador</a></li>
                <li class="breadcrumb-item"><a href="aMarcas.php">Lista de marcas</a></li>
                <li class="breadcrumb-item">Editar marca</li>
            </ol>
        </nav>
    </div>

    <main>
        <br>
        <section>
            <div class="container">
                <div class="d-flex justify-content-center">
                    <span class="fw-bold fs-2">Modificar categoria</span>
                </div>
            </div>
            <hr class="container w-50">
            <br>
            <form action="BDActualizarCat.php" class="form-floating" method="post">

                <div class="container text-center row">
                    <div class="col"></div>
                    <?php 
                        while ($row = mysqli_fetch_assoc($resultado)) {
                    ?>
                    <div class="col">
                        <input type="text" value="<?php echo $row["id_categoria"] ?>" name="id_cat" hidden>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="nombreC" name="nombreC" maxlength="20"
                                value="<?php echo $row["nombreC"] ?>" placeholder="xxxxxxx">
                            <label for="floatingPassword">Nombre de la categoria</label>
                        </div>
                        <br>
                    </div>
                    <div class="col"></div>
                </div>

                <?php
                        }
                        mysqli_free_result($resultado);
                    ?>
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                        <button class="btn" id="btnbuscador" onclick="validarCategoria(event)">Actualizar</button>
                    </div>
                </div>
            </form>
        </section>
    </main>
    <br><br><br>

    <?php include('fragmentos/footer.php'); ?>
    <script src="js/validaciones.js"></script>
    <script src="js/confirmarEliminacion.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>