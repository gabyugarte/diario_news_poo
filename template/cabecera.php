
<?php 
// require_once '../administrador/config/Conexion.php';
require_once './administrador/modelos/Noticias.php';
require_once './administrador/modelos/Usuario.php';
require_once './administrador/config/Conexion.php';
require_once './login.php';

?>


<body data-bs-spy="scroll" data-bs-target="#navbar">
<?php  $url="http://".$_SERVER['HTTP_HOST']."/diario_news" ?> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <ul class="nav navbar-nav">
            <li class="nav-it<em">
                <a class="nav-link" href="<?php echo $url; ?>/index.php">DIARIO-NEWS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/noticias.php">Noticias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/nosotros.php">Nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>/administrador/login_modal.php" data-bs-toggle="modal" data-bs-target="#modalCompra">Login-Administrador</a>
            </li>
           
        </ul>
    </nav>
<br><br>
    <div class="container">
        <br>
        <div class="row">