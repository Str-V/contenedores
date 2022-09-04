
  <?php 
     session_start();
    
    
   if(isset($_SESSION['valido']) || isset($_SESSION['p_valido'])){

    echo "Bienvenido";
   }else{
    header("Location: ../home.php");
    
   }

    include("../conexion.php");
    $sql="SELECT * from contenedores where situacion is null";
    $query=mysqli_query($conexion,$sql);

   $rut=$_SESSION['valido'];
  ?>


<!DOCTYPE html>

    
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actuales</title>



      <div class="container-fluid"> 
        <div class="row">
                <div class="col-sm-12 d-flex justify-content-center">
                    <h1 class="text-center">Contenedores Actuales Que no Han Cambiado de Estado </h1>
            </div>
        </div>

    </div>

        <nav class="navbar navbar-dark bg-dark">

          <a class="navbar-brand" href="../salir.php">Salir</a>
          <a class="navbar-brand" href="embarcados.php">Embarcados</a>
          <a class="navbar-brand" href="desembarcados.php">Desembarcados</a>
          <a class="navbar-brand" href="actual.php">Actuales</a>
          <a class="navbar-brand" href="../rendimiento.php">Rendimiento</a>
          <a class="navbar-brand"  href="agregar_cont.php" disabled="disabled" >Subir documento</a>
          <a class="navbar-brand"  href="sec_embarcar.php">Embarcar</a>
          <a class="navbar-brand"  href="sec_desembarcar.php">Desembarcar</a>




        </nav>




  </div>
    



 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 

  </head>
  <body>
    

  <div class="container">
    <div class="row">
      <div class="col-12">
        <table class="table table-dark" id="tabla">
          <thead>
            <tr>
              
              <th scope="col">No</th>
              <th scope="col">VGM</th>
              <th scope="col">CNTR</th>
              <th scope="col">OPR</th>
              <th scope="col">POR</th>
              <th scope="col">POL</th>
              <th scope="col">POD</th>
              <th scope="col">FPOD</th>
              <th scope="col">SzTp</th>
              <th scope="col">Wgt</th>
              <th scope="col">FE</th>
              <th scope="col">Temp</th>
              <?php  //<th scope="col">Seleccionar</th>?> 
             
            </tr>
          </thead>
          <tbody>
          <div class="card example-1 scrollbar-ripe-malinka">
                  <?php 
                  
                  while($row=mysqli_fetch_array($query)){
                    
                  ?>
                      
                      <tr>
                      <th><?php  echo $row['Num'] ?></th>
                      <th><?php  echo $row['VGM'] ?></th>
                      <th><?php  echo $row['CNTR'] ?></th>
                      <th><?php  echo $row['OPR'] ?></th>
                      <th><?php  echo $row['POR'] ?></th>
                      <th><?php  echo $row['POL'] ?></th>
                      <th><?php  echo $row['POD'] ?></th>
                      <th><?php  echo $row['FPOD'] ?></th>
                      <th><?php  echo $row['SzTp'] ?></th>
                      <th><?php  echo $row['Wgt'] ?></th>
                      <th><?php  echo $row['FE'] ?></th>
                      <th><?php  echo $row['Temp'] ?></th>
                      </tr>
                      <?php 
                      }
                     ?> 
              
            </div>

          </tbody>
        </table>
      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="http:////cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  
  <!-- Para desplegar navbar -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


  </body>
  

</html>



<script type="text/javascript">
    /*$(document).ready( function () {
        $('#tabla').DataTable({

        scrollY: '800px',
        scrollCollapse: true,
        paging: false,

        });
    } ); */
</script>

<script type="text/javascript">
$(document).ready(function () {
    $('#tabla').DataTable({
        language: {
            lengthMenu: 'Mostrando _MENU_ Registros por pagina',
            zeroRecords: 'Actualmente no existe ningun contenedor',
            info: 'Mostrando pagina _PAGE_ de _PAGES_',
            infoEmpty: 'Actualmente no existe ningun contenedor',
            //infoFiltered: '(filtered from _MAX_ total records)',
            sSearch: 'Buscar Contenedor:',
            sPrevious: 'Anterior',
            sNext: 'Siguiente',
           
        },

            scrollY: '500px',
            scrollCollapse: true,
            paging: false,
            info:false,
    });
});
</script>