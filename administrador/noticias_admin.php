<?php 

session_start();
include 'template/cabecera.php'; 
require_once ('config/Conexion.php'); 
require_once ('modelos/Noticias.php'); 

//conexion a la base de datos
$datos = new Basedatos();
$baseDatos = $datos->conexion();

$noticias = new Noticias($baseDatos);
$resultado = $noticias->leer();
?>
<!--Aquí uso la funcion foreach la cual va a leer todos los registros que estan en la lista de noticias, de tal forma que esta noticia tendrá toda la info que necesitamos -->

<!doctype html>

<html lang="en">
  <head>
    <title>Noticias Diario-News</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <?php foreach($resultado as $noticia) { ?>
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="../img/<?= $noticia->imagen ?>" alt="">
            <div class="card-body">
                <h4 class="card-title"><?= $noticia->titulo ?></h4>
                <p class="card-description"><?= $noticia->texto ?></p>
                <p class="card-description"><strong>Autor:</strong> <?= $noticia->autor ?></p>
                <p class="card-description"> Fecha de publicación: <?= $noticia->fecha_creacion ?></p>
                <a name="" id="" class="btn btn-primary" href= "ver_mas_noticias.php?id=<?= $noticia->id ?>" role="button" target="_blanck"  >Ver más</a>
            </div>
        </div>
    </div>

<?php }?>

<br>




<?php include('template/pie.php'); ?>