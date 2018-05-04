<?php

class PeliculaGenerosBLL {
    private $tableName = "tbl_pelicula_generos";

    public function selectAll() {
        $listaPeliculaGeneros = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("
            SELECT Id_pelicula_genero, Id_pelicula, Id_genero
            FROM $this->tableName");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objPeliculaGeneros = $this->rowToDto($row);
                $listaSerieGeneros[] = $objPeliculaGeneros;
            }
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
        return $listaPeliculaGeneros;
    }

    public function selectById($id) {
        $objPeliculaGeneros = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("
                SELECT Id_pelicula_genero, Id_pelicula, Id_genero
                FROM $this->tableName
                WHERE Id_pelicula_genero = :varId", array(":varId" => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objPeliculaGeneros = $this->rowToDto($row);
            }
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
        return $objSerieGeneros;
    }

    public function insert($pelicula, $genero) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                INSERT INTO $this->tableName (Id_pelicula, Id_genero)
                VALUES (:varPelicula, :varGenero)"
                    , array(
                ":varPelicula" => $pelicula,
                ":varGenero" => $genero
            ));
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
    }

    public function update($pelicula, $genero, $id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                UPDATE INTO $this->tableName
                SET
                    Id_pelicula = :varPelicula,
                    Id_genero = :varGenero,
                WHERE
                    Id_pelicula_genero = :varId"
                    , array(
                ":varPelicula" => $pelicula,
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
                WHERE Id_pelicula_genero = :varId"
                    , array(
                ":varId" => $id
            ));
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
    }

    function rowToDto($row) {
        $objPeliculaGeneros = new PeliculaGenero();
        $objPeliculaGeneros->setIdPeliculaGenero_genero($row["Id_pelicula_genero"]);
        $objPeliculaGeneros->setIdPelicula($row["Id_pelicula"]);
        $objPeliculaGeneros->setIdGenero($row["Id_genero"]);
        return $objPeliculaGeneros;
    }
}
