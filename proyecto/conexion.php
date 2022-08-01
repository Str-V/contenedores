


<?php

    $conexion= mysqli_connect("basedatos:3306","root","123","empresa");

    //comprobar conexion
    if(!$conexion){

        echo "error al conectar";

    }else{

       echo "Conexion exitosa"; 
    }
    

   // mysqli_close($conexion);
?>


