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
                    <th>Nombre</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $listaSeries = $SerieBLL->selectAll();
                foreach ($listaSeries as $objSerie) {
                    ?>
                    <tr>
                        <td><?php echo $objSerie->getSerie(); ?></td>
                        <td><?php echo $objSerie->getNombre(); ?></td>
                        <td><?php echo $objSerie->getDescripcion(); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
