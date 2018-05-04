<?php
/**
 * Description of GeneroBLL
 *
 * @author Liz
 */
class GeneroBLL {
    private $tableName = "tbl_genero";

    public function selectAll() {
        $listaGenero = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("
            SELECT Id_genero, nombre_genero
            FROM $this->tableName");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objGenero = $this->rowToDto($row);
                $listaGenero[] = $objGenero;
            }
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
        return $listaGenero;
    }

    public function selectById($id) {
        $objGenero = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("
                SELECT Id_genero, nombre_genero 
                FROM $this->tableName
                WHERE Id_genero = :varId", array(":varId" => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objGenero = $this->rowToDto($row);
            }
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
        return $objGenero;
    }

    function rowToDto($row) {
        $objGenero = new Genero();
        $objGenero->setGenero($row["Id_genero"]);
        $objGenero->setNombre($row["nombre_genero"]);
        return $objGenero;
    }    
}
