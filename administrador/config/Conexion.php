
<?php
//Hacemos la conexion a la base de datos
//Estoy usando propiedades privadas, para que no se puedan acceder a estas propiedades desde otras clases

class Basedatos
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'news_diario_proyectoCet';
    private $connect; //Esta propiedad la usaremos para las conexiones sql

    public function conexion()
    {
    $this->connect = null;

    try {
        $this->connect = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->password);
        $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Nos ayuda a poder detectar errores
        // echo "Conexión exitosa";
    } catch(Exception $e) {
        $this->connect = "Error de conexión";
        echo "ERROR: ".$e->getMessage();
    }



    return $this->connect;
}
  
}
?>


