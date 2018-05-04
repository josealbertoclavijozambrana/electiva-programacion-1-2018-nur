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

if (isset($_FILES["image"]["name"])) {

    $imagenN = $_FILES["image"]["name"];
    $imagenT = $_FILES["image"]["type"];
    
    $carpeta = $_SERVER["DOCUMENT_ROOT"] . "/practico1/css/img/";

    $a = move_uploaded_file($_FILES["image"]["tmp_name"], $carpeta . $imagenN);
    echo $a;
}

switch ($task) {
    case "insert":

        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["director"]) && isset($_REQUEST["anho"]) && isset($_REQUEST["sinopsis"]) && isset($_FILES["image"]["name"])) {

            $nombre = $_REQUEST["nombre"];
            $director = $_REQUEST["director"];
            $sinopsis = $_REQUEST["sinopsis"];
            $anho = $_REQUEST["anho"];
            $image = "css/img/" . $_FILES["image"]["name"];

            $peliculaBLL->insert($nombre, $anho, $sinopsis, $director, $image);
        }

        break;
    case "update":
        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["director"]) && isset($_REQUEST["anho"]) && isset($_REQUEST["sinopsis"]) && isset($_FILES["image"]["name"]) && isset($_REQUEST["id"])) {

            $nombre = $_REQUEST["nombre"];
            $director = $_REQUEST["director"];
            $sinopsis = $_REQUEST["sinopsis"];
            $anho = $_REQUEST["anho"];
            $image = "css/img/" . $_FILES["image"]["name"];

            $id = $_REQUEST["id"];

            $peliculaBLL->update($nombre, $anho,$sinopsis, $director, $image, $id);
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


<div class="containerList">
    <div class="">
        <div class="DivTable">
            <table class="tableList">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Año</th>
                        <th>Director</th>
                        <th>Sinopsis</th>
                        <th>Imagen</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
<?php
$listaPeliculas = $peliculaBLL->selectAll();
foreach ($listaPeliculas as $objPelicula) {
    ?>
                        <tr>
                            <td><?php echo $objPelicula->getId(); ?></td>
                            <td><?php echo $objPelicula->getNombre(); ?></td>
                            <td><?php echo $objPelicula->getAnho(); ?></td>
                            <td><?php echo $objPelicula->getDirector(); ?></td>
                            <td><?php echo $objPelicula->getSinopsis(); ?></td>
                            <td><?php echo $objPelicula->getImageURL(); ?></td>
                            <td>
                                <a class="btnEditar btnStandar" href="formulario.php?id=<?php echo $objPelicula->getId(); ?>">Editar</a>
                            </td>
                            <td>
                                <a class="btnEliminar btnStandar" href="listaAdm.php?id=<?php echo $objPelicula->getId(); ?>&task=delete">Eliminar</a>
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

<?php include_once './footer.php'; ?>
