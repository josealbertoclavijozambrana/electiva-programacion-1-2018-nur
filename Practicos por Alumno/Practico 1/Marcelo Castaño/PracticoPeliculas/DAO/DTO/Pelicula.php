<?php
/**
 * Description of Pelicula
 *
 * @author ANDREA_ORTIZ
 */
class Pelicula {
    private $id;
    private $nombre;
    private $precio;
    private $descripcion;
    function getId() {
        return $this->id;
    }
    function getNombre() {
        return $this->nombre;
    }
    function getPrecio() {
        return $this->precio;
    }
    function getDescripcion() {
        return $this->descripcion;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    function setPrecio($precio) {
        $this->precio = $precio;
    }
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

}