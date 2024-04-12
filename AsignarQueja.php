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
    <title>Página principal</title>
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
                <li class="breadcrumb-item linkBreadcrumb"><a href="cerrarsesion.php">Cerrar sesión</a></li>
                <li class="breadcrumb-item linkBreadcrumb"><a href="administrador.php">Pagina Principal</a></li>
                <li class="breadcrumb-item linkBreadcrumb active" aria-current="page">Mis Quejas</li>
            </ol>
        </nav>
    </div>

    <main>

        <div class="container table-responsive tablaR">
            <table class="table" id="example">
                <caption class="caption-top">Lista de clientes</caption>
                <thead class="cabezaTabla">
                    <tr class="container">
                        <th scope="col">Id_Queja</th>
                        <th scope="col">Queja o Devolucion</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Asignar</th>
                        <th scope="col">Reasignar</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
    <?php
    include("conexion.php");
    $consulta = "SELECT q.id_queja, q.queja, q.estado, q.asignar, v.nombre AS nombre_vendedor 
                FROM quejas q 
                LEFT JOIN vendedores v ON q.asignar = v.id_vendedor";
    $bd = mysqli_query($conectado, $consulta);
    while ($bd2 = mysqli_fetch_array($bd)) {
    ?>
        <tr>
            <td><?php echo $bd2['id_queja']; ?></td>
            <td><?php echo $bd2['queja']; ?></td>
            <td><?php echo $bd2['estado']; ?></td>
            <td>
                <?php if ($bd2['estado'] == 'Asignada' && !empty($bd2['nombre_vendedor'])) { ?>
                    <?php echo $bd2['nombre_vendedor']; ?>
                <?php } else { ?>
                    <form action="aQueja.php" method="POST">
                        <select name="id_vendedor">
                            <?php
                            $query_vendedores = "SELECT * FROM vendedores";
                            $result_vendedores = mysqli_query($conectado, $query_vendedores);
                            while ($vendedor = mysqli_fetch_array($result_vendedores)) {
                                echo "<option value='" . $vendedor['id_vendedor'] . "'>" . $vendedor['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                        <input type="hidden" name="id_queja" value="<?php echo $bd2['id_queja']; ?>">
                        <button type="submit">Asignar</button>
                    </form>
                <?php } ?>
            </td>
            <td>
                <form action="reasignarQueja.php" method="POST">
                    <select name="id_vendedor">
                        <?php
                        $query_vendedores = "SELECT * FROM vendedores";
                        $result_vendedores = mysqli_query($conectado, $query_vendedores);
                        while ($vendedor = mysqli_fetch_array($result_vendedores)) {
                            echo "<option value='" . $vendedor['id_vendedor'] . "'>" . $vendedor['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="hidden" name="id_queja" value="<?php echo $bd2['id_queja']; ?>">
                    <button type="submit">Reasignar</button>
                </form>
            </td>
        </tr>
    <?php
    }
    ?>
</tbody>



            </table>

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

    <?php include('fragmentos/footer.php'); ?>
    <script src="js/confirmarCancelacion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
