<?php
//Creamos la clase usuario con sus propiedades/ Parte privada / Usuario con credenciales
class Usuario
{
 
  public $id;
  public $nombre;
  public $email;
  public $password;
  public $fecha_creacion;
  private $conexion;
  
  // método constructor
  public function __construct($db)
  {
    $this->conexion = $db;
  }

  // // creo un metodo para acceder a los usuarios que estan registrados en la base de datos.

  public function acceder($nombre, $password)
  {

    // creo la consulta
    $query = "SELECT * FROM usuarios 
              WHERE nombre = :nombre AND password = :password";

    //aquí voy a encriptar la clave
    $passwordEncriptado = md5($password);

    //y preparo la sentencia
    $stmt = $this->conexion->prepare($query);

    //  creo una variable stmt para vincular los parámetros 
    $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    $stmt->bindParam(":password", $passwordEncriptado, PDO::PARAM_STR);

    // execute() parea ejecutar
    $stmt->execute();
    $existeUsuario = $stmt->fetch(PDO::FETCH_ASSOC);

    
if ($existeUsuario) {
  return true;
} else {
  return false;
}
  }

}
