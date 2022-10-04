<?php 
//Incluimos session_start(); para poder ingresar a la página como administrador en caso lo requiera por medio del login_modal
session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="diario Cet News, programacion, HTML, CSS, PHP, MYSQL, web development"/>
    <meta name="author" content="Gabriela Ugarte Maco"/>
    <meta name="description" content="Diario Online en el cual podrás administrar tus noticias"/>  
    <title>Nosotros</title>
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<div class="jumbotron">
    <h1 class="display-3">Nosotros</h1>
    <p class="lead">Hola, somos el diario mas leido del país</p>
    <hr class="my-2">
</div>
<!-- Modal LOGIN------------------------------------------------------------------------------------------------------>
   <!-- Modal Se recomienda poner el Modal por último fuera de las secciones-->
<?php include 'login_modal.php';?>
   <!-- /Modal -->

<?php include 'template/pie.php'; ?>