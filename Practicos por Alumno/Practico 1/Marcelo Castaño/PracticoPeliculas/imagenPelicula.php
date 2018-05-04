<?php
include_once './DAO/DAL/Connection.php';
include_once './DAO/DTO/Pelicula.php';
include_once './DAO/BLL/PeliculaBLL.php';
$juegoBLL = new PeliculaBLL();
$id = 0;
$objJuego = null;
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Netflix</title>

    <link id="pagestyle" rel="stylesheet" type="text/css" href="css/default.css" />
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
        <h2 style="font-size: 80px; color:#bd081c;">Agregar Imagen</h2>
        <div class="col-md-9">

                <div class="panel panel-body" style="background-color: rgba(20, 20, 20, 0.9);">
                    <form action="AbmPeliculas.php" enctype="multipart/form-data" method="post">
                        <input  type="hidden" value="fotoperfil" name="tarea"/>
                        <input  type="hidden" value="<?php echo $id; ?>" name="id" />
                        <div class="form-group">
                            <input type="file" name="archivo" required="required" style="color:#bd081c;" />
                            <br>
                            <image class="tamanioimg" src="img/<?php echo $id; ?>.jpg" />
                        </div>
                        <br>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Guardar" />
                            <a href="imagenPelicula.php" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
</body>
</html>