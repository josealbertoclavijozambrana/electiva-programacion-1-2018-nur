<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmacion Pelicula</title>
    </head>
    <body>
    <?php 
    include '../BLL/PeliculaBLL.php';
    include '../DAL/Connection.php';
    include '../DTO/Pelicula.php';
    //include './Principal.php';
    $PeliculaBLL = new PeliculaBLL();
    
    $titulo = filter_input(INPUT_POST,'txtTitulo');
    $subtitulo = filter_input(INPUT_POST,'txtSubtitulo');
    $descripcion = filter_input(INPUT_POST,'txtDescripcion');
    $emision = filter_input(INPUT_POST,'txtEmision');
    $duracion = filter_input(INPUT_POST,'txtDuracion');
    $rango = filter_input(INPUT_POST, 'txtClasificacion');
    
    $PeliculaBLL ->insert($titulo, $subtitulo, $descripcion, $emision, $duracion, 'posters', 'portada', 'Logo', $rango);
    
    $ultimoIdSerie = $PeliculaBLL->obtenerUltimo();
    
    echo 'Esto es lo que recibe ultimo id'.$ultimoIdSerie;
    
    $carpetaDestino = '../Imagenes/PostersPelicula/';
    $archivo = $_FILES["posterPelicula"]["name"];
    $extension = explode(".",$archivo);
    $ext = $extension[1];
    //echo '<p>Esto es la extension'.$ext.'</p>';
    $destino = $carpetaDestino.$ultimoIdSerie."poster.".$ext;
    
    $carpetaDestino1 = '../Imagenes/PortadasPelicula/';
    $archivo1 = $_FILES["portadaPelicula"]["name"];
    $extension1 = explode(".",$archivo1);
    $ext1 = $extension1[1];//AQUI LA EXTENSION
    $destino1 = $carpetaDestino1.$ultimoIdSerie."portada.".$ext1;

    $carpetaDestino2 = '../Imagenes/LogosPeliculas/';
    $archivo2 = $_FILES["LogoPelicula"]["name"];
    $extension2 = explode(".",$archivo2);
    $ext2 = $extension2[1];//AQUI LA EXTENSION
    $destino2 = $carpetaDestino2.$ultimoIdSerie."logo.".$ext2;
    echo 'Esto es destino '.$destino." - ".$destino1." - ".$destino2." - ".$$ultimoIdSerie;
    echo "<p>";

    if (move_uploaded_file($_FILES['posterPelicula']['tmp_name'], $destino) && move_uploaded_file($_FILES['portadaPelicula']['tmp_name'], $destino1) && move_uploaded_file($_FILES['LogoPelicula']['tmp_name'], $destino2)) {
        $urlDestinoPoster = substr($destino, 3, strlen($destino));
        $urlDestinoPortada = substr($destino1, 3, strlen($destino1));
        $urlDestinoLogo = substr($destino2, 3, strlen($destino2));
        echo 'Esto lo que se dirige'.$urlDestinoPoster.' - '.$urlDestinoLogo.' - '.$ultimoIdSerie;
        $PeliculaBLL->updateImage($urlDestinoPoster, $urlDestinoPortada,$urlDestinoLogo, $ultimoIdSerie);
        echo 'Guardado exitoso.';
        //header('Location: ../Principal.php');
        header('Location: Ingresar.php');
    } else {
        echo 'No se pudo guardar';
    }

    echo "</p>";
    
?>

    </body>
</html>
