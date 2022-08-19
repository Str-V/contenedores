

  <?php 
  session_start();
    if(isset($_SESSION['valido'])){

      echo "Bienvenido";
      $rut=$_SESSION['valido'];
     }else{
      header("Location: ../home.php");
      
     }
     #----------------------

    include("../conexion.php");
    //nclude("../comprobar.php");

    $Num=$_GET['id'];// Obtenido de presionar en el boton embarcar IMPORTANTE, SE ESTA CAPTIRANDO EL ATRIBUTO ID, NO UN VALOR EN PARTICULAR,  ATRIBUTO ES COMO TRYPE= NAME= METHOD= ETC. EN ESTE CASO ID, PORQUE ES EL QUE CONTIENE EL ECHO DEL ROW ACTUAL 
    //$conta_embarcar=$_GET['cant_cont_em'];
    //$rut=$_SESSION['valido'];
    
    $sql="UPDATE contenedores SET situacion = 'embarcado'/**/, rut='$rut',fecha_mod = NOW() WHERE Num = '$Num'";
    $query= mysqli_query($conexion,$sql);
    

    if($query){
      header("Location: sec_embarcar.php");
      
    }
    
  
  ?>

