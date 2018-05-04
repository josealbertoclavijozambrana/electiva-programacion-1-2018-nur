<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 21/4/2018
 * Time: 01:17
 */

class PeliculaBLL
{
    private $tableName = "tblPeliculas";

    public function insert($nombre, $descripcion, $duracion, $imagen)
    {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            INSERT INTO $this->tableName(nombre, descripcion, duracion, imagen) 
            VALUES (:pNombre, :pDescripcion, :pDuracion, :pImagen)", array(
                ":pNombre" => $nombre,
                ":pDescripcion" => $descripcion,
                ":pDuracion" => $duracion,
                ":pImagen" => $imagen
            ));
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function update($nombre, $descripcion, $duracion, $imagen, $id)
    {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            UPDATE $this->tableName
            SET
                nombre = :pNombre,
                descripcion = :pDescripcion,
                duracion = :pDuracion,
                imagen = :pImagen
            WHERE
                codigo_id = :pId",
            array(
                ":pNombre" => $nombre,
                ":pDescripcion" => $descripcion,
                ":pDuracion" => $duracion,
                ":pImagen" => $imagen,
                ":pId" => $id
            ));
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function delete($codigo_id)
    {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            DELETE FROM $this->tableName
            WHERE 
                codigo_id = :pId", array(
                ":pId" => $codigo_id
            ));
        } catch (Exception $e) {

        }
    }

    public function sellectAll()
    {
        $listaPeliculas = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("SELECT * FROM $this->tableName");

            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objPelicula = $this->rowToDto($row);
                $listaPeliculas[] = $objPelicula;
            }
        } catch (Exception $e) {
            //TODO: aumentar log4php
            print_r($e);
        }

        return $listaPeliculas;
    }

    public function selectById($codigo_id)
    {
        $objPelicula = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("
            SELECT * 
            FROM $this->tableName
            WHERE 
                codigo_id = :pId", array(
                ":pId" => $codigo_id
            ));

            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objPelicula = $this->rowToDto($row);
            }

        } catch (Exception $e) {
            //TODO: aumentar log4php
            print_t($e);
        }
        return $this->rowToDto($row);
    }

    function rowToDto($row)
    {
        $objPelicula = new Pelicula();

        $objPelicula->setId($row["codigo_id"]);
        $objPelicula->setNombre($row["nombre"]);
        $objPelicula->setDescripcion($row["descripcion"]);
        $objPelicula->setDuracion($row["duracion"]);

        return $objPelicula;
    }
}