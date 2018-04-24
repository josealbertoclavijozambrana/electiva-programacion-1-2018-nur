<?php
include_once './uno.php';
$nombres = $_REQUEST["nombres"];
$apellidos = $_REQUEST["apellidos"];
$ciudad = $_REQUEST["ciudad"];
$edad = $_REQUEST["edad"];
$sexo = $_REQUEST["sexo"];
$id = $_REQUEST["id"];

$objPersonaNueva = new Persona($id, $nombres, $apellidos, $ciudad, $sexo, $edad);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <label>Nombre:</label> <?php echo $objPersonaNueva->getNombres();?>
        </div>
        <div>
            <label>Apellidos:</label> <?php echo $objPersonaNueva->getApellidos();?>
        </div>
        <div>
            <label>Ciudad:</label> <?php echo $objPersonaNueva->getCiudad();?>
        </div>
        <div>
            <label>Edad:</label> <?php echo $objPersonaNueva->getEdad();?>
        </div>
        <div>
            <label>Sexo:</label> <?php echo $objPersonaNueva->getSexoForDisplay();?>
        </div>
    </body>
</html>
