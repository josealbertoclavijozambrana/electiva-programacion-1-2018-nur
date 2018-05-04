<?php

class PeliculaBLL {

    private $tableName = "tblpelicula";

    public function selectAll() {
        $listaPeliculas = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("
            SELECT id, nombre, anho, sinopsis, director, imageURL
            FROM $this->tableName");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objPelicula = $this->rowToDto($row);
                $listaPeliculas[] = $objPelicula;
            }
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer selectAll con tabla $this->tableName", $e);
        }
        return $listaPeliculas;
    }

    public function selectById($id) {
        $objPelicula = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("
                SELECT id, nombre, anho, sinopsis, director, imageURL
                FROM $this->tableName
                WHERE id = :varId", array(":varId" => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objPelicula = $this->rowToDto($row);
            }
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer selectById con tabla $this->tableName", $e);
        }
        return $objPelicula;
    }

    public function insert($nombre, $anho, $sinopsis, $director, $imageURL) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                INSERT INTO $this->tableName (nombre, anho, sinopsis, director, imageURL)
                VALUES (:varNombre, :varAnho, :varSinopsis, :varDirector, :varImageURL)"
                    , array(
                ":varNombre" => $nombre,
                ":varAnho" => $anho,
                ":varSinopsis" => $sinopsis,
                ":varDirector" => $director,
                ":varImageURL" => $imageURL
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer insert con tabla $this->tableName", $e);
        }
    }

    public function update($nombre, $anho, $sinopsis, $director, $imageURL, $id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                UPDATE $this->tableName
                SET
                    nombre = :varNombre,
                    anho = :varAnho,
                    sinopsis = :varSinopsis,
                    director = :varDirector,
                    imageURL = :varImageURL
                WHERE
                    id = :varId"
                    , array(
                ":varNombre" => $nombre,
                ":varAnho" => $anho,
                ":varSinopsis" => $sinopsis,
                ":varDirector" => $director,
                ":varImageURL" => $imageURL,
                ":varId" => $id
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer update con tabla $this->tableName", $e);
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
//            print_r($e);
            $log->error("Error al hacer delete con tabla $this->tableName", $e);
        }
    }

    function rowToDto($row) {
        $objPelicula = new Pelicula();
        $objPelicula->setNombre($row["nombre"]);
        $objPelicula->setAnho($row["anho"]);
        $objPelicula->setSinopsis($row["sinopsis"]);
        $objPelicula->setDirector($row["director"]);
        $objPelicula->setImageURL($row["imageURL"]);
        $objPelicula->setId($row["id"]);
        return $objPelicula;
    }

}
