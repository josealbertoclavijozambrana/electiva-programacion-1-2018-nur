<?php

class SerieGenerosBLL {
    private $tableName = "tbl_serie_generos";

    public function selectAll() {
        $listaSerieGeneros = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("
            SELECT Id_serie_genero, Id_serie, Id_genero
            FROM $this->tableName");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objSerieGeneros = $this->rowToDto($row);
                $listaSerieGeneros[] = $objSerieGeneros;
            }
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
        return $listaSerieGeneros;
    }

    public function selectById($id) {
        $objSerieGeneros = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("
                SELECT Id_serie_genero, Id_serie, Id_genero
                FROM $this->tableName
                WHERE Id_serie_genero = :varId", array(":varId" => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objSerieGeneros = $this->rowToDto($row);
            }
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
        return $objSerieGeneros;
    }

    public function insert($serie, $genero) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                INSERT INTO $this->tableName (Id_serie, Id_genero)
                VALUES (:varSerie, :varGenero)"
                    , array(
                ":varSerie" => $serie,
                ":varGenero" => $genero,
            ));
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
    }

    public function update($serie, $genero,$id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                UPDATE INTO $this->tableName
                SET
                    Id_serie = :varSerie,
                    Id_genero = :varGenero,
                WHERE
                    Id_serie_genero = :varId"
                    , array(
                ":varSerie" => $serie,
                ":varGenero" => $genero,
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
                WHERE Id_serie_genero = :varId"
                    , array(
                ":varId" => $id
            ));
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
    }

    function rowToDto($row) {
        $objSerieGeneros = new SerieGenero();
        $objSerieGeneros->setSerie_genero($row["Id_serie_genero"]);
        $objSerieGeneros->setSerie($row["Id_serie"]);
        $objSerieGeneros->setGenero($row["Id_genero"]);
        return $objSerieGeneros;
    }    
}
