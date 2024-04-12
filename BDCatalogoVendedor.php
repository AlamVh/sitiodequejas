<?php
require('conexion.php');

$bandera = $_POST["bandera"];

//Insertar
if ($bandera == 1) {

    $correo = $_POST["correo"]; 
    $nombre = $_POST["nombre"]; 
    $telefono = $_POST["telefono"]; 
    $foto = $_FILES['foto']['name']; 
    $pass = $_POST["pass"]; 
    $id_pago = $_POST["id_pago"]; 

    if (isset($foto) && $foto != "") {
        $tipoI = $_FILES['foto']['type'];
        $temp = $_FILES['foto']['tmp_name'];

        if ( !(strpos($tipoI,'jpg') || strpos($tipoI,'png') || strpos($tipoI,'jpeg'))) {
            echo "<script text='text/javascript'>
                alert('Lo sentimos, tu formato de archivo es diferente al solicitado (PNG O JPG)');
                window.location='index.php';
                </script>";
        } else {
            $insertar = "INSERT INTO `vendedores`(`id_vendedor`, `nombre`, `telefono`, `correo`, `contraseña`, `imagen`, `id_pago`) 
            VALUES ('','$nombre','$telefono','$correo','$pass','$foto','$id_pago')";
            $rta = mysqli_query($conectado, $insertar);

            if(!$rta){
                echo "<script text='text/javascript'>
                alert('No pudimos realizar tu registro como vendedor');
                window.location='index.php';
                </script>";
            }else{
                move_uploaded_file($temp,'imgVendedores/'.$foto);
                echo "<script text='text/javascript'>
                    alert('¡FELICIDADES!, Ya puedes piblicar tus refacciones o autopartes');
                    window.location='CtrlRefacciones.php';
                    </script>";
                
            } 
            mysqli_free_result($rta);
        }
    }
//actualizar
} else if( $bandera == 2){

    $correo = $_POST["correo"]; 
    $nombre = $_POST["nombre"]; 
    $telefono = $_POST["telefono"]; 
    $foto = $_FILES['foto']['name']; 
    $pass = $_POST["pass"]; 
    $id_vendedor = $_POST["id_vendedor"]; 

    //Validar si hay una nueva foto
    if (isset($foto) && $foto != "") {
        $tipoI = $_FILES['foto']['type'];
        $temp = $_FILES['foto']['tmp_name'];
    
        if ( !(strpos($tipoI,'jpg') || strpos($tipoI,'png') || strpos($tipoI,'jpeg'))) {
            echo "<script text='text/javascript'>
                alert('Lo sentimos, tu formato de archivo es diferente al solicitado (PNG O JPG)');
                window.location='EmpleadoActualizar.php';
                </script>";
        } else {
            //actualizar con foto
            $actualizar = "UPDATE `vendedores` SET `nombre`='$nombre',`telefono`='$telefono',`correo`='$correo',`contraseña`='$pass',`imagen`='$foto' WHERE `id_vendedor` = '$id_vendedor'";
            $rta = mysqli_query($conectado, $actualizar);

            if(!$rta){
                echo "<script text='text/javascript'>
                alert('No pudimos realizar tu registro como vendedor');
                window.location='EmpleadoActualizar.php';
                </script>";
            }else{
                move_uploaded_file($temp,'imgVendedores/'.$foto);
                echo "<script text='text/javascript'>
                    alert('¡FELICIDADES!, Ya fue actualizada tu informacion');
                    window.location='EmpleadoActualizar.php';
                    </script>";
            } 
            mysqli_free_result($rta);
        } 
    } else {
        //actualizar sin imagen cambiada
        $actualizar = "UPDATE `vendedores` SET `nombre`='$nombre',`telefono`='$telefono',`correo`='$correo',`contraseña`='$pass' WHERE `id_vendedor` = '$id_vendedor'";
        $rta = mysqli_query($conectado, $actualizar);

        if(!$rta){
            echo "<script text='text/javascript'>
            alert('No pudimos realizar tu registro como vendedor');
            window.location='EmpleadoActualizar.php';
            </script>";
        }else{
            echo "<script text='text/javascript'>
                alert('¡FELICIDADES!, Ya fue actualizada tu informacion');
                window.location='vendedorActualizar.php';
                </script>";
            
        } 
        mysqli_free_result($rta);
    }
//insertar refaccion
} elseif ($bandera == 3) {
    $id_vendedor = $_POST["id_vendedor"]; 
    $categoria = $_POST["categoria"]; 
    $marca = $_POST["marca"]; 
    $modelo = $_POST["modelo"]; 
    $estatus = $_POST["estatus"]; 
    $cantidad = $_POST["cantidad"]; 
    $precio = $_POST["precio"]; 
    $descripcion = $_POST["descripcion"]; 
    $foto = $_FILES['image']['name']; 
    
    if (isset($foto) && $foto != "") {
        $tipoI = $_FILES['image']['type'];
        $temp = $_FILES['image']['tmp_name'];

        if ( !(strpos($tipoI,'jpg') || strpos($tipoI,'png') || strpos($tipoI,'jpeg'))) {
            echo "<script text='text/javascript'>
                alert('Lo sentimos, tu formato de archivo es diferente al solicitado (PNG O JPG)');
                window.location='formRefaccion.php';
                </script>";
        } else {
            $insertar = "INSERT INTO `refacciones` (`id_refaccion`, `id_marca`, `modelo`, `precio`, `descripcion`, `imagen`, `estatus`, `cantidad`, `id_categoria`, `id_vendedor`) 
            VALUES (NULL, '$marca', '$modelo', '$precio', '$descripcion', '$foto', '$estatus', '$cantidad', '$categoria', '$id_vendedor')";
            $rta = mysqli_query($conectado, $insertar);

            if(!$rta){
                echo "<script text='text/javascript'>
                alert('No pudimos realizar el registro de tu refaccion');
                window.location='formRefaccion.php';
                </script>";
            }else{
                move_uploaded_file($temp,'imgVendedores/'.$foto);
                echo "<script text='text/javascript'>
                    alert('¡FELICIDADES!, Ya puedes fue publicada refacciones o autopartes');
                    window.location='formRefaccion.php';
                    </script>";
                
            } 
            mysqli_free_result($rta);
        }
    }
//actualizar refaccion
} elseif ($bandera == 4) {

    $id_refaccion = $_POST["id_refaccion"]; 
    $categoria = $_POST["categoria"]; 
    $marca = $_POST["marca"]; 
    $modelo = $_POST["modelo"]; 
    $estatus = $_POST["estatus"]; 
    $cantidad = $_POST["cantidad"]; 
    $precio = $_POST["precio"]; 
    $descripcion = $_POST["descripcion"]; 
    $foto = $_FILES['foto']['name']; 
    
    //Validar si hay una nueva foto
    if (isset($foto) && $foto != "") {
        $tipoI = $_FILES['foto']['type'];
        $temp = $_FILES['foto']['tmp_name'];
    
        if ( !(strpos($tipoI,'jpg') || strpos($tipoI,'png') || strpos($tipoI,'jpeg'))) {
            echo "<script text='text/javascript'>
                alert('Lo sentimos, tu formato de archivo es diferente al solicitado (PNG O JPG)');
                window.location='vendedorActualizarRefaccion.php?id_refaccion=$id_refaccion';
                </script>";
        } else {
            //actualizar con foto
            $actualizar = "UPDATE `refacciones` SET `id_marca`='$marca',`modelo`='$modelo',`precio`='$precio',`descripcion`='$descripcion',
            `imagen`='$foto',`estatus`='$estatus',`cantidad`='$cantidad',`id_categoria`='$categoria' WHERE `id_refaccion` = '$id_refaccion'";
            $rta = mysqli_query($conectado, $actualizar);

            if(!$rta){
                echo "<script text='text/javascript'>
                alert('No pudimos realizar tu refaccion');
                window.location='vendedorActualizarRefaccion.php?id_refaccion=$id_refaccion';
                </script>";
            }else{
                move_uploaded_file($temp,'imgVendedores/'.$foto);
                echo "<script text='text/javascript'>
                    alert('¡FELICIDADES!, Ya se actualizo tu refaccion o autoparte');
                    window.location='CtrlRefacciones.php';
                    </script>";
            } 
            mysqli_free_result($rta);
        } 
    } else {
        //actualizar sin imagen cambiada
        $actualizar = "UPDATE `refacciones` SET `id_marca`='$marca',`modelo`='$modelo',`precio`='$precio',`descripcion`='$descripcion',
        `estatus`='$estatus',`cantidad`='$cantidad',`id_categoria`='$categoria' WHERE `id_refaccion` = '$id_refaccion'";
        $rta = mysqli_query($conectado, $actualizar);

        if(!$rta){
            echo "<script text='text/javascript'>
            alert('No pudimos realizar tu refaccion');
            window.location='vendedorActualizarRefaccion.php?id_refaccion=$id_refaccion';
            </script>";
        }else{
            echo "<script text='text/javascript'>
                alert('¡FELICIDADES!, Ya se actualizo tu refaccion o autoparte');
                window.location='vendedorDetalles.php?id_refaccion=$id_refaccion';
                </script>";
            
        } 
        mysqli_free_result($rta);
    }
} 



mysqli_close($conectado);
?>