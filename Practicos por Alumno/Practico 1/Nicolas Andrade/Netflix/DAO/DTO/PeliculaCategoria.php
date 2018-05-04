<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 21/4/2018
 * Time: 01:07
 */

class PeliculaCategoria
{
    public $pelicula_id;
    public $categoria_id;

    /**
     * @return mixed
     */
    public function getPeliculaId()
    {
        return $this->pelicula_id;
    }

    /**
     * @param mixed $pelicula_id
     */
    public function setPeliculaId($pelicula_id)
    {
        $this->pelicula_id = $pelicula_id;
    }

    /**
     * @return mixed
     */
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    /**
     * @param mixed $categoria_id
     */
    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }
}