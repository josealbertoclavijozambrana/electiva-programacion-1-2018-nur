<?php
/**
 * Description of Serie_Genero
 *
 * @author Liz
 */
class Serie_Genero {
    public $serie_genero;
    public $serie;
    public $genero;
    
    function getSerie_genero() {
        return $this->serie_genero;
    }

    function getSerie() {
        return $this->serie;
    }

    function getGenero() {
        return $this->genero;
    }

    function setSerie_genero($serie_genero) {
        $this->serie_genero = $serie_genero;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function __construct($serie_genero, $serie, $genero) {
        $this->serie_genero = $serie_genero;
        $this->serie = $serie;
        $this->genero = $genero;
    }

}
