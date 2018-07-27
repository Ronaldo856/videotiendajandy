<?php

namespace database;

use database\conexion;

class dataBase extends conexion
{    
    public function query($query)
    {
        return mysqli_query($this->open(), $query);
    }

    public function rows($resource)
    {
        return (mysqli_num_rows($resource) <= 0) ? true : false;
    }

    public function assoc($resource)
    {
        return mysqli_fetch_assoc($resource);
    }

    public function escsql($str)
    {
        return mysqli_real_escape_string($str);
    }
}