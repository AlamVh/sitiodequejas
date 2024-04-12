<?php


include ("conexion.php");

$nombreC = trim($_REQUEST['nombreC']);

$consulta="SELECT * FROM categorias WHERE nombreC='$nombreC'";

   $registrar=mysqli_query($conectado,$consulta);
       if($reg=mysqli_fetch_array($registrar)){
          echo'<script type="text/javascript">
             alert("ya existe");
              window.location.href="aCategorias.php";
            </script>';
}else{

     $insertar="INSERT INTO categorias(nombreC)  VALUES ('$nombreC')";
         mysqli_query($conectado,$insertar); 
          echo'<script type="text/javascript">
            alert("Registro realizado");
             window.location.href="aCategorias.php";
             </script>';
}

?>