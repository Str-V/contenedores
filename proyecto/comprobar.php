<?php
    
    session_start();
    
    include("conexion.php");

    $rut=$_POST['rut'];
    $nombre=$_POST['nombre'];


    $sql="SELECT * from trabajador where rut = '$rut' and nombre = '$nombre'";
    $query= mysqli_query($conexion,$sql);

    $existe=mysqli_num_rows($query); //cantidad de veces en las que se encuentra
    $planner=0;
    $admin=0;
    $tarjador=0;
    while($igual=mysqli_fetch_array($query)){

        if($igual['nombre'] == 'planner' && $igual ['rut']=='99'){
           $planner=1;
           $_SESSION["p_valido"] = $rut;
        }
        if($igual['nombre'] == 'admin' && $igual ['rut']=='admin'){
            $admin=1;
            $_SESSION["a_valido"] = $rut;
        }if($igual['nombre'] == 'tarjador' && $igual ['rut']=='2'){
            $tarjador=1;
            $_SESSION["t_valido"] = $rut;
        }

    }   

    if($planner==1){
        
        header("Location: agregar_cont.php");


    }elseif($admin==1){

        header("Location: admin.php");

    }elseif($existe){

       $_SESSION["valido"] = $rut;
        header("Location: administracion/actual.php");
        
    }elseif($tarjador==1){

        header("Location: tarjador.php");

    }elseif(!$existe){

        header("Location: home.php");
    }
    mysqli_close($conexion);
       
    

  



?>


