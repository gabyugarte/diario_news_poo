<?php 
// include 'Conexion.php';
//creo una clase Noticias con sus propiedades.
class Noticias {
  
    public $id;
    public $titulo;
    public $imagen;
    public $texto;
    public $fecha_creacion;
    private $conexion;
    
  
//creo una función constructora
    public function __construct($db){
        $this->conexion = $db;
    }


//Creo un metodo para leer todas las noticias de la base de datos
  public function leer()
  {
    // creo la consulta la cual nos mostrará noticias de 10 en 10, en caso tengamos muchas en la base de datos
    $query = "SELECT id, titulo, imagen, texto, fecha_creacion FROM noticias LIMIT 10";

    // preparo la sentencia y se ejecuta la query
    $stmt = $this->conexion->prepare($query);
    $stmt->execute();

    // Aqui se preparó el resultado de la ejecución para retornar todas las noticias como objetos.
    $noticias = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $noticias;
  }
// Aquí creo un metodo que lee solo una noticia según el id de la misma.
public function leerUnaNoticia($txtID)
{
  // creo la consulta y preparo la sentencia
  $query = "SELECT id, titulo, imagen, texto, fecha_creacion FROM noticias WHERE id = :id LIMIT 0,1";
  $stmt = $this->conexion->prepare($query);
  $stmt->bindParam(":id", $txtID, PDO::PARAM_INT); //vinculo los parámetros y se ejecuta la query ->execute
  $stmt->execute();

  // Aqui se preparó el resultado de la ejecución para retornar todas las noticias como objetos.
  $noticia = $stmt->fetch(PDO::FETCH_OBJ);
  return $noticia;
}


 // Aqui creo un método para ingresar o crear nueva noticia
 public function crear($txtNombre, $txtImagen, $txtNoticia)
 {
   // creo la consulta
   $query = "INSERT INTO  noticias (titulo, imagen, texto) VALUES (:titulo, :imagen, :texto)";
   // preparo la sentencia
   $stmt = $this->conexion->prepare($query);
   // vinculo los parámetros

   $stmt->bindParam(":titulo", $txtNombre, PDO::PARAM_STR);
   $stmt->bindParam(":imagen", $txtImagen, PDO::PARAM_STR);
   $stmt->bindParam(":texto", $txtNoticia, PDO::PARAM_STR);

   //Se ejecuta la query
   if ($stmt->execute()) {
     return true;
   }
 }

  // Creo un método para modificar la noticia 
  public function modificar($txtID, $txtNombre, $nombreArchivo, $txtNoticia)
  {
    if ($nombreArchivo == "") {
      // En caso no se desee modificar la imagen
      // creo la consulta
      $query = "UPDATE noticias SET titulo = :titulo, texto = :texto WHERE id = :id";
      // preparo la sentencia
      $stmt = $this->conexion->prepare($query);

      // Vinculamos prámetros y le decimos que el id será integer y titulo y texto serán string
      $stmt->bindParam(":id", $txtID, PDO::PARAM_INT);
      $stmt->bindParam(":titulo", $txtNombre, PDO::PARAM_STR);
      $stmt->bindParam(":texto", $txtNoticia, PDO::PARAM_STR);
      if ($stmt->execute()) {
        return true;
      }
    } else {
      // esto es si desea modificar la imagen
      // creo la consulta
      $query = "UPDATE noticias SET titulo = :titulo, imagen = :imagen, texto = :texto WHERE id = :id";
      // preparo la sentencia
      $stmt = $this->conexion->prepare($query);
      // vinculo los parámetros
      $stmt->bindParam(":id", $txtID, PDO::PARAM_INT);
      $stmt->bindParam(":titulo", $txtNombre, PDO::PARAM_STR);
      $stmt->bindParam(":imagen", $nombreArchivo, PDO::PARAM_STR);
      $stmt->bindParam(":texto", $txtNoticia, PDO::PARAM_STR);

      // ejecuto
      if ($stmt->execute()) {
        return true;
      }
    }
  }
// Creo un método para borrar un artículo
public function borrar($idNoticia)
{
  // creo la consulta
  $query = "DELETE FROM noticias WHERE id = :id";

  // preparo la sentencia
  $stmt = $this->conexion->prepare($query);

  // vinculo el paàmetro id
  $stmt->bindParam(":id", $idNoticia, PDO::PARAM_INT);

  // executo la query
  if ($stmt->execute()) {
    return true;
  }
}

}

?>