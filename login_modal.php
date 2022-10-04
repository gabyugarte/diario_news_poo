
<?php 
 require_once 'template/cabecera.php';
 require_once './administrador/config/Conexion.php';
 require_once './administrador/modelos/Usuario.php';
 // instancio la base de dades i la conexio
$baseDades = new Basedatos();
$db = $baseDades->conexion();


// instanciem l'objecte usuari
$usuario = new Usuario($db);
$error = "";
if (isset($_POST['submit'])) {
    //Obtenim els valors que arriven del formulari
    $nombre = $_POST['usuario'];
    $password = $_POST['contrasenia'];
// Validamos nombre y password.
if (empty($nombre) || $nombre == '' || empty($password) || $password == '') {
        $error = "Error al acceder, datos incorrectos o espacios vacíos en el formulario";
    } else {
    // Usamos el método acceder para comprobar que el usuario es el que corresponde
        if ($usuario->acceder($nombre, $password)) {
            $_SESSION['registrado'] = true;
            $_SESSION['nombre'] = $nombre;
            header('Location:administrador/inicio.php');
            
            // Aquí crearé una cookie que expirará en 1 día
            setcookie("Usuario_Admin", $_SESSION['nombre'], time() + (86400 * 30), "/");
        } else {
            $error = "Error al acceder, datos incorrectos o espacios vacíos en el formulario";
            include('logs.php');
            $log=new Log("log.txt");
            $log->writeline("E", "Error de loggin");
            $log->close();
            header('Location:index.php');
        }
    }
}
?>
<?php

if($error != ''){ ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
<?php echo $error;?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

 <!-- Modal login-------------------------------------------------------------------------------------------->
 <div class="modal fade" id="modalCompra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Agregamos el formulario al Modal. form-group -->
              <form method="POST" action="">
                <div class="mb-3 row">
                    <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="usuario" name="usuario" >
                      <small id="emailHelp" class="form-text text-muted">Nunca compartas tu nombre de usuario y contraseña</small>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword" name = "contrasenia">
                    </div>
                  </div>
                <div class="modal-footer">
                    <a href="index.php"class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</a>
                    <button type="submit" name = "submit" class="btn btn-news">Entrar</button>
                </div>
              </form>
            </div>
           
        </div>
        </div>
    </div>