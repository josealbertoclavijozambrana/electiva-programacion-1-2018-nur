<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 21/4/2018
 * Time: 01:17
 */

class CategoriaBLL
{
    private $tableName = "tblCategorias";

    public function insert($nombre)
    {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            INSERT INTO $this->tableName(nombre) 
            VALUES (:pNombre)", array(
                ":pNombre" => $nombre
            ));
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function update($nombre, $id)
    {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            UPDATE $this->tableName
            SET
                nombre = :pNombre
            WHERE
                codigo_id = :pId", array(
                ":pNombre" => $nombre,
                ":pId" => $id
            ));
        } catch (Exception $e) {
            print_r($e);
        }
    }
}