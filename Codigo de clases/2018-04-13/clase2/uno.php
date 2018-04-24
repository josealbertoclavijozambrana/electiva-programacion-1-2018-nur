<?php

class Persona {

    private $id;
    private $nombres;
    private $apellidos;
    private $ciudad;
    private $sexo;
    private $edad;

    function __construct($id, $nombres, $apellidos, $ciudad, $sexo, $edad) {
        $this->id = $id;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->ciudad = $ciudad;
        $this->sexo = $sexo;
        $this->edad = $edad;
    }

    function getId() {
        return $this->id;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getSexoForDisplay() {
        if ($this->sexo == 1) {
            return "Masculino";
        } else {
            return "Femenino";
        }
    }

    function getEdad() {
        return $this->edad;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

}

?>