<?php
include_once './header.php';

include_once './DAL/Connection.php';
include_once './DTO/Pelicula.php';
include_once './BLL/PeliculaBLL.php';

$objPelicula = null;
$peliculaBLL = new PeliculaBLL();

if (isset($_REQUEST["id"])) {
    $objPelicula = $peliculaBLL->selectById($_REQUEST["id"]);
}
?>
<div>
    <div class="divAtras">
        <a href="index.php" class="link linkDesc"><i class="far fa-arrow-alt-circle-left"></i>Atras</a>
    </div>
    <div class="divImagen">
        <img class="imgPortadaDesc" src="<?php echo $objPelicula->getImageURL() ?>" alt="portada1"/>
    </div>
    <div class="contenido">
        <div class="divNombre">
            <label class="tituloDesc">Pelicula: <br>
                <?php
                echo $objPelicula->getNombre();
                ?>
            </label>
        </div>
        <div class="divSinopsis">
            <label class="textoDesc"> Sinopsis:<br>
                <?php
                if ($objPelicula != null) {
                    echo $objPelicula->getSinopsis();
                }
                ?>
            </label>
        </div>

        <div class="divAnho">
            <label class="textoDesc"> Fecha de Estreno: <br>
                <?php
                if ($objPelicula != null) {
                    echo $objPelicula->getAnho();
                }
                ?>
            </label>
        </div>

        <div class="divDirector">
            <label class="textoDesc"> Director: <br>
                <?php
                if ($objPelicula != null) {
                    echo $objPelicula->getDirector();
                }
                ?>
            </label>
        </div>

    </div>
    <a href="descPelicula.php?id=<?php echo $objPelicula->getId() ?>" class="linkIconDesc iconPlayDesc">
        <i class="far fa-play-circle"></i>
    </a>
    <div class="divSubIconsDesc">
        <a href="#" class="linkIconDesc subIconsDesc">
            <i class="far fa-thumbs-up"></i>
        </a>
        <a href="#" class="linkIconDesc subIconsDesc">
            <i class="far fa-thumbs-down"></i>
        </a>
        <a href="#" class="linkIconDesc subIconsDesc">
            <i class="far fa-plus-square"></i>
        </a>
    </div>
</div>

<?php
include_once './footer.php';
?>