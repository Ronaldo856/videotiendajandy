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
        return mysqli_connect($this->server, $this->user, $this->pass, $this->database);
    }

    public function close()
    {
        return mysqli_close($this->open());
    }
}