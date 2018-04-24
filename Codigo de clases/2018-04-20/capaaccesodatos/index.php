<?php
include_once './DAL/Connection.php';
include_once './DTO/Persona.php';
include_once './BLL/PersonaBLL.php';

$personaBLL = new PersonaBLL();
//$personaBLL->insert("Juan", "Perez", "Santa Cruz", 20, "2018-05-05");
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Fecha Nacimiento</th>
                    <th>Ciudad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $listaPersonas = $personaBLL->selectAll();
                foreach ($listaPersonas as $objPersona) {
                    ?>
                    <tr>
                        <td><?php echo $objPersona->getId(); ?></td>
                        <td><?php echo $objPersona->getNombres(); ?></td>
                        <td><?php echo $objPersona->getApellidos(); ?></td>
                        <td><?php echo $objPersona->getEdad(); ?></td>
                        <td><?php echo $objPersona->getFechaNacimiento(); ?></td>
                        <td><?php echo $objPersona->getCiudad(); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
