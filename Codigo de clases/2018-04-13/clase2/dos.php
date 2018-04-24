<?php
include_once './uno.php';

$objPersona = new Persona(1, "Juan", "Perez", "Santa Cruz", 1, 20);
?>


<html>
    <head>
        <title>Persona</title>
    </head>
    <body>
        <form action="tres.php" method="POST">
            <input type="hidden" value="<?php echo $objPersona->getId(); ?>" name="id"/>
            <div>
                <input type="text" value="<?php echo $objPersona->getNombres(); ?>" name="nombres" />
            </div>
            <div>
                <input type="text" value="<?php echo $objPersona->getApellidos(); ?>" name="apellidos" />
            </div>
            <div>
                <input type="text" value="<?php echo $objPersona->getCiudad(); ?>" name="ciudad" />
            </div>
            <div>
                <input type="number" value="<?php echo $objPersona->getEdad(); ?>" name="edad" />
            </div>
            <div>
                <select name="sexo">
                    <option <?php echo ($objPersona->getSexo() == 0) ? ' selected ' : ""; ?> value="0">Femenino</option>
                    <option <?php echo ($objPersona->getSexo() == 1) ? ' selected ' : ""; ?> value="1">Masculino</option>
                </select>
            </div>
            <input type="submit" value="Guardar"/>
        </form>
    </body>
</html>
