<?php 
     session_start();
    
    
   if(isset($_SESSION['valido']) || isset($_SESSION['p_valido']) ){

    echo "Bienvenido";
   }else{
    header("Location: ../home.php");
    
   }

    include("conexion.php");
   $sql="SELECT nombre, descrp, fecha_mod,situacion,CNTR from trabajador t, roles ro, tipo ti,  contenedores c where  t.rut=c.rut and ro.id_t=ti.id_t and ro.rut=t.rut
    /*and  situacion is null*/;";
    $query=mysqli_query($conexion,$sql);
   
    

  ?>


<!DOCTYPE html>

    
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendimiento</title>



  <div class="col">
     

        <nav class="navbar navbar-dark bg-dark">

          <a class="navbar-brand" href="salir.php">Salir</a>
          <a class="navbar-brand" href="administracion/embarcados.php">Embarcados</a>
          <a class="navbar-brand" href="administracion/desembarcados.php">Desembarcados</a>
          <a class="navbar-brand" href="administracion/actual.php">Actuales</a>
          <a class="navbar-brand" href="rendimiento.php">Rendimiento</a>
          
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
              
              <th scope="col">Nombre Trabajador</th>
              <th scope="col">Rol</th>
              <th scope="col">Fecha/Hora ultima accion</th>
              <th scope="col">Estado</th>
              <th scope="col">Contenedor</th>
              
              <?php  //<th scope="col">Seleccionar</th>?> 
             
            </tr>
          </thead>
          <tbody>
          <div class="card example-1 scrollbar-ripe-malinka">
                  <?php 
                  while($row=mysqli_fetch_array($query)){
                  ?>
                      
                      <tr>
                      <th><?php  echo $row['nombre'] ?></th>
                      <th><?php  echo $row['descrp'] ?></th>
                      <th><?php  echo $row['fecha_mod'] ?></th>
                      <th><?php  echo $row['situacion'] ?></th>
                      <th><?php  echo $row['CNTR'] ?></th>
                      </tr>
                      <?php 
                      }
                     ?> 
              
            </div>

          </tbody>
        </table>
      </div>



            <div class="col">

                  <?php

                $sql2="SELECT nombre,count(situacion) as numeros from trabajador t, contenedores c  where situacion = 'embarcado' and t.rut=c.rut group by t.nombre;";
                $query2=mysqli_query($conexion,$sql2);
                //$query2=mysqli_multi_query($conexion,$rend);
                ?>

                    <table class="table table-dark" id="tabla2">
              <thead>
                <tr>
                  
                  <th scope="col">Nombre Trabajador</th>
                  <th scope="col">Cantidad de Contenedores Embarcados</th>

                  <?php  //<th scope="col">Seleccionar</th>?> 
                
                </tr>
              </thead>
              <tbody>


              <div class="card example-1 scrollbar-ripe-malinka">
                      <?php 
                      while($row1=mysqli_fetch_array($query2)){
                      ?>
                          
                          <tr>
                          <th><?php  echo $row1['nombre'] ?></th>
                          <th><?php  echo $row1['numeros'] ?></th>
                          </tr>
                          <?php 
                          }

                        ?> 
                  
                </div>

              </tbody>
            </table>




            </div>

             



          <div class="col">

 <?php
        $sql3="SELECT nombre,count(situacion) as numeros from trabajador t, contenedores c  where situacion = 'desembarcado' and t.rut=c.rut group by t.nombre;";
        $query3=mysqli_query($conexion,$sql3);
        ?>

        <table class="table table-dark" id="tabla3">
        <thead>
        <tr>

        <th scope="col">Nombre Trabajador</th>
        <th scope="col">Cantidad de Contenedores Desembarcados</th>

        <?php  //<th scope="col">Seleccionar</th>?> 

        </tr>
        </thead>
        <tbody>


        <div class="card example-1 scrollbar-ripe-malinka">
            <?php 
            while($row2=mysqli_fetch_array($query3)){
            ?>
                
                <tr>
                <th><?php  echo $row2['nombre'] ?></th>
                <th><?php  echo $row2['numeros'] ?></th>
                </tr>
                <?php 
                }
                //$query=mysqli_multi_query($conexion,$sql);
              //  mysqli_query($sql2);
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
    $(document).ready( function () {
        $('#tabla').DataTable({
          "oLanguage": {
            "sInfo": "Got a total of _TOTAL_ entries to show (_START_ to _END_)"
            }
        scrollY: '700px',
        scrollCollapse: true,
        paging: false,

        });
    } ); 
</script>


<script type="text/javascript">
$(document).ready(function () {
    $('#tabla').DataTable({
        language: {
            lengthMenu: 'Mostrando _MENU_ Registros por pagina',
            zeroRecords: 'Actualmente no existe ningun contenedor',
          //  info: 'Mostrando pagina _PAGE_ de _PAGES_',
            infoEmpty: 'Actualmente no existe ningun contenedor',
            //infoFiltered: '(filtered from _MAX_ total records)',
            sSearch: 'Buscar Contenedor:',
            sPrevious: 'Anterior',
            sNext: 'Siguiente',
        },

            scrollY: '800px',
            scrollCollapse: true,
            paging: false,
    });
});
</script>
