<?php 
require_once 'template/cabecera.php'; 
//Instancio la base de datos y conección
$datos = new Basedatos();
$baseDatos = $datos->conexion();

$noticias = new Noticias($baseDatos);
$resultado = $noticias->leer();

?>
<!--Aquí uso la funcion foreach la cual va a leer todos los registros que estan en la lista de noticias, de tal forma que esta noticia tendrá toda la info que necesitamos -->
<?php foreach($resultado as $noticia) { ?>
<!-- imprimimos todas las noticias a nuestra página web para que el usuario las pueda ver -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="diario Cet News, programacion, HTML, CSS, PHP, MYSQL, web development"/>
    <meta name="author" content="Gabriela Ugarte Maco"/>
    <meta name="description" content="Diario Online en el cual podrás administrar tus noticias"/>  
    <title>Noticias Diario_News</title>
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<div class="col-md-4">
    <div class="card">
        <img class="card-img-top" src="./img/<?= $noticia->imagen ?>" alt="imagen de la noticia del día">
        <div class="card-body">
            <h4 class="card-title"><?= $noticia->titulo ?></h4>
            <p class="card-description"><?= $noticia->texto ?></p>
            <!-- <p class="card-description"> Autor: </p> -->
            <p class="card-description"> Fecha de publicación: <?= $noticia->fecha_creacion ?></p>
            <a name="" id="" class="btn btn-primary" href="ver_mas_noticias.php?id=<?= $noticia->id ?>"  role="button" target="_blanck"  >Ver más</a>
        </div>
    </div>
</div>

<?php }?>


<!-- Modal LOGIN---------------------------------------------------------------------------------------------------->
   <!-- Modal Se recomienda poner el Modal por último fuera de las secciones-->
<?php include 'login_modal.php';?>
   <!-- /Modal LOGIN------------------------------------------------------------------------------------------------>

<?php include('template/pie.php'); ?>