<?php
include_once './header.php';

include_once './DAL/Connection.php';
include_once './DTO/Pelicula.php';
include_once './BLL/PeliculaBLL.php';

$objPelicula = null;
$peliculaBLL = new PeliculaBLL();

$task = "insert";
if (isset($_REQUEST["id"])) {
    $objPelicula = $peliculaBLL->selectById($_REQUEST["id"]);
    $task = "update";
}
?>

<div class="container">
    <div class="formContainer">
        <div class="form">
            <form action="listaAdm.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id"  value="<?php
                if ($objPelicula != null) {
                    echo $objPelicula->getId();
                }
                ?>"/>
                <input type="hidden" name="task" value="<?php echo $task; ?>"/>
                <div class="formNombre formDiv">
                    <label>Nombre: </label>

                    <input type="text" class="formInputNombre formInput" name="nombre" value="<?php
                    if ($objPelicula != null) {
                        echo $objPelicula->getNombre();
                    }
                    ?>"/>
                </div>

                <div class="formDirector formDiv">
                    <label>Director:</label>
                    <input type="text" class="formInputDirector formInput" name="director" value="<?php
                    if ($objPelicula != null) {
                        echo $objPelicula->getDirector();
                    }
                    ?>"/>
                </div>

                <div class="formAño formDiv">
                    <label>Año:</label>
                    <input type="date" class="formInputAño formInput" name="anho" value="<?php
                    if ($objPelicula != null) {
                        echo $objPelicula->getAnho();
                    }
                    ?>"/>
                </div>

                <div class="formSinopsis formDiv">
                    <label>Sinopsis:</label>
                    <textarea class="formInputSinopsis" name="sinopsis"><?php
                        if ($objPelicula != null) {
                            echo $objPelicula->getSinopsis();
                        }
                        ?></textarea>

                </div>


                <div class="formURL formDiv">
                    <label>Imagen:</label>
                    <div>
                        <label for="image"><?php
                            if ($objPelicula != null) {
                                echo $objPelicula->getImageURL();
                            }
                            ?> </label>
                        <br>
                        <input type="file" class="formInputURL formInput" name="image" 
                               id="image" accept=".jpg, .jpeg, .png, .gif" />
                               
                    </div>
                </div>

                <div class="formBtn formDiv">
                    <input type="submit" value="Aceptar" class="formInputButtom"/>
                    <a href="index.php">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once './footer.php'; ?>
