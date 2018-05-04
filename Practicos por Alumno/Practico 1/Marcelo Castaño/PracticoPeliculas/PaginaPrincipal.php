<?php
include_once './DAO/DAL/Connection.php';
include_once './DAO/DTO/Pelicula.php';
include_once './DAO/BLL/PeliculaBLL.php';
$peliculaBLL = new PeliculaBLL();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Peliculas Netflix</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <meta name="description" content="Plus E-Commerce Template">
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
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css" />


    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css" />


    <link rel="stylesheet" type="text/css" href="css/animate.css" />


    <link rel="stylesheet" type="text/css" href="css/swiper.css" />

    <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
    <link id="pagestyle" rel="stylesheet" type="text/css" href="css/default.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <link href="css/estilo.css" rel="stylesheet" type="text/css"/>

    <!-- Google fonts -->
    <!--        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">-->



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
       <video autoplay="autoplay" loop="loop" id="video_background" preload="auto" volume="50"/>
    <source src="img/The%20Rain%20-%20Özel%20Video%20%5BHD%5D%20-%20Netflix.mp4" type="video/mp4" />
    </video/>



<!-- start section -->
<section >
    <div id="colortransparente">





        <div class="row column-4">
            <?php
            $listaJuegos = $peliculaBLL->selectAll();
            foreach ($listaJuegos as $objJuego) {
                ?>

                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail store style3" id="fondonegro">
                        <div class="header">
                            <div class="badges">
                                <a href="Descripcion.php?id=<?php echo $objJuego->getId(); ?>" target="_blank">
                                    <image class="tamanioimg" src="img/<?php echo $objJuego->getId(); ?>.jpg" /></a>

                            </div>


                        </div>
                        <div class="caption" >
                            <h6 class="regular"  ><a href="shop-single-product-v1.html" id="letrablanca"><?php echo $objJuego->getNombre(); ?></a></h6>
                            <div class="price">
                                <span class="amount text-primary" id="letrablanca"><?php echo $objJuego->getPrecio(); ?></span>
                            </div>
                        </div>
                        <!-- end caption -->
                    </div><!-- end thumbnail -->
                </div><!-- end col -->
                <?php
            }
            ?>


        </div><!-- end row -->



        <!-- end footer -->


        <!-- JavaScript Files -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/jquery.downCount.js"></script>
        <script type="text/javascript" src="js/nouislider.min.js"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/pace.min.js"></script>
        <script type="text/javascript" src="js/star-rating.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript" src="js/gmaps.js"></script>
        <script type="text/javascript" src="js/swiper.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

        <!-- Initialize Swiper slide -->
        <script>
            var swiperH = new Swiper('.swiper-coverflow', {
                pagination: '.swiper-pagination',
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                paginationClickable: true,
                effect: 'coverflow',
                centeredSlides: true,
                slidesPerView: 'auto',
                loop: true,
                coverflow: {
                    rotate: 50,
                    stretch: 0,
                    depth: 100,
                    modifier: 1,
                    slideShadows: true
                }
            });
        </script>

</body>
</html>