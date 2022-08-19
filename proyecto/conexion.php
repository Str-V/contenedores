


<?php

    $conexion= mysqli_connect("mysqltrans.face.ubiobio.cl","G17taller","G17taller1120","G17taller_db");

    //comprobar conexion
    if(!$conexion){

        echo "error al conectar";

    }else{

       echo "Conexion exitosa"; 
    }
    

   // mysqli_close($conexion);
?>


