<?php
include_once './DAO/DAL/Connection.php';
include_once './DAO/DTO/Pelicula.php';
include_once './DAO/BLL/PeliculaBLL.php';




$peliculaBLL = new PeliculaBLL();

if (isset($_REQUEST["tarea"])) {
    $tarea = $_REQUEST["tarea"];
    switch ($tarea) {
        case "insertar":
            if (!isset($_REQUEST["nombre"]) || !isset($_REQUEST["precio"]) || !isset($_REQUEST["descripcion"])) {
                mostrarMensaje('Error al insertar, parametros incompletos');
            } else {
                $nombre = $_REQUEST["nombre"];
                $precio = $_REQUEST["precio"];
                $descripcion = $_REQUEST["descripcion"];
                $peliculaBLL->insert($nombre, $precio, $descripcion);
            }
            break;
        case "actualizar":
            if (!isset($_REQUEST["nombre"]) || !isset($_REQUEST["precio"]) || !isset($_REQUEST["descripcion"]) || !isset($_REQUEST["id"])) {
                mostrarMensaje('Error al actualizar, parametros incompletos');
            } else {
                $id = $_REQUEST["id"];
                $nombre = $_REQUEST["nombre"];
                $precio = $_REQUEST["precio"];
                $descripcion = $_REQUEST["descripcion"];
                $peliculaBLL->update($nombre, $precio, $descripcion, $id);
            }
            break;
        case "eliminar":
            if (!isset($_REQUEST["id"])) {
                mostrarMensaje('Error al eliminar, parametros incompletos');
            } else {
                $id = $_REQUEST["id"];
                $peliculaBLL->delete($id);
            }
            break;
        case "fotoperfil":
            if (!isset($_REQUEST["id"])) {
                mostrarMensaje('Error al subir foto, parametros incompletos');
            } else {
                $id = $_REQUEST["id"];
                $dir_subida = 'img/';
                $fichero_subido = $dir_subida . $id . ".jpg";
                if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
//                    echo "El fichero es vÃ¡lido y se subiÃ³ con Ã©xito.\n";
                } else {
//                    echo "Â¡Posible ataque de subida de ficheros!\n";
                }
            }
            break;
    }
}

?>



<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Peliculas</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link href="css/estilo.css" rel="stylesheet" type="text/css"/>
</head>
<body class="letrablanca">

<nav class="navbar navbar-default" style="background: rgba(20, 20, 20, 0.6); border: none; margin-bottom: 50px; ">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/logo.png" width="100px" height="20px"; ></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
            <ul class="nav navbar-nav" style="color: #761c19;">
                <li ><a href="PaginaPrincipal.php">Inicio<span class="sr-only">(current)</span></a></li>
                <li><a href="#">Programas de TV</a></li>
                <li><a href="AgregarPeliculas.php">Peliculas</a></li>
                <li><a href="#">Originales</a></li>
                <li><a href="#">Agregados recientemente</a></li>
                <li><a href="AbmPeliculas.php">Mi lista</a></li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="glyphicon glyphicon-search" style="width: 60px;height: 35px; background-color: rgba(20, 20, 20, 0.6); border: none" ></button>
            </form>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container">


    <div class="row">
        <div class="col-md-12">


            <table class="table">
                <thead>
                <tr>
                    <th>Imagen</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Duración</th>
                    <th>Descripcion</th>


                </tr>
                </thead>
                <tbody>
                <?php
                $listaJuegos = $peliculaBLL->selectAll();
                foreach ($listaJuegos as $objJuego) {
                    ?>


                    <tr>
                        <td>
                            <image class="tamanioimg" src="img/<?php echo $objJuego->getId(); ?>.jpg" />
                        </td>
                        <td>
                            <?php echo $objJuego->getId(); ?>
                        </td>
                        <td>
                            <?php echo $objJuego->getNombre(); ?>
                        </td>
                        <td>
                            <?php echo $objJuego->getPrecio(); ?>
                        </td>

                        <td>
                            <?php echo $objJuego->getDescripcion(); ?>
                        </td>
                        <td>
                            <a href="imagenPelicula.php?id=<?php echo $objJuego->getId(); ?>"><i class="glyphicon glyphicon-camera"></i>Subir Imagen</a>
                        </td>
                        <td>
                            <a href="AgregarPeliculas.php?id=<?php echo $objJuego->getId(); ?>"><i class="glyphicon glyphicon-edit"></i>Editar</a>
                        </td>
                        <td>
                            <a href="AbmPeliculas.php?tarea=eliminar&id=<?php echo $objJuego->getId(); ?>"><i class="glyphicon glyphicon-trash"></i>Eliminar</a>
                        </td>


                    </tr>



                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>