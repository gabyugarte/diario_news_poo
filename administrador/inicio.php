<?php 
 session_start();

 require_once('template/cabecera.php'); 
 $user = ucwords($_SESSION['nombre']);


?>
<html lang="en">
  <head>
    <title>INICIO-Diario News</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<?php if (isset($_SESSION['nombre'])): ?>
          <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-3">Bienvenido (a) <?= $_SESSION['nombre'] ?></h1>
                <p class="lead">Vamos a administrar nuestras noticias en el sitio Web</p>
                <hr class="my-2">
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="gestion_noticias.php" role="button">Administrar noticias</a>
                </p>
            </div>  
          </div>
<!-- //Incluimos el logs.php.  -->
<?php 
      include('../logs.php');
      $user=  $_SESSION['nombre']; 
      $log=new Log("log.txt");
      $log->writeline("I", "Todo correcto, usuario ". "[" .$user. "] ingreso a la página ");
      $log->close();
 ?>
  <?php else: ?>
  <h1>Usted no es Administrador</h1>
  <a href="#">Aquí</a>
  <?php endif; ?>

  
<?php include('template/pie.php'); ?>