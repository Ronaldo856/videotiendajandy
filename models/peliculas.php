<?php

namespace models;

use database\dataBase;

class peliculas extends dataBase
{
    public function listMovies()
    {
        $output = array();
        $resource = $this->query("select nombre_pelicula, fecha_estreno, imagen, estado_alquiler estado_reserva from vj_peliculas");

        if($this->rows($resource))
            exit('no movies');
        else
            while($rows = $this->assoc($resource))
                $output[] = $rows;

        return $output;
    }

    public function getMovieByName($name)
    {

    }

    public function getAll()
    {
        return $this->query("select * from vj_peliculas");
    }

    public function getMovieById($id)
    {
        return $this->query("select * from vj_peliculas where id_peliculas = '". $id ."'");
    }
}