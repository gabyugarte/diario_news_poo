<?php session_start(); ?>
<?php require_once("template/cabecera.php"); ?>
<?php require_once("config/Conexion.php"); ?>
<?php require_once("modelos/Noticias.php"); ?>
<!--Creamos el crud-->

<?php
//Instancio la base de datos
$datos = new Basedatos();
$db = $datos->conexion();
$noticias = new Noticias($db);

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtNoticia = (isset($_POST['txtNoticia']))?$_POST['txtNoticia']:"";
$txtImagen = (isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$fecha = (isset($_POST['fecha']))?$_POST['fecha']:"";
$txtAutor = (isset($_POST['txtAutor']))?$_POST['txtAutor']:"";
$accion = (isset($_POST['accion']))?$_POST['accion']:"";



switch ($accion){
    case 'Agregar':
        // Para que no se sobreescriban las imagenes con nombres iguales vamos a hacer una variable fecha, para saber que por la fecha estas imágenes son distintas.
     $fecha= new DateTime();
     //Variable del nuevo archivo, si envían imagen, le ponemos el nuevo nombre que incluye el tiempo + no,mbre del archivo, para que no se mezcle con archivos del mismo nombre, de lo contrario le damos el nombre imagen.jpg
     $nombreArchivo=($txtImagen!='')?$fecha->getTimestamp(). "_". $_FILES['txtImagen']['name']:"imagen.jpg";
     //creamos una variable de imagen temporal qur será igual a files (archivo, imagen temporal)
     $tmpImagen = $_FILES['txtImagen']['tmp_name'];
     //validamos si el tempImage tiene algo
     if($tmpImagen!=''){
         move_uploaded_file($tmpImagen,"../img/".$nombreArchivo);
     }
        // instanciem l'objecte article

// creem el nou article i redireccionem
    if ($noticias->crear($txtNombre, $nombreArchivo, $txtNoticia, $txtAutor)) {
        $mensaje = "Noticia creada correctamente";
        header('location: gestion_noticias.php');
        }
        else{
            $mensaje = "Error al crear noticia";
 
        }
    break;

    case 'Seleccionar':
        //    echo 'Presionado botón Seleccionar';
        if (true) {
                $txtID = $_POST['txtID'];
                $noticia = new Noticias($db);
                //Llamo al metodo LEERUNANOTICIA y le paso el ID
                $resultadoMod = $noticia->leerUnaNoticia($txtID);
                $txtID = $resultadoMod->id;
                $txtNombre = $resultadoMod->titulo;
                $txtNoticia = $resultadoMod->texto;
                $txtImagen = $resultadoMod->imagen;
                $txtAutor = $resultadoMod->autor;
            }else{
                $id = '';
                $titulo = "";
                $texto = "";
                $txtImagen = "";
                $txtAutor = "";
            }
    // $noticia = new Noticias($db);
    // $resultado = $noticia->leerUnaNoticia($txtID);

    break;

    case 'Modificar':
        if ($txtImagen != '') {
            $fecha= new DateTime();
            //Variable del nuevo archivo, si envían imagen, le ponemos el nuevo nombre que incluye el tiempo + no,mbre del archivo, para que no se mezcle con archivos del mismo nombre, de lo contrario le damos el nombre imagen.jpg
            $nombreArchivo=($txtImagen!='') ? $fecha->getTimestamp(). "_". $_FILES['txtImagen']['name'] : "imagen.jpg";
            //creamos una variable de imagen temporal qur será igual a files (archivo, imagen temporal)
            $tmpImagen = $_FILES['txtImagen']['tmp_name'];
            move_uploaded_file($tmpImagen, "../img/".$nombreArchivo);
                if (isset($imagen->imagen) && ($imagen->imagen != 'imagen.jpg')) {
                    if (file_exists("../../img/".$imagen->imagen)) {
                        unlink("../../img/".$imagen->imagen);
                    }
            }
        }
        $noticias->modificar($txtID, $txtNombre, $nombreArchivo, $txtNoticia, $txtAutor);
        $mensaje = "Articulo actualizado correctamente";
        header("Location:gestion_noticias.php");
        break;
        
    case 'Cancelar':
        header("Location:gestion_noticias.php");
        break;
   
    case 'Borrar':

    // Aqui uso el valor del id que figura en el formulario 
    if(isset($_POST['txtID'])) {  
    $idNoticia = $_POST['txtID'];
    } 

        $noticias->borrar($idNoticia);
        $mensaje = "Noticia borrada correctamente.";
    break;

}

?>

<html lang="en">
  <head>
    <title>Gestiona tus Noticias</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos de la Noticia
        </div>
        <div class="card-body">
        <!-- Se coloca el atributo enctype = "multipart/form-data", para que por el método POST se recepcionen las imágenes y archivos  -->
            <form method="post" enctype="multipart/form-data">

                    <!-- <label for="txtID">ID:</label> -->
                    <input type="text" hidden class="form-control" value="<?= $txtID?>" name="txtID" id="txtID" placeholder="ID">

                <div class = "form-group">
                    <label for="txtNombre">Título:</label>
                    <input required type="text"  class="form-control" value="<?= $txtNombre?>" name="txtNombre" id="txtNombre" placeholder="Título de la noticia">
                </div>
                <div class = "form-group">
                    <label for="txtID">Noticia:</label>
                    <!-- <input type="text"  class="form-control" value="" name="txtNoticia" id="txtNoticia" placeholder="Redacta tu noticia aquí"> -->
                    <textarea required name="txtNoticia" id="txtNoticia" cols="30" rows="10" class="form-control" value = "" placeholder="Redacta tu noticia aquí"><?= $txtNoticia?></textarea>
                </div>
                <div class = "form-group">
                    <label for="txtImagen">Imágen:</label>
                    </br>
                    <?php
//Aquí pregunto si existe algo que sería la imagen, entonces la mostramos
                        if($txtImagen!=""){
                    ?>
                        <img class= "img-thumbnail rounded" src="../img/<?php echo $txtImagen; ?>" width="50" alt="Foto de la Portada de la Noticia">
                    <?php   
                        }
                    ?>
                        <input type="file" class="form-control" <?= $txtImagen?> name="txtImagen" id="txtImagen">
                </div>

                <div class = "form-group">
                    <label for="txtAutor">Autor:</label>
                    <input type="text"  class="form-control" value="<?= $txtAutor?>" name="txtAutor" id="txtAutor" placeholder="Nombre del autor">
                </div>
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" <?php echo ($accion == "Seleccionar")? "disabled":"";?> value ="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" <?php echo ($accion !== "Seleccionar")? "disabled":"";?> value ="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" <?php echo ($accion !== "Seleccionar")? "disabled":"";?> value ="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Noticia</th>
                <th>Imagen</th>
                <th>Autor</th>
                <th>Fecha de publicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
//Mostramos las ùltimas noticias-------------------------------------------------------
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $noticias = new Noticias($db);
        $resultadoLeer = $noticias->leer();

            foreach($resultadoLeer as $noticia) {?>
            <tr>
                <td><?= $noticia->id ?></td>
                <td><?= $noticia->titulo ?></td>
                <td><?= $noticia->texto ?></td>
                <td>
                    <img class="img-thumbnail rounded" src="../img/<?= $noticia->imagen; ?>" width="70" alt="Foto de la Portada de la Noticia">
                </td>
                <td><?= $noticia->autor ?></td>
                <td><?= $noticia->fecha_creacion ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="txtID" id="txtID" value="<?= $noticia->id ?>"/>
                        <input type="submit" name="accion" id="txtID" value="Seleccionar" class="btn btn-primary"/>
                        <input type="submit" name="accion" id="txtID"value="Borrar" class="btn btn-danger"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php include("template/pie.php"); ?>