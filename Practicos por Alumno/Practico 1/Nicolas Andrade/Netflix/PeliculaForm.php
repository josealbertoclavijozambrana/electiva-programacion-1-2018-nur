<?php
include_once 'DAO/DAL/Connection.php';
include_once 'DAO/DTO/Pelicula.php';
include_once 'DAO/BLL/PeliculaBLL.php';


$objPeliculaBLL = new PeliculaBLL();
$objPelicula = null;
$task = "insert";
if (isset($_REQUEST["id"])) {
    $objPelicula = $objPeliculaBLL->selectById($_REQUEST["id"]);
    $task = "update";
}

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <title>Registro de Peliculas</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 offset-4">
            <h1>MOVIE CENTER</h1>
            <h3>Registro De Peliculas</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3">
            <form action="index.php" method="POST">

                <input type="hidden" name="task" value="<?php echo $task ?>"/>
                <input type="hidden" name="id" value="<?php
                if ($objPelicula != null) {
                    echo $objPelicula->getId();
                }
                ?>"/>

                <div class="form-group">
                    <label>Nombre: </label>
                    <input type="text" name="nombre" class="form-control" value="<?php
                    if ($objPelicula != null) {
                        echo $objPelicula->getNombre();
                    }
                    ?>"/>
                </div>

                <div class="form-group">
                    <label>Descripcion: </label>
                    <textarea name="descripcion" cols="10" rows="5" class="form-control">
                        <?php
                        if ($objPelicula != null) {
                            echo $objPelicula->getDescripcion();
                        }
                        ?>
                    </textarea>
                </div>

                <div class="form-group">
                    <label>Duracion: </label>
                    <input type="number" name="duracion" min="1" class="form-control" value="<?php
                    if ($objPelicula != null) {
                        echo trim($objPelicula->getDuracion(), "  ");
                    }
                    ?>"/>
                </div>

                <div class="form-group">
                    <label>Portada: </label>
                    <input type="file" name="imagen" class="form-control"/>
                </div>

                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-primary"/>
                    <a class="btn btn-danger" href="index.php">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</html>
