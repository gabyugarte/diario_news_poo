<?php 

session_start();
include 'template/cabecera.php'; 
require_once ('config/Conexion.php'); 
require_once ('modelos/Noticias.php'); 

//conexion a la base de datos
$datos = new Basedatos();
$baseDatos = $datos->conexion();

$id = isset($_GET['id']) ? $_GET['id'] : '';

$noticias = new Noticias($baseDatos);
$resultado = $noticias->leerUnaNoticia($id);
?>

<!doctype html>
<html lang="en">
  <head>
    <title><?= $resultado->titulo ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

<div class="row">

</div>

<div class="container-fluid">

    <div class="row">

        <div class="row">
            <div class="col-sm-12">

            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1><?= $resultado->titulo ?></h1>
                </div>
                <div class="card-body">
                    <div class="text-center">
                    <img class="card-img-top" src="../img/<?= $resultado->imagen ?>" alt="imagen de una noticia">
                    </div>

                    <p class="card-description"><?= $resultado->texto ?></p>
                    <p class="card-description"> Fecha de publicación: <?= $resultado->fecha_creacion ?></p>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('template/pie.php'); ?>