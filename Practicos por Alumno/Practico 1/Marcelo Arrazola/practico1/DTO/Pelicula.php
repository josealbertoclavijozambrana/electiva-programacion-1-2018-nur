<?php

class Pelicula {

    public $id;
    public $nombre;
    public $anho;
    public $sinopsis;
    public $director;
    public $imageURL;

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getAnho() {
        return $this->anho;
    }

    function getSinopsis() {
        return $this->sinopsis;
    }

    function getDirector() {
        return $this->director;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setAnho($anho) {
        $this->anho = $anho;
    }

    function setSinopsis($sinopsis) {
        $this->sinopsis = $sinopsis;
    }

    function setDirector($director) {
        $this->director = $director;
    }

    function getImageURL() {
        return $this->imageURL;
    }

    function setImageURL($imageURL) {
        $this->imageURL = $imageURL;
    }


    
}
