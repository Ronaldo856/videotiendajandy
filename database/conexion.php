<?php

namespace database;

class conexion
{
    private $server = SERVER;
    private $user = USER;
    private $pass = PASS;
    private $database = DATABASE;

    public function open()
    {
        $con = mysqli_connect($this->server, $this->user, $this->pass, $this->database);
        mysqli_set_charset($con, "utf8");

        return $con;
    }

    public function close()
    {
        return mysqli_close($this->open());
    }
}