
<?php 
 require_once 'template/cabecera.php';
 require_once './administrador/config/Conexion.php';
 require_once './administrador/modelos/Usuario.php';
 // instancio la base de dades i la conexio
$baseDades = new Basedatos();
$db = $baseDades->conexion();

// instanciem l'objecte usuari
$usuario = new Usuario($db);

if (isset($_POST['submit'])) {
    //Obtenim els valors que arriven del formulari
    $mensaje = '';
    $nombre = $_POST['usuario'];
    $password = $_POST['contrasenia'];
// validacions
    if (empty($nombre) || $nombre == '' || empty($password) || $password == '') {
        $mensaje = "Algunos campos estan vacíos";
    } else {
        if ($usuario->acceder($nombre, $password)) {
            $_SESSION['autenticat'] = true;
            $_SESSION['nombre'] = $nombre;
            header('Location:administrador/inicio.php');
            
            // Aquí crearé una cookie que expirará en 1 día
            setcookie("Usuario_Admin", $_SESSION['nombre'], time() + (86400 * 30), "/");
        } else {
            $mensaje = "No se puede acceder, datos incorrectos";
            header('Location:login_modal.php');
            include('logs.php');
            $log=new Log("log.txt");
            $log->writeline("E", "Error de loggin");
            $log->close();

        }
    }
    
}

 ?>

 <!-- Modal login-------------------------------------------------------------------------------------------->
 <div class="modal fade" id="modalCompra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php if(!empty($mensaje)): ?>
              <div class="alert alert-danger" role="alert">
                <p> <?= $mensaje; ?></p>
              </div>
            <?php endif;  ?> 
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