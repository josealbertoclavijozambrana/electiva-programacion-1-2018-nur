<?php

class PeliculaGenero{
    private $IdPeliculaGenero;
    private $IdPelicula;
    private $IdGenero;
    
    function getIdPeliculaGenero() {
        return $this->IdPeliculaGenero;
    }

    function getIdPelicula() {
        return $this->IdPelicula;
    }

    function getIdGenero() {
        return $this->IdGenero;
    }

    function setIdPeliculaGenero($IdPeliculaGenero) {
        $this->IdPeliculaGenero = $IdPeliculaGenero;
    }

    function setIdPelicula($IdPelicula) {
        $this->IdPelicula = $IdPelicula;
    }

    function setIdGenero($IdGenero) {
        $this->IdGenero = $IdGenero;
    }


}
