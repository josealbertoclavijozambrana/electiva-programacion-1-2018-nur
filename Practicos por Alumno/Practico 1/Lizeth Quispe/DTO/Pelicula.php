<?php

class Pelicula {
    private $IdPelicula;
    private $titulo;
    private $subtitulo;
    private $descripcion;
    private $emision;
    private $duracion;
    private $posters;
    private $portada;
    private $logo;
    private $rango;
    
    function getLogo() {
        return $this->logo;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

        function getIdPelicula() {
        return $this->IdPelicula;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getSubtitulo() {
        return $this->subtitulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getEmision() {
        return $this->emision;
    }

    function getDuracion() {
        return $this->duracion;
    }

    function getPosters() {
        return $this->posters;
    }

    function getPortada() {
        return $this->portada;
    }

    function getRango() {
        return $this->rango;
    }

    function setIdPelicula($IdPelicula) {
        $this->IdPelicula = $IdPelicula;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setSubtitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setEmision($emision) {
        $this->emision = $emision;
    }

    function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    function setPosters($posters) {
        $this->posters = $posters;
    }

    function setPortada($portada) {
        $this->portada = $portada;
    }

    function setRango($rango) {
        $this->rango = $rango;
    }


}
