<?php
include_once './DAO/DAL/Connection.php';
include_once './DAO/DTO/Pelicula.php';
include_once './DAO/BLL/PeliculaBLL.php';
include_once './DAO/DAL/Connection.php';

$peliculaBLL = new PeliculaBLL();
$id = 0;
$objPeliculas = null;
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    $objPeliculas = $peliculaBLL->select($id);
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Peliculas</title>
    <meta charset="utf-8">
    <meta name="description" content="Netflix">
    <meta name="author" content="Diamant Gjota" />
    <meta name="keywords" content="plus, html5, css3, template, ecommerce, e-commerce, bootstrap, responsive, creative" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- css files -->
    <link href="css/estilo.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css" />


    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css" />


    <link rel="stylesheet" type="text/css" href="css/animate.css" />


    <link rel="stylesheet" type="text/css" href="css/swiper.css" />

    <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
    <link id="pagestyle" rel="stylesheet" type="text/css" href="css/default.css" />

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">


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
        <div class="col-md-8">
            <h2 style="font-size: 80px; color:#bd081c;">Peliculas</h2>
            <form action="AbmPeliculas.php" method="post">

                <div class="form-group">
                    <image  class="tamanoImagen" src="img/<?php echo $id; ?>.jpg" />
                </div>
                <div class="form-group">
                    <label style="font-size: 25px; color:#bd081c;">
                        Nombre:
                    </label>
                    <br>
                    <label style="font-style: italic; font-size: 30px; ">
                        <?php
                        if ($objPeliculas != null) {
                            echo $objPeliculas->getNombre();
                        }
                        ?>
                    </label>
                </div>
                <div class="form-group">
                    <label style="font-size: 25px; color:#bd081c;">
                        Descripcion:
                    </label><br>
                    <label style="font-style: italic; font-size: 30px; ">
                        <?php
                        if ($objPeliculas != null) {
                            echo $objPeliculas->getDescripcion();
                        }
                        ?>
                    </label>
                </div>
                <div class="form-group">
                    <label style="font-size: 25px; color:#bd081c;">
                        Duracción:
                    </label><br>
                    <label style="font-style: italic; font-size: 30px;">
                        <?php
                        if ($objPeliculas != null) {
                            echo $objPeliculas->getPrecio();
                        }
                        ?>
                    </label>
                </div>
            </form>
        </div>
    </div>


</div>

<!-- Swiper slider-->

</body>
</html>