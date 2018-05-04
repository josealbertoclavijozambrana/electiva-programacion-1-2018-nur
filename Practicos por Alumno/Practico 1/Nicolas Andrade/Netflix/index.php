<?php

include_once 'DAO/DAL/Connection.php';
include_once 'DAO/DTO/Pelicula.php';
include_once 'DAO/BLL/PeliculaBLL.php';
include_once 'DAO/DTO/Categoria.php';
include_once 'DAO/BLL/CategoriaBLL.php';

$objPeliculaBLL = new PeliculaBLL();
$task = "";
if (isset($_REQUEST["task"])) {
    $task = $_REQUEST["task"];
}

switch ($task) {
    case "insert":
        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["descripcion"]) && isset($_REQUEST["duracion"])
            && isset($_REQUEST["imagen"])) {
            $nombre = $_REQUEST["nombre"];
            $descripcion = $_REQUEST["descripcion"];
            $duracion = $_REQUEST["duracion"];
            $imagen = $_REQUEST["imagen"];

            $objPeliculaBLL->insert($nombre, $descripcion, $duracion, $imagen);
        }
        break;

    case "update":
        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["descripcion"]) && isset($_REQUEST["duracion"])
            && isset($_REQUEST["imagen"]) && isset($_REQUEST["id"])) {
            $nombre = $_REQUEST["nombre"];
            $descripcion = $_REQUEST["descripcion"];
            $duracion = $_REQUEST["duracion"];
            $imagen = $_REQUEST["imagen"];
            $id = $_REQUEST["id"];
            $objPeliculaBLL->update($nombre, $descripcion, $duracion, $imagen, $id);

        }
        break;

    case "delete":
        if(isset($_REQUEST["id"])){
            $objPeliculaBLL->delete($_REQUEST["id"]);
        }
        break;
}

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <title>MovieCenter</title>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>MOVIE CENTER</h1>
            <a href="PeliculaForm.php" class="btn btn-dark">Guardar Nueva Pelicula</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-dark" id="peliculas">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Duracion</th>
                    <th>Imagen</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $listaPeliculas = $objPeliculaBLL->sellectAll();
                foreach ($listaPeliculas as $objPelicula) {
                    ?>
                    <tr>
                        <td> <?php echo $objPelicula->getId(); ?> </td>
                        <td> <?php echo $objPelicula->getNombre(); ?> </td>
                        <td> <?php echo $objPelicula->getDescripcion(); ?> </td>
                        <td> <?php echo $objPelicula->getDuracion() . " minutos"; ?> </td>
                        <td>
                            <img src="img/<?php echo $objPelicula->getId().".jpeg"; ?>" alt="Portada">
                        </td>
                        <td>
                            <a class="btn btn-info" href="PeliculaForm.php?id=<?php echo $objPelicula->getId() ?>">Editar</a>
                        </td>
                        <td>
                            <a class="btn btn-danger"
                               href="index.php?id=<?php echo $objPelicula->getId(); ?>&task=delete">Eliminar</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <div class="pelicula">
            </div>
        </div>
    </div>
</div>

</body>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</html>
