<?php

include_once './Header.php';
include_once './DAL/Connection.php';
include_once './BLL/SerieBLL.php';
include_once './BLL/PeliculaBLL.php';
include_once './DTO/Pelicula.php';
include_once './DTO/Serie.php';


$SerieBLL = new SerieBLL();
$PeliculaBLL = new PeliculaBLL();
?>

<title>Inicio</title>
</head>
<body style="background-color: #1B1A1B; padding: 0px 0px;" >
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="navegador">
        <a class="navbar-brand" href="#">
            <img id="LogoNetflix" src="Imagenes/Logos/Netflixlogo.png" alt="Logo Netflix"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Series</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Peliculas</a>
                </li>
            </ul>
            <div class="form-inline my-2 my-md-0">
                <i class="iconSimple" data-feather="search" ></i>
                <a id="link" class="nav-link" href="#" >KIDS</a>
                <i class="iconComplete" data-feather="bell" ></i>
                <img id="profile" src="Imagenes/Extras/Daria.jpg" alt="profile" />
                <i id="triangulo" data-feather="triangle"></i>
            </div>
        </div>
    </nav>

    <div class="container-fluid" id="ContainerPortada">
        <div id="MascaraPortada" style=""></div>
        <img id="ImagenPortada" src="Imagenes/Portadas/1portada.jpg" alt="" class="container-fluid"/>
    </div>
    <div id="containerInformacion" >
        <div class="center">    
            <img id="ImageLogo" src="Imagenes/Logos/1logo.png" alt="Logo de serie"/>
            <div class="form-inline">
                <form>
                    <div class="btnContainer" >
                        <i class="iconComplete" data-feather="play" ></i>
                        <input class="btnInfo" type="submit" value="Reproducir" />
                    </div>
                </form>
                <form>
                    <div class="btnContainer">
                        <i class="iconComplete" data-feather="plus" ></i>
                        <input class="btnInfo" type="submit" value="Agregar" />
                    </div>
                </form>
            </div>
        </div>

        <div id="informacion" class="container-fluid">
            <h4>
                Mira sus 5 temporadas.
            </h4>
            <p>
                ¿Listos para la aventura?
                Acompaña a Lina, Gourry y sus amigos en aventuras magicas y llena de villanos misteriosos.
            </p>
        </div>
    </div>


    <section class="carousel slide" data-ride="carousel" id="postsCarousel">
        <div class="container">
            <div class="row" id="flechas">
                <a id="btnprev" class="btn btn-outline-secondary prev" style="border: none"href=""><i data-feather="chevron-left" style="color: white;border: none;"></i></a>
                <a id="btnmore" class="btn btn-outline-secondary next" style="border: none" href=""><i data-feather="chevron-right" style="color: white;border: none;"></i></a>
            </div>
        </div>
        
        <div class="container p-t-0 m-t-2 carousel-inner">
            <div class="row row-equal carousel-item active m-t-0">
        <?php 
            $listaPeliculas = $PeliculaBLL->selectAll();
            for ($i = 0; $i <11; $i++){
        ?>
                <div id="contenido<?php echo $listaPeliculas[$i]->getIdPelicula(); ?>" class="col-md-3">
                    <div id = "contenidoCard<?php echo $listaPeliculas[$i]->getIdPelicula(); ?>" class="card">
                        <div class="card-img-top-410 card-block">
                            <a style="background-color: transparent;" class="texto" href="javascript:MostrarOcultar('texto<?php echo $listaPeliculas[$i]->getIdPelicula();?>');">
                            <img id="contenidoImg<?php echo $listaPeliculas[$i]->getIdPelicula(); ?>" src="<?php echo $listaPeliculas[$i]->getPosters();?>" alt="Carousel<?php echo $listaPeliculas[$i]->getIdPelicula();?>"/>
                            </a>
                        </div>
                        <div  class="cp_oculta" id="texto<?php echo $listaPeliculas[$i]->getIdPelicula();?>">
                            <h1><?php echo $listaPeliculas[$i]->getDescripcion();?></h1>
                        </div>
                    </div>
                </div>
        <?php 
                if($i == 3 ||$i == 7 ||$i == 11){?>
            </div>
            <div class="row row-equal carousel-item m-t-0">
        <?php       
                }
            } 
        ?>
            </div>
        </div>
    </section>
    <?php

    include_once './Footer.php';
    ?>