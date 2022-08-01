
  <?php 
  session_start();
  include("conexion.php");

  //$sql="SELECT * from todos";
  //$query=mysqli_query($conexion,$sql);

  if(isset($_SESSION['a_valido'])){

    echo "Bienvenido";
   }else{
    header("Location: home.php");
   }

  

?>


<!DOCTYPE html>

   


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador</title>

<div class="col">
    <form method="POST" action="../../salir.php">
      <button type="submit"class="btn btn-primary">Salir </button>
    </form>
</div>
  

  <form method="POST" action="/proyecto/administracion/actual.php">
        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                <button type="submit"class="btn btn-primary">Actuales</button>
            </div>
            <div class="col">
                <form method="POST" action="/proyecto/administracion/embarcados.php">
                    <button type="submit"class="btn btn-primary">Embarcados</button>                 
                </form>
                <form method="POST" action="/proyecto/administracion/desembarcado.php">
                    <button type="submit"class="btn btn-primary">Desembarcados</button>
                </form>
            </div>
        </div>
    </form>









<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>
  

<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            
            <th scope="col">ID</th>
            <th scope="col">Tara</th>
            <th scope="col">Carga Maxima</th>
            <th scope="col">Peso Bruto</th>
            <th scope="col">Uso Frecuente</th>
            <th scope="col">Largo</th>
            <th scope="col">Ancho</th>
            <th scope="col">Altura</th>
            <th scope="col">Capacidad</th>
            <th scope="col">Fecha</th>
          <?php  //<th scope="col">Seleccionar</th>?> 
           
          </tr>
        </thead>
        <tbody>

          <?php 
    
          while($row=mysqli_fetch_array($query)){
          
          ?>

          <tr>
            <th><?php  echo $row['id'] ?></th>
            <th><?php  echo $row['tara'] ?></th>
            <th><?php  echo $row['carga_max'] ?></th>
            <th><?php  echo $row['peso_bruto'] ?></th>
            <th><?php  echo $row['uso_frecuente'] ?></th>
            <th><?php  echo $row['largo'] ?></th>
            <th><?php  echo $row['ancho'] ?></th>
            <th><?php  echo $row['altura'] ?></th>
            <th><?php  echo $row['capacidad'] ?></th>
            <th><?php  echo $row['fecha'] ?></th>
            <th><a href="s_embarcar.php?id=<?php echo $row['id']?>" class="btn btn-info">Modificiar</a></th>
          </tr>

            <?php 
              }
              ?>

        </tbody>
      </table>
    </div>
  </div>
</div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




</body>


</html>