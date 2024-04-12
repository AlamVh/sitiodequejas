<?php
  require('conexion.php');
  session_start();
  $rol = $_SESSION['rol'];
  if ($rol != 'Administrador') {
    header("location:index.php");
  }

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
                <li class="breadcrumb-item">Tipos</li>
            </ol>
        </nav>
    </div>

    <main>
        <br>
        <div class="container table-responsive tablaR">
            <table class="table" id="example">
                <caption class="caption-top">Lista de tipos de solicitudes</caption>
                <thead class="cabezaTabla">
                    <tr>
                        <div class="col container">
                            <br>
                            <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <button class="botonBuscar mb-3" id="btnbuscadorA" type="button">Agregar Tipo</button>
                            </a>
                        </div>
                    </tr>
                    <tr class="container">
                        <th scope="col">ID</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Actualizar</th>
                    </tr>
                    
                </thead>
                <tbody class="table-group-divider">
                    <?php
                        include("conexion.php");
                        $consulta= "SELECT * FROM marcas";
                        $bd=mysqli_query($conectado,$consulta);
                        $contador = 1;
                        while($bd2=mysqli_fetch_array($bd)){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $contador++ ?></th>
                        <td><?php echo $bd2 ['nombreM'];?></td>
                        <td><a href="aEditarTipo.php?id_marca=<?php echo $bd2 ['id_marca']; ?>"><img src="./img/bx-detail.svg" alt="" srcset=""></a> &nbsp;&nbsp;&nbsp;
                            <a href="BDEliminarTipo.php?id_marca=<?php echo $bd2 ['id_marca']?> "onclick="return confirmarEliminar()"><img src="./img/bx-trash-alt.svg" alt="" srcset=""></a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>

        </div>

        <script>
        $(document).ready(function() {
            $('#example').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                scrollY: 400,
                lengthMenu: [
                    [10, 25, -1],
                    [10, 25, "Todos"]
                ],
            });
        });
        </script>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo Tipo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-floating" action="AgregarTipo.php" method="post">
                        <input type="text" class="form-control" id="nombreM" name="nombreM" maxlength="20"
                            id="floatingInputValue" placeholder="xxxxxxx">
                        <label for="floatingInputValue">Nombre del tipo</label>
                        <br>
                        <button class="btn" id="btnbuscador" onclick="validarMarca(event)">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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