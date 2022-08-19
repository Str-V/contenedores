

  <?php 
    session_start();
    if(isset($_SESSION['valido'])){

      echo "Bienvenido";
      $rut=$_SESSION['valido'];
     }else{
      header("Location: ../home.php");
      
     }


    include("../conexion.php");


    $Num=$_GET['id'];// Obtenido de presionar en el boton embarcar IMPORTANTE, SE ESTA CAPTIRANDO EL ATRIBUTO ID, NO UN VALOR EN PARTICULAR,  ATRIBUTO ES COMO TRYPE= NAME= METHOD= ETC. EN ESTE CASO ID, PORQUE ES EL QUE CONTIENE EL ECHO DEL ROW ACTUAL 
     
    
    $sql="UPDATE contenedores SET situacion = 'desembarcado'/**/, rut='$rut',fecha_mod = NOW() WHERE Num = '$Num'";
    $query= mysqli_query($conexion,$sql);
    
    if($query){
      //  $sql2= " DELETE from contenedores WHERE Num = '$Num'"
       // $query2 = mysqli_query($conexion,$sql2);

       // if($query2){
             header("Location: sec_desembarcar.php");
       // }
     
    }
    
  
  ?>
