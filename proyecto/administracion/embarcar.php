

  <?php 
    include("../conexion.php");


    $Num=$_GET['id'];// Obtenido de presionar en el boton embarcar IMPORTANTE, SE ESTA CAPTIRANDO EL ATRIBUTO ID, NO UN VALOR EN PARTICULAR,  ATRIBUTO ES COMO TRYPE= NAME= METHOD= ETC. EN ESTE CASO ID, PORQUE ES EL QUE CONTIENE EL ECHO DEL ROW ACTUAL 
     
    
    $sql="UPDATE contenedores SET situacion = 'embarcado' WHERE Num = '$Num'";
    $query= mysqli_query($conexion,$sql);
    
    if($query){
      header("Location: sec_embarcar.php");
    }
    
  
  ?>

