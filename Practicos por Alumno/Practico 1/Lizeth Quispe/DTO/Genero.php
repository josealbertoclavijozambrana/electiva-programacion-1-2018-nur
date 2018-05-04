<?php
/**
 * Description of Genero
 *
 * @author Liz
 */
class Genero {
    public $genero;
    public $nombre;
    function getGenero() {
        return $this->genero;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function __construct($genero, $nombre) {
        $this->genero = $genero;
        $this->nombre = $nombre;
    }

}