
  <?php 
     session_start();
    include("conexion.php");

    
   if(isset($_SESSION['p_valido'])){

    echo "Bienvenido";
   }else{
    header("Location: home.php");
    
   }
    $sql="SELECT * from contenedores";
    $query=mysqli_query($conexion,$sql);
  ?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Contenedor</title>
    <div class="col">
    <form method="POST" action="../../salir.php">
        <button type="submit"class="btn btn-primary">Salir </button>
      </form>

        <nav class="navbar navbar-dark bg-dark">

          <a class="navbar-brand" href="../../salir.php">Salir</a>
           <a class="navbar-brand" href="administracion/embarcados.php">Embarcados</a> 
           <a class="navbar-brand" href="administracion/desembarcados.php">Desembarcados</a> 
          <a class="navbar-brand" href="administracion/actual.php">Actuales</a>
          <a class="navbar-brand" href="rendimiento.php">Rendimiento</a>
          <a class="navbar-brand"  href="agregar_cont.php" >Subir documento</a>

        </nav>
  </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="http://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



  </head>
  <body>

    <?php function timer(){
        $data = ['tittle' => 'Timer o cuenta regresiva'];
        View::render('timer', $data);
      }
    ?>



  <div class="container">
    <div class="row">
      <div class="col">
      <table class="table table-dark" id="tabla">
        <thead class="thead-dark">
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

  <div class="container">
    <div class="position-absolute bottom-0 start-50 translate-middle-x">
        
        <form action="files.php"method="POST" enctype="multipart/from-data" id="filesForm">

        <input class="form-control" type="file" name="fileContacts" >
        <button type="button" onclick="subirContenedores()" class="btn btn-primary form-control" >Cargar</button>
        </form>
        
        <form action="eliminar.php"method="POST" enctype="multipart/from-data" id="filesForm">
        <button type="submit"  class="btn btn-primary form-control" >Eliminar buque actual</button>
        </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="http:////cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  </body>
  </html>


  <script type="text/javascript">

    function subirContenedores()
    {

        var Form = new FormData($('#filesForm')[0]);
        $.ajax({

            url: "subir.php",
            type: "post",
            data : Form,
            processData: false,
            contentType: false,
            success: function(data)
            {
                alert('Se han cargado nuevos contenedores');
                window.location.reload();
            }
        });
    }

</script>



<script type="text/javascript">
$(document).ready(function () {
    $('#tabla').DataTable({
        language: {
            lengthMenu: 'Mostrando _MENU_ Contenedores por pagina',
            zeroRecords: 'Actualmente no existe ningun contenedor',
            info: 'Mostrando pagina _PAGE_ de _PAGES_',
            infoEmpty: 'Actualmente no existe ningun contenedor',
            //infoFiltered: '(filtered from _MAX_ total records)',
            sSearch: 'Buscar Contenedor:',
            sPrevious: 'Anterior',
            sNext: 'Siguiente'
        },
        scrollY: '500px',
        scrollCollapse: true,
        paging: true,
    });
});
</script>


