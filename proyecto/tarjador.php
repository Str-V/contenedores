

<?php 
    session_start();
    include ("conexion.php");

    $sql="SELECT nombre,apellido,id_rol,fecha,vigente from tipo t, roles r, trabajador tr where t.id_t=r.id_rol and tr.rut=r.rut";
    $query=mysqli_query($conexion,$sql);
?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajadores</title>

    <div class="col">
      <form method="POST" action="salir.php">
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
                      <button type="submit"class="btn btn-primary">Embarcar </button>                 
                  </form>
                  <form method="POST" action="/proyecto/administracion/desembarcado.php">
                      <button type="submit"class="btn btn-primary">Desembarcar </button>
                  </form>
                  <form method="POST" action="/proyecto/administracion/desembarcado.php">
                      <button type="submit"class="btn btn-primary">Rendimiento </button>
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
              
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Rol</th>
              <th scope="col">Fecha de ingreso</th>
              <th scope="col">Vigencia</th>
            <?php  //<th scope="col">Seleccionar</th>?> 
             
            </tr>
          </thead>
          <tbody>

            <?php 
      
            while($row=mysqli_fetch_array($query)){
            
            ?>
            <form method=post >
              <div class="form-group">

                <tr>
                <th><?php  echo $row['nombre'] ?></th>
                <th><?php  echo $row['apellido'] ?></th>
                <th><?php  echo $row['id_rol'] ?></th>
                <th><?php  echo $row['fecha'] ?></th>
                <th><?php  echo $row['vigente'] ?></th>
                <th><div class="form-check"><input class="form-check-input" name="marcado"type="checkbox" value="" id="<?php echo $row['id_rol']?> "></div></th> </tr>


              <?php 
                }
                ?>

              </div>
              </form>

          </tbody>
        </table>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
  </html>