<?php

    include("conexion.php");

    $sql="delete from contenedores";
    $query= mysqli_query($conexion,$sql);
       
    if($query){
        header("Location: ../agregar_cont.php");
    }

    

?>