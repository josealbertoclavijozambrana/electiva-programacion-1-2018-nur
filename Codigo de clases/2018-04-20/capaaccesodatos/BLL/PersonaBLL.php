<?php

/**
 * Description of PersonaBLL
 *
 * @author jmacb
 */
class PersonaBLL {

    private $tableName = "persona";

    public function selectAll() {
        $listaPersonas = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("
            SELECT id, nombres, apellidos, ciudad, edad, fechaNacimiento
            FROM $this->tableName");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objPersona = $this->rowToDto($row);
                $listaPersonas[] = $objPersona;
            }
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
        return $listaPersonas;
    }

    public function selectById($id) {
        $objPersona = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("
                SELECT id, nombres, apellidos, ciudad, edad, fechaNacimiento
                FROM $this->tableName
                WHERE id = :varId", array(":varId" => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objPersona = $this->rowToDto($row);
            }
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
        return $objPersona;
    }

    public function insert($nombres, $apellidos, $ciudad, $edad, $fechaNacimiento) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                INSERT INTO $this->tableName (nombres, apellidos, ciudad, edad, fechaNacimiento)
                VALUES (:varNombres, :varApellidos, :varCiudad, :varEdad, :varFechaNacimiento)"
                    , array(
                ":varNombres" => $nombres,
                ":varApellidos" => $apellidos,
                ":varCiudad" => $ciudad,
                ":varEdad" => $edad,
                ":varFechaNacimiento" => $fechaNacimiento
            ));
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
    }

    public function update($nombres, $apellidos, $ciudad, $edad, $fechaNacimiento, $id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                UPDATE INTO $this->tableName
                SET
                    nombres = :varNombres,
                    apellidos = :varApellidos,
                    ciudad = :varCiudad,
                    edad = :varEdad,
                    fechaNacimiento = :varFechaNacimiento
                WHERE
                    id = :varId"
                    , array(
                ":varNombres" => $nombres,
                ":varApellidos" => $apellidos,
                ":varCiudad" => $ciudad,
                ":varEdad" => $edad,
                ":varFechaNacimiento" => $fechaNacimiento,
                ":varId" => $id
            ));
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
    }

    public function delete($id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                DELETE FROM $this->tableName
                WHERE id = :varId"
                    , array(
                ":varId" => $id
            ));
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
    }

    function rowToDto($row) {
        $objPersona = new Persona();
        $objPersona->setNombres($row["nombres"]);
        $objPersona->setApellidos($row["apellidos"]);
        $objPersona->setCiudad($row["ciudad"]);
        $objPersona->setEdad($row["edad"]);
        $objPersona->setFechaNacimiento($row["fechaNacimiento"]);
        $objPersona->setId($row["id"]);
        return $objPersona;
    }

}
