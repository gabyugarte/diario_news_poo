
 <?php 
 session_start();
//  require_once '../template/cabecera.php';
 require_once './administrador/config/Conexion.php';
 require_once './administrador/modelos/Usuario.php';
 // instancio la base de dades i la conexio
$baseDades = new Basedatos();
$db = $baseDades->conexion();

// instanciem l'objecte usuari
$usuari = new Usuario($db);

if (isset($_POST['submit'])) {
    //Obtenim els valors que arriven del formulari
    $mensaje = '';
    $nombre = $_POST['usuario'];
    $password = $_POST['contrasenia'];
// validacions
    if (empty($nombre) || $nombre == '' || empty($password) || $password == '') {
        $mensaje = "Alguns camps estan buits";
    } else {
        if ($usuari->acceder($nombre, $password)) {
            $_SESSION['autenticat'] = true;
            $_SESSION['nombre'] = $nombre;
            header('Location:administrador/inicio.php');
            
            // Aquí crearé una cookie que expirará en 1 día
            setcookie("Usuario_Admin", $_SESSION['nombre'], time() + (86400 * 30), "/");
        } else {
            $mensaje = "No se puede acceder, datos incorrectos";
            header('Location:index.php');
            include('logs.php');
            $log=new Log("log.txt");
            $log->writeline("E", "Error de loggin");
            $log->close();

        }
    }
    
}


 ?>