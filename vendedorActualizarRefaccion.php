<?php
    require('conexion.php');
    session_start();
    $id_vendedor = $_SESSION['id_vendedor'];
    $id_refaccion = $_GET['id_refaccion'];
    $rol = $_SESSION['rol'];
    
    if ($rol != 'Vendedor') {
        header("location:index.php");
    }

    $consultaV = "SELECT `refacciones`.`id_refaccion`, `marcas`.`nombreM`, `categorias`.`nombreC`, `refacciones`.*, `vendedores`.`telefono`
                    FROM `refacciones` 
                        LEFT JOIN `marcas` ON `refacciones`.`id_marca` = `marcas`.`id_marca` 
                        LEFT JOIN `categorias` ON `refacciones`.`id_categoria` = `categorias`.`id_categoria` 
                        LEFT JOIN `vendedores` ON `refacciones`.`id_vendedor` = `vendedores`.`id_vendedor`
                    WHERE `refacciones`.`id_refaccion` = '$id_refaccion' AND `refacciones`.`id_vendedor` = '$id_vendedor';";
    
    $resultadoV = mysqli_query($conectado,$consultaV); 
    while ($row1 = mysqli_fetch_assoc($resultadoV)) {
        $id_categoria = $row1['id_categoria']; 
        $nombreC = $row1['nombreC'];
        $id_marca = $row1['id_marca'];
        $nombreM = $row1['nombreM'];
    } 

    $consultaC = "SELECT * FROM `categorias`;";
    $resultadoC = mysqli_query($conectado,$consultaC);

    $consultaM = "SELECT * FROM `marcas`;";
    $resultadoM = mysqli_query($conectado,$consultaM);

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
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <title>Refacciones y autopartes</title>
</head>

<body>
    <?php include('fragmentos/menuVendedor.php');?>

    <main>

        <div class="container breadDetalles">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="cerrarsesion.php">Pagina principal</a></li>
                    <li class="breadcrumb-item"><a href="CtrlRefacciones.php">Lista de mis refacciones</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Actualizar mis datos</li>
                </ol>
            </nav>
        </div>

        <br><br>
        <section>
            <div class="container">
                <div class="d-flex justify-content-center">
                    <span class="fw-bold fs-2">Modificar mis refacción</span>
                </div>
            </div>
            <hr class="container w-50">
            <br>
            <form action="BDCatalogoVendedor.php" method="post" enctype="multipart/form-data">
                
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" name="bandera" id="bandera" value="4" hidden>
                                <input type="text" name="id_refaccion" id="id_refaccion"
                                    value="<?php echo $id_refaccion;?>" hidden>

                                <label for="title">Refacción:</label>
                                <select name="categoria" id="categoria" class="form-select">
                                    <option value="<?php echo $id_categoria; ?>"><?php echo $nombreC; ?>
                                    </option>
                                    <?php 
                                        while ($row2 = mysqli_fetch_assoc($resultadoC)) {
                                    ?>
                                    <option value="<?php echo $row2 ["id_categoria"]; ?>"><?php echo $row2 ["nombreC"]; ?>
                                    </option>
                                    <?php
                                        }
                                        mysqli_free_result($resultadoC);
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="title">Marca</label>
                                <select name="marca" id="marca" class="form-select">
                                <option value="<?php echo $id_marca; ?>"><?php echo $nombreM; ?>

                                    <?php 
                                        while ($row3 = mysqli_fetch_assoc($resultadoM)) {
                                    ?>
                                    <option value="<?php echo $row3 ["id_marca"]; ?>"><?php echo $row3 ["nombreM"]; ?>
                                    </option>
                                    <?php
                                        }
                                        mysqli_free_result($resultadoM);
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php 
                            $resultadoT = mysqli_query($conectado,$consultaV); 
                            while ($row = mysqli_fetch_assoc($resultadoT)) {
                        ?>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" name="modelo"
                                    placeholder="example@example.com" value="<?php echo $row ['modelo'];?>">
                                <label for="floatingInput">Modelo:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="precio" name="precio" placeholder="xxxxxxxx"
                                    value="<?php echo $row ['precio'];?>">
                                <label for="floatingInput">Precio:</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="title">Marca</label>
                                <select name="estatus" id="estatus" class="form-select">
                                <option value="<?php echo $row ['estatus'];?>"><?php echo $row ['estatus'];?>
                                <option value="Nueva">Nueva
                                <option value="Seminueva">Seminueva
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="cantidad" name="cantidad"
                                    placeholder="xxxxxxxx" value="<?php echo $row ['cantidad'];?>">
                                <label for="floatingInput">Cantidad:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="textarea" class="form-control" id="descripcion" name="descripcion" maxlength="190"
                                    placeholder="xxxxxxxx" value="<?php echo $row ['descripcion'];?>">
                                <label for="floatingInput">Descripción:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="floatingInput">Mi imagen:</label>
                            <img src="imgVendedores/<?php echo $row ['imagen'];?>" class="w-50" alt="">
                        </div>
                        <div class="col">
                            <input class="form-control" type="file" id="formFile" name="foto">
                        </div>
                    </div>
                    <?php
                        }
                        mysqli_free_result($resultadoV);
                    ?>
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn" id="btnbuscadorA" onclick="validarRefaccion(event)">Actualizar</button>
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