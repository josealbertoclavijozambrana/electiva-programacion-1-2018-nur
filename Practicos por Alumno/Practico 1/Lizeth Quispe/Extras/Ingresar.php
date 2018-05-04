<!DOCTYPE html>

<?php
    include '../BLL/SerieBLL.php';
    include '../BLL/PeliculaBLL.php';
    include '../BLL/PeliculaGenerosBLL.php';
    include '../BLL/SerieGenerosBLL.php';
    include '../DAL/Connection.php';
    
    $SerieBLL = new SerieBLL();
    $PeliculaBLL = new PeliculaBLL();
    $PeliculaGenerosBLL = new PeliculaGenerosBLL();
    $SerieGenerosBLL = new SerieGenerosBLL();
    
    //$ultimoIdSerie = ($SerieBLL->obtenerUltimo())+1;
    //$ultimoIdPelicula = ($PeliculaBLL->obtenerUltimo())+1;
    
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <link href="Bootstrap/style.css" rel="stylesheet" type="text/css"/>
        
        <style>
            label{
                font-weight: bolder;
            }
            
            input type=*[submit]{
                margin-top: 25px;
            }
        </style>
        
        <title>Registro</title>
    </head>
    <body>
        
        <div class="row">
            <div class="col-2 col-md-4" style="margin-left: 200px;">
                <h4>SERIE:</h4>
                <form enctype="multipart/form-data" action="ConfirmacionSerie.php" method="POST">
                    <div>
                        <label for="txtSerie">Nombre de Serie:</label>
                        <input class="form-control" id="txtSerie" placeholder="Ingresar serie" name="txtSerie"/>
                    </div>
                    <div>
                        <label for="txtDescripcion">Descripcion:</label>
                        <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Ingresar Descripcion"></textarea>
                    </div>
                    <div>
                        <label for="txtEmision">Fecha de primera Emision</label>
                        <input class="form-control" id="txtEmision" name="txtEmision" type="date"/>
                    </div>
                    <div>
                        <label for="txtTemporada">Cuantas temporadas tiene:</label>
                        <input class="form-control" id="txtTemporada" name="txtTemporada" type="number"/>
                    </div>
                    <div>
                    <label for="txtEstado">Estado de la serie</label>
                        <select class="custom-select d-block w-100" name="txtEstado">
                            <option value="E">En emision</option>
                            <option value="T">Terminado</option>
                            <option value="C">Cancelado</option>
                        </select>
                    </div>
                    <div>
                        <label>Portada de la Serie:</label> 
                        <input class="form-control-file"  name="portadafile" type="file" />
                    </div>
                    <div>
                        <label>Logo de la Serie:</label>
                        <input class="form-control-file" name="logofile" type="file" />
                    </div>
                    <div>
                    <input class="btn-dark" type="submit" value="Enviar Serie" />
                    </div>
                </form>
            </div>

            <div class="col-4">
                <h3>PELICULA:</h3>
                <form enctype="multipart/form-data" action="ConfirmacionPelicula.php" method="POST">
                    <div>
                        <label for="txtTitulo">Nombre de pelicula:</label>
                        <input class="form-control" id="txtTitulo" placeholder="Ingresar titulo de Pelicula" name="txtTitulo"/>
                    </div>
                    <div>
                        <label for="txtSubtitulo">Subtitulo si en caso tiene:</label>
                        <input class="form-control" id="txtSubtitulo" placeholder="Ingresar subtitulo de Pelicula" name="txtSubtitulo"/>
                    </div>
                    <div>
                        <label for="txtDescripcion">Descripcion:</label>
                        <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Ingresar Descripcion"></textarea>
                    </div>
                    <div>
                        <label for="txtEmision">Año de estreno:</label>
                        <input class="form-control" id="txtEmision" name="txtEmision" type="date"/>
                    </div>
                    <div>
                        <label for="txtDuracion">Duracion de la Pelicula:</label>
                        <input class="form-control" id="txtDuracion" name="txtDuracion" type="time"/>
                    </div>

                    <div>
                        <label for="txtClasificacion">Clasificacion de la pelicula:</label>
                        <input class="form-control" id="txtRango" name="txtClasificacion" type="text"/>
                    </div>
                    <div>
                        <label>Poster de la Pelicula:</label>
                        <input name="posterPelicula" class="form-control-file" type="file" />
                    </div>
                    <div>
                        <label>Portada de la Pelicula:</label>
                        <input name="portadaPelicula" class="form-control-file" type="file" />
                    </div>
                    <div>
                        <label>Logo de la Pelicula:</label>
                        <input name="LogoPelicula" class="form-control-file" type="file" />
                    </div>
                    <div>
                    <input class="btn-dark" type="submit" value="Enviar Pelicula" />
                    </div>
                </form>
            </div>
            <div>
                <form action="../Principal.php" method="">
                    <input type="submit" value="Pagina Principal" class="btn-info"/>
                        
                </form>
            </div>
        </div>
        
        
    </body>
</html>
