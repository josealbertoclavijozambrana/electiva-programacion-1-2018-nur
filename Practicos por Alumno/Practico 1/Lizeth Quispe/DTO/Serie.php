<?php
/**
 * Description of Serie
 *
 * @author Liz
 */
class Serie {
    public $serie;
    public $nombre;
    public $descripcion;
    public $logo;
    public $portada;
    public $emision;
    public $estado;
    public $temporada;
    
    function getTemporada() {
        return $this->temporada;
    }

    function setTemporada($temporada) {
        $this->temporada = $temporada;
    }
    
    function getEmision() {
        return $this->emision;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEmision($emision) {
        $this->emision = $emision;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    function getSerie() {
        return $this->serie;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getLogo() {
        return $this->logo;
    }

    function getPortada() {
        return $this->portada;
    }

    function setSerie($serie) {
        $this->serie = $serie;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function setPortada($portada) {
        $this->portada = $portada;
    }

}
