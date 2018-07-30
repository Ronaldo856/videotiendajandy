<?php

namespace models;

use database\dataBase;

class peliculas extends dataBase
{
    public function listMovies()
    {
        $output = array();
        $resource = $this->query("select id_peliculas, nombre_pelicula, fecha_estreno, imagen, estado_alquiler, estado_reserva from vj_peliculas");

        if($this->rows($resource))
            exit('no movies');
        else
            while($rows = $this->assoc($resource))
                $output[] = $rows;

        return $output;
    }

    public function detailsMovie($id)
    {
        $resource = $this->query("select * from vj_peliculas vp join vj_categorias vc ON vp.vj_categorias_id_categoria = vc.id_categoria where vp.id_peliculas = '". $id ."' limit 1");

        if($this->rows($resource))
            echo 'not found movie';
        else
            $row = $this->assoc($resource);

        return $row;
    }

    public function isAvaliable($status)
    {
        return ($status === '0') ? '<i class="fa fa-check-circle"></i> Disponible' : '<i class="fa fa-times-circle"></i> Alquilada';
    }

    public function getMovieByName($name)
    {
        echo $name;
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