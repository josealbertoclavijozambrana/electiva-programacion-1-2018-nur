<?php
include_once './header.php';

include_once './DAL/Connection.php';
include_once './DTO/Pelicula.php';
include_once './BLL/PeliculaBLL.php';

$peliculaBLL = new PeliculaBLL();
$task = "list";

if (isset($_REQUEST["task"])) {
    $task = $_REQUEST["task"];
}

switch ($task) {
    case "insert":

        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["director"]) && isset($_REQUEST["anho"]) && isset($_REQUEST["sinopsis"]) && isset($_REQUEST["image"])) {

            $nombre = $_REQUEST["nombre"];
            $director = $_REQUEST["director"];
            $sinopsis = $_REQUEST["sinopsis"];
            $anho = $_REQUEST["anho"];
            $image = $_REQUEST["image"];

            $peliculaBLL->insert($nombre, $anho, $sinopsis, $director, $image);
        }

        break;
    case "update":
        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["director"]) && isset($_REQUEST["anho"]) && isset($_REQUEST["sinopsis"]) && isset($_REQUEST["image"]) && isset($_REQUEST["id"])) {

            $nombre = $_REQUEST["nombre"];
            $director = $_REQUEST["director"];
            $sinopsis = $_REQUEST["sinopsis"];
            $anho = $_REQUEST["anho"];
            $image = $_REQUEST["image"];

            $id = $_REQUEST["id"];

            $peliculaBLL->update($nombre, $director, $sinopsis, $anho, $image, $id);
        }
        break;
    case "delete":

        if (isset($_REQUEST["id"])) {

            $id = $_REQUEST["id"];
            $peliculaBLL->delete($id);
        }
        break;
}
?>

<div>


    <div class="contenedorPeliculas">


        <?php
        $listaPeliculas = $peliculaBLL->selectAll();
        foreach ($listaPeliculas as $objPelicula) {
            ?>
        <div class="pelicula">
            
                <label class="id" id="id"><?php echo $objPelicula->getId() ?></label>

                <div class="divPortada">
                    <img class="imgPortada" src="<?php echo $objPelicula->getImageURL() ?>" alt="portada1"/>
                </div>
                <div class="divTexto">
                    <h1 class="titulo">
                        <?php echo $objPelicula->getNombre() ?>
                    </h1>
                    <label class="texto">
                        <?php echo $objPelicula->getSinopsis() ?> <a href="#" class="link">ver mas</a>
                    </label>
                </div>
                <a href="descPelicula.php?id=<?php echo $objPelicula->getId() ?>" class="linkIcon iconPlay">
                    <i class="far fa-play-circle"></i>
                </a>
                <div class="divSubIcons">
                    <a href="#" class="linkIcon iconLike subIcons">
                        <i class="far fa-thumbs-up"></i>
                    </a>
                    <a href="#" class="linkIcon iconNoLike subIcons">
                        <i class="far fa-thumbs-down"></i>
                    </a>
                    <a href="#" class="linkIcon iconAdd subIcons">
                        <i class="far fa-plus-square"></i>
                    </a>
                </div>


            </div>
            <?php
        }
        ?>

    </div>
    <?php
// put your code here
    ?>
</div>

<?php include_once './footer.php'; ?>