<?php

    include("conexion.php");

    $id=$_POST['id'];
    $tara=$_POST['tara'];
    $carga_max=$_POST['carga_max'];
    $peso_bruto=$_POST['peso_bruto'];
    $uso_frecuente=$_POST['uso_frecuente'];
    $largo=$_POST['largo'];
    $ancho=$_POST['ancho'];
    $altura=$_POST['altura'];
    $capacidad=$_POST['capacidad'];


    $sql="INSERT into contenedor values ('$id','$tara','$carga_max','$peso_bruto','$uso_frecuente','$largo','$ancho','$altura','$capacidad')";
    $query= mysqli_query($conexion,$sql);

       
    if($query){
        header("Location: /administracion/actual.php?");
    }


   

    

?>