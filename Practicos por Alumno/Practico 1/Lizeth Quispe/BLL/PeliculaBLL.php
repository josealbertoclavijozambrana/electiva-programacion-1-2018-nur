<?php

class PeliculaBLL {
        private $tabla = "tbl_pelicula";
    
    public function selectAll(){
        $listaPeliculas = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query(
                    "SELECT Id_pelicula, titulo_pelicula, subtitulo_pelicula, descripcion_pelicula, emision, duracion, posters, portada,logo, rango
                    FROM $this->tabla");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objPelicula = $this->rowToDto($row);
                $listaPeliculas[] = $objPelicula;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $listaPeliculas;
    }


    public function selectById($id) {
        $objPelicula = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("
                SELECT Id_pelicula, titulo_pelicula, subtitulo_pelicula, descripcion_pelicula, emision, duracion, posters, portada, logo, rango
                FROM $this->tabla
                WHERE id = :varId", array(":varId" => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objPelicula = $this->rowToDto($row);
            }
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
        return $objPelicula;
    }

    public function insert($titulo, $subtitulo, $descripcion, $emision, $duracion, $posters, $portada, $logo, $rango) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                INSERT INTO $this->tabla( titulo_pelicula, subtitulo_pelicula, descripcion_pelicula, emision, duracion, posters, portada, logo, rango)
                VALUES (:varTitulo, :varSubtitulos, :varDescripcion, :varEmision, :varDuracion, :varPosters, :varPortada,:varLogo, :varRango)"
                    , array(
                ":varTitulo" => $titulo,
                ":varSubtitulos" => $subtitulo,
                ":varDescripcion" => $descripcion,
                ":varEmision" => $emision,
                ":varDuracion" => $duracion,
                ":varPosters" => $posters,
                ":varPortada" => $portada,
                ":varLogo" => $logo,
                ":varRango" => $rango
            ));
                        
        } catch (Exception $e) {
            print_r($e."Este error garrafal");
            //TODO: Aumentar log4php
        }
    }

    public function update($titulo, $subtitulo, $descripcion, $emision, $duracion, $posters, $portada, $logo,$rango, $id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                UPDATE $this->tabla
                SET
                    titulo_pelicula = :varTitulo,
                    subtitulo_pelicula = :varSubtitulo,
                    descripcion_pelicula = :varDescripcion,
                    emision = :varEmision,
                    duracion = :varDuracion,
                    posters = :varPosters,
                    portada = :varPortada,
                    logo = :varLogo,
                    rango = :varRango
                WHERE
                    Id_pelicula = :varId"
                    , array(
                ":varTitulo" => $titulo,
                ":varSubtitulo" => $subtitulo,
                ":varDescripcion" => $descripcion,
                ":varEmision" => $emision,
                ":varDuracion" => $duracion,
                ":varPosters" => $posters,
                ":varPortada" => $portada,
                ":varLogo" => $logo,
                ":varRango" => $rango,
                ":varId" => $id
            ));
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
    }
    
    public function updateImage($poster, $portada, $logo,$id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                UPDATE $this->tabla
                SET
                    posters = :varPoster,
                    portada = :varPortada,
                    logo = :varLogo
                WHERE
                    Id_pelicula = :varId"
                    , array(
                ":varPoster" => $poster,
                ":varPortada" => $portada,
                ":varLogo" => $logo,
                ":varId" => $id
            ));
            echo '_________Hizo los cambios - '.$poster.$logo.$portada.$id;
        } catch (Exception $e) {
            print_r($e." ________Error en Update");
            //TODO: Aumentar log4php
        }
    }
    
    public function obtenerUltimo(){
        
        $objConexion = new Connection();
        $res = $objConexion->query(
                "SELECT MAX(Id_pelicula)"
                ."FROM $this->tabla");
        $row = $res->fetch(PDO::FETCH_NUM);
        //echo 'esto es id'.$row[0];
        $id = $row[0];        
        return $id;
    }

    public function delete($id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                DELETE FROM $this->tableName
                WHERE Id_serie = :varId"
                    , array(
                ":varId" => $id
            ));
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
    }
    
    function rowToDto($row) {
        $objPelicula = new Pelicula();
        $objPelicula->setIdPelicula($row["Id_pelicula"]);
        $objPelicula->setTitulo($row["titulo_pelicula"]);
        $objPelicula->setSubtitulo($row["subtitulo_pelicula"]);
        $objPelicula->setDescripcion($row["descripcion_pelicula"]);
        $objPelicula->setEmision($row["emision"]);
        $objPelicula->setDuracion($row["duracion"]);
        $objPelicula->setPosters($row["posters"]);
        $objPelicula->setPortada($row["portada"]);
        $objPelicula->setLogo($row["logo"]);
        $objPelicula->setRango($row["rango"]);
        return $objPelicula;
    }
    
}