<?php
include_once './DAO/DAL/Connection.php';
include_once './DAO/DTO/Pelicula.php';
include_once './DAO/BLL/PeliculaBLL.php';
$peliculasBLL = new PeliculaBLL();
$id = 0;
$objPeliculas = null;
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    $objPeliculas = $peliculasBLL->select($id);
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
        <div class="col-md-6">
            <h2>Datos de Peliculas</h2>
            <form action="AbmPeliculas.php" method="post">
                <input type="hidden" value="<?php
                if ($objPeliculas != null) {
                    echo "actualizar";
                } else {
                    echo "insertar";
                }
                ?>" name="tarea"/>
                <input  type="hidden" value="<?php echo $id; ?>" name="id"/>
                <div class="form-group">
                    <label>
                        Nombre:
                    </label>
                    <input class="form-control" type="text" name="nombre" value="<?php
                    if ($objPeliculas != null) {
                        echo $objPeliculas->getNombre();
                    }
                    ?>" required="required" />
                </div>
                <div class="form-group">
                    <label>
                        Duración:
                    </label>

                    <input class="form-control" type="text" name="precio" value="<?php
                    if ($objPeliculas != null) {
                        echo $objPeliculas->getPrecio();
                    }
                    ?>" required="required" />
                </div>

                <div class="form-group">
                    <label>
                        Descripcion:
                    </label>

                    <input  style="height: 100px;" class="form-control" type="text" name="descripcion" value="<?php
                    if ($objPeliculas != null) {
                        echo $objPeliculas->getDescripcion();
                    }
                    ?>" required="required" />
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" value="Guardar Datos">
                    <a href="AgregarPeliculas.php" class="btn btn-danger" >Cancelar</a>
                </div>

            </form>
        </div>
    </div>


</div>

</body>
</html>