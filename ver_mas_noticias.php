<?php 

session_start();
include 'template/cabecera.php'; 
require_once ('administrador/config/Conexion.php'); 
require_once ('administrador/modelos/Noticias.php'); 

//conexion a la base de datos
$datos = new Basedatos();
$baseDatos = $datos->conexion();

$id = isset($_GET['id']) ? $_GET['id'] : '';

$noticias = new Noticias($baseDatos);
$resultado = $noticias->leerUnaNoticia($id);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="diario Cet News, programacion, HTML, CSS, PHP, MYSQL, web development"/>
    <meta name="author" content="Gabriela Ugarte Maco"/>
    <meta name="description" content="Diario Online en el cual podrás administrar tus noticias"/>  
    <title><?= $resultado->titulo ?></title>
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
                    <img class="card-img-top" src="img/<?= $resultado->imagen ?>" alt="imagen de una noticia">
                    </div>

                    <p class="card-description"><?= $resultado->texto ?></p>
                    <p class="card-description"> Fecha de publicación: <?= $resultado->fecha_creacion ?></p>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include('template/pie.php'); ?>