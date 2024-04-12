<?php


include ("conexion.php");

$nombreM = trim($_REQUEST['nombreM']);

$consulta="SELECT * FROM marcas WHERE nombreM='$nombreM'";

   $registrar=mysqli_query($conectado,$consulta);
       if($reg=mysqli_fetch_array($registrar)){
          echo'<script type="text/javascript">
             alert("ya existe");
              window.location.href="aTipos.php";
            </script>';
}else{

     $insertar="INSERT INTO marcas(nombreM)  VALUES ('$nombreM')";
         mysqli_query($conectado,$insertar); 
          echo'<script type="text/javascript">
            alert("Registro realizado");
             window.location.href="aTipos.php";
             </script>';
}
?>
