<?php
/**
 * Description of PeliculaBLL
 *
 * @author ANDREA_ORTIZ
 */
class PeliculaBLL {
    public function insert($nombre, $precio, $descripcion) {
        $objConexion = new Connection();
        $objConexion->queryWithParams("INSERT INTO tbl_peliculas(nombre,precio,descripcion)
                 VALUES (:pNombre, :pPrecio, :pDescripcion)", array(
            ":pNombre" => $nombre,
            ":pPrecio" => $precio,
            ":pDescripcion" => $descripcion,
        ));
    }
    public function update($nombre, $precio, $descripcion, $id) {
        $objConexion = new Connection();
        $objConexion->queryWithParams("UPDATE tbl_peliculas SET 
                nombre = :pNombre,
                precio = :pPrecio,
                descripcion = :pDescripcion
                WHERE 
                id = :pId", array(
            ":pNombre" => $nombre,
            ":pPrecio" => $precio,
            "pDescripcion" => $descripcion,
            ":pId" => $id
        ));
    }
    public function delete($id) {
        $objConexion = new Connection();
        $objConexion->queryWithParams("
                DELETE From tbl_peliculas 
                WHERE id = :pId", array(
            ":pId" => $id
        ));
    }
    public function selectAll() {
        $listaJuegos = array();
        $objConexion = new Connection();
        $res = $objConexion->query("
                SELECT id,nombre,precio,descripcion 
                FROM tbl_peliculas");
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $objJuego = $this->rowToDto($row);
            $listaJuegos[] = $objJuego;
        }
        return $listaJuegos;
    }
    public function select($id) {
        $objConexion = new Connection();
        $res = $objConexion->queryWithParams("
                SELECT id,nombre,precio,descripcion
                FROM tbl_peliculas
                WHERE id = :pId", array(
            ":pId" => $id
        ));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        return $this->rowToDto($row);
    }
    function rowToDto($row) {
        $objJuego = new Pelicula();
        $objJuego->setId($row["id"]);
        $objJuego->setNombre($row["nombre"]);
        $objJuego->setPrecio($row["precio"]);
        $objJuego->setDescripcion($row["descripcion"]);
        return $objJuego;
    }
}