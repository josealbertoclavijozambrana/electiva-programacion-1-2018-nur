<?php
/**
 * Description of SerieBLL
 *
 * @author Liz
 */
class SerieBLL {
    private $tabla = "tbl_serie";
    
    public function selectAll(){
        $listaSeries = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query(
                    "SELECT Id_serie, nombre_serie, descripcion_serie, logo_serie, portada_serie, emision, estado, temporadas"
                    ."FROM $this->tabla");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objSerie = $this->rowToDto($row);
                $listaSeries[] = $objSerie;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $listaSeries;
    }


    public function selectById($id) {
        $objSerie = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("
                SELECT Id_serie, nombre_serie, descripcion_serie, logo_serie, portada_serie , emision, estado, temporadas
                FROM $this->tabla
                WHERE id = :varId", array(":varId" => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objSerie = $this->rowToDto($row);
            }
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
        return $objSerie;
    }

    public function insert($nombre, $descripcion, $logo, $portada, $emision, $estado, $temporadas) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                INSERT INTO $this->tabla( nombre_serie, descripcion_serie, logo_serie, portada_serie , emision, estado, temporadas)
                VALUES (:varNombre, :varDescripcion, :varLogo, :varPortada, :varEmision, :varEstado, :varTemporadas)"
                    , array(
                ":varNombre" => $nombre,
                ":varDescripcion" => $descripcion,
                ":varLogo" => $logo,
                ":varPortada" => $portada,
                ":varEmision" => $emision,
                ":varEstado" => $estado,
                ":varTemporadas" => $temporadas
            ));
                        
        } catch (Exception $e) {
            print_r($e."Este error garrafal");
            //TODO: Aumentar log4php
        }
    }

    public function update($nombre, $descripcion, $logo, $portada, $emision, $estado, $temporadas,$id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                UPDATE $this->tabla
                SET
                    nombre_serie = :varNombre,
                    descripcion_serie = :varDescripcion,
                    logo_serie = :varLogo,
                    portada_serie = :varPortada,
                    emision = :varEmision,
                    estado = :varEstado,
                    temporadas = :varTemporadas
                WHERE
                    Id_serie = :varId"
                    , array(
                ":varNombre" => $nombre,
                ":varDescripcion" => $descripcion,
                ":varLogo" => $logo,
                ":varPortada" => $portada,
                ":varId" => $id,
                ":varEmision" => $emision,
                ":varEstado" => $estado,
                ":varTemporadas" => $temporadas
            ));
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
    }
    
    public function updateImage($logo, $portada, $id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                UPDATE $this->tabla
                SET
                    logo_serie = :varLogo,
                    portada_serie = :varPortada
                WHERE
                    Id_serie = :varId"
                    , array(
                ":varLogo" => $logo,
                ":varPortada" => $portada,
                ":varId" => $id
            ));
            echo '_________Hizo los cambios - '.$logo.$portada.$id;
        } catch (Exception $e) {
            print_r($e." ________Error en Update");
            //TODO: Aumentar log4php
        }
    }
    
    public function obtenerUltimo(){
        
        $objConexion = new Connection();
        $res = $objConexion->query(
                "SELECT MAX(Id_serie)"
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
        $objSerie = new Serie();
        $objSerie->setSerie($row["Id_serie"]);
        $objSerie->setNombre($row["nombre_serie"]);
        $objSerie->setDescripcion($row["descripcion_serie"]);
        $objSerie->setLogo($row["logo_serie"]);
        $objSerie->setPortada($row["portada_serie"]);
        $objSerie->setEmision($row["emision"]);
        $objSerie->setEstado($row["estado"]);
        $objSerie->setTemporada($row["temporadas"]);
        return $objSerie;
    }
    
}