

  <body>
      <!--Creamos una variable para poner la redirección, variable url, le indicamos que se va a redireccionar a http://, y la variable $_SERVER  que me va a dar info del host donde estoy (localhost) dato HTTP_HOST  este nos devuelve la url y lo concatenamos con nuestras carpetas //php/ sitioWeb3-->
      <?php  $url="http://".$_SERVER['HTTP_HOST']."/diario_news" ?> 

  <nav class="navbar navbar-expand navbar-light bg-light fixed-top">
      <div class="nav navbar-nav">
          <a class="nav-item nav-link active" href="#">Administrador del sitio Web <span class="sr-only">(current)</span></a>
            <?php 
            if (isset($_SESSION['nombre'])) 
            {
                $user = ucwords($_SESSION['nombre']); 
            ?>
            <li class="nav-item"><a class="nav-link" href="#"><?= 'Hola'. ' ' .$user; ?></a></li>
            <?php } ?>
          <a class="nav-item nav-link" href="<?php echo $url; ?>../administrador/inicio.php ">Inicio</a>
          <a class="nav-item nav-link"  href="<?php echo $url; ?>/administrador/noticias_admin.php">Ver noticias</a>
          <a class="nav-item nav-link"  href="<?php echo $url; ?>../administrador/gestion_noticias.php ">Administrar noticias</a>
          <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/seccion/cerrar.php">Cerrar sesión</a>
            
         
      </div>
  </nav>
<br><br>
  <div class="container">
      <br>
      <div class="row">
          