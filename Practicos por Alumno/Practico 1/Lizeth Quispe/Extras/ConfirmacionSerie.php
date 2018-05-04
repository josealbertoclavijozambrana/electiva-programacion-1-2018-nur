<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <?php 
    include '../BLL/SerieBLL.php';
    include '../DAL/Connection.php';
    include '../DTO/Serie.php';
    //include './Principal.php';
    $SerieBLL = new SerieBLL();
    
    $nombre = filter_input(INPUT_POST,'txtSerie');
    $descripcion = filter_input(INPUT_POST,'txtDescripcion');
    $emision = filter_input(INPUT_POST,'txtEmision');
    $estado = filter_input(INPUT_POST,'txtEstado');
    $temporada = filter_input(INPUT_POST, 'txtTemporada');
    
    
    $SerieBLL->insert($nombre, $descripcion, "Logo", "Portada", $emision, $estado, $temporada);   
    
    $ultimoIdSerie = $SerieBLL->obtenerUltimo();
    
    echo 'Esto es lo que recibe ultimo id'.$ultimoIdSerie;
    
    $carpetaDestino = '../Imagenes/Portadas/';
    $archivo = $_FILES["portadafile"]["name"];
    $extension = explode(".",$archivo);
    $ext = $extension[1];
    //echo '<p>Esto es la extension'.$ext.'</p>';
    $destino = $carpetaDestino.$ultimoIdSerie."portada.".$ext;
    

    $carpetaDestino2 = '../Imagenes/Logos/';
    $archivo2 = $_FILES["logofile"]["name"];
    $extension2 = explode(".",$archivo2);
    $ext2 = $extension2[1];//AQUI LA EXTENSION
    //echo $extension." - ".$extension2;
    //echo $ext." - ".$ext2;
    //echo '<p>Esto es la extension'.$ext.'</p>';
    $destino2 = $carpetaDestino2.$ultimoIdSerie."logo.".$ext2;
    echo 'Esto es destino '.$destino." - ".$destino2." - ".$ultimoIdSerie;
    echo "<p>";

    if (move_uploaded_file($_FILES['portadafile']['tmp_name'], $destino) && move_uploaded_file($_FILES['logofile']['tmp_name'], $destino2)) {
        $urlDestinoPortada = substr($destino, 3, strlen($destino));
        $urlDestinoLogo = substr($destino2, 3, strlen($destino2));
        echo 'Esto lo que se dirige'.$urlDestinoLogo.' - '.$urlDestinoPortada;
        $SerieBLL->updateImage($urlDestinoLogo, $urlDestinoPortada, $ultimoIdSerie);
        echo 'Guardado exitoso.';
        header('Location: ../Principal.php');

    } else {
        echo 'No se pudo guardar';
    }

    echo "</p>";
    
?>

    </body>
</html>
