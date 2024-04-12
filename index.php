
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <header class="headerI" id="inicio">

        <nav class="navbar navbar-expand-lg fixed-top barra">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand text-light" href="#inicio">C R M</a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                    </ul>
                    <form action="Buscador.php" method="POST" class="d-flex" role="search">
                        <input class="form-control me-2" type="text" name="buscar" id="buscarP" placeholder="Buscar"
                            aria-label="Search">
                        <button class="btn" id="btnbuscador" name="enviar" type="submit"><i
                                class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="contenedor head">
            <h1 class="titulo">C R M</h1>
            <p class="copy">Te Agredecemos Que Te Pongas En Contacto Con Nosotros, Con Gusto Te Atenderemos.</p>
        </div>
    </header>
    <main>


        <section class="contenedor" id="cuenta">
            <h2 class="subtitulo">¿Ya tienes una cuenta?</h2>
            <div class="contenedor-servicio">
                <img src="img/Password_Outline.svg" alt="">
                <div class="checklist-servicio">
                    <div class="service">
                        <h3 class="n-service lh-1">
                            Si ya tienes una cuenta inicia sesión dando <a data-bs-toggle="modal"
                                href="#exampleModalToggle" class="link"> clic aquí</a>
                        </h3>
                        <p class="lh-1" id="texto">
                            Si no tienes una cuenta ingresa dando <a data-bs-target="#exampleModalToggle2"
                                data-bs-toggle="modal" class="link2 clic"> clic
                                aquí.</a>
                        </p>
                        
                    </div>
                </div>
            </div>
            <!-- Modal inicio de sesion -->
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                tabindex="-1">
                <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Iniciar sesión</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a data-bs-dismiss="modal" aria-label="Close"
                                                class="clic">Pagina principal</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Inicio de sesión</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="testbox">
                                <br><br>
                                <form action="BDlogin.php" method="post">

                                    <label id="icon" for="name"></label>
                                    <input type="text" name="correoL" id="correoL" placeholder="Email"
                                        class="inputTexto" />

                                    <label id="icon" for="name"><i class="icon-shield"></i></label>
                                    <input type="password" name="passL" id="passL" placeholder="Contraseña"
                                        class="inputTexto" maxlength="20" />

                                    <button type="submit" class="button boton"
                                        onclick="validarLogin(event)">Continuar</button>
                                </form>
                                <br>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal registro comprador -->
            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Registro de cliente</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a data-bs-dismiss="modal" aria-label="Close"
                                                class="clic">Pagina principal</a></li>
                                        <li class="breadcrumb-item" aria-current="page"><a
                                                data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                                                class="clic">Inicio de sesión</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Registro cliente
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            

                            <div class="testbox">
                                <br><br>
                                <form action="./registroCliente.php" method="post">

                                    <label id="icon" for="email"><i class="icon-envelope "></i></label>
                                    <input type="text" name="email" maxlength="100" id="emailCo" placeholder="Email"
                                        class="inputTexto" required />

                                    <label id="icon" for="nombre"><i class="icon-user"></i></label>
                                    <input type="text" name="nombre" id="nombreCo" maxlength="60" placeholder="Nombre"
                                        class="inputTexto" required />

                                    <label id="icon" for="telefono"><i class="icon-shield"></i></label>
                                    <input type="text" maxlength="10" name="telefono" id="telefonoCo" class="inputTexto"
                                        placeholder="Telefono" required />

                                    <label id="icon" for="password"><i class="icon-shield"></i></label>
                                    <input type="password" name="password" id="passwordCo" class="inputTexto"
                                        placeholder="Contraseña" maxlength="20" />

                                    <div class="btnFormLogin">
                                        <button type="sumbit" class="" id="btnbuscadorA"
                                            onclick="validarComprador(event)">Continuar</button>
                                    </div>
                                    <br>
                                    
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle"
                                data-bs-toggle="modal">Regresar al inicio de sesión</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal registro vendedor -->
            <div class="modal fade" id="exampleModalToggle3" aria-hidden="true"
                aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a data-bs-dismiss="modal" aria-label="Close"
                                                class="clic">Pagina principal</a></li>
                                        <li class="breadcrumb-item" aria-current="page"><a
                                                data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                                                class="clic">Inicio de sesión</a></li>
                                        
                                        <li class="breadcrumb-item active" aria-current="page">Registro vendedor
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            

                            <div class="testboxV">
                                <form action="BDCatalogoVendedor.php" method="post" enctype="multipart/form-data">
                                    <br>
                                    <input type="number" name="bandera" value="1" hidden>

                                    <label id="icon" for="name"><i class="icon-envelope"></i></label>
                                    <input type="text" name="correo" id="emailV" placeholder="Email" class="inputTexto"
                                        required />
                                    <br>

                                    <label id="icon" for="name"><i class="icon-user"></i></label>
                                    <input type="text" name="nombre" id="nombreV" placeholder="Taller o nombre"
                                        class="inputTexto" required />
                                    <br>

                                    <label id="icon" for="name"><i class="icon-shield"></i></label>
                                    <input type="tel" name="telefono" id="telefonoV" placeholder="Teléfono"
                                        class="inputTexto" maxlength="10" required />
                                    <br>
                                    <label id="icon" for="name"><i class="icon-shield"></i></label>
                                    <input class="inputTexto" value="Formato de imagen JPG o PNG" readonly />
                                    <input class="form-control form-control-sm w-75 imgenVendedor" name="foto"
                                        id="fotoV" type="file">
                                    <br>

                                    <label id="icon" for="name"><i class="icon-shield"></i></label>
                                    <input type="password" name="pass" id="passwordV" placeholder="Contraseña"
                                        class="inputTexto" required />
                                    <br>

                                    
                                    <br><br>

                                    <div class="gender btnFormLogin">
                                        <button type="submit" class="btn" id="btnbuscadorA"
                                            onclick="validarVendedor(event)">Registrarme</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2"
                                data-bs-toggle="modal">Regresar al anterior</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
    </main>

    <?php include('fragmentos/footer.php'); ?>
    <script src="js/cerrarMenu.js"></script>
    <script src="js/validaciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>