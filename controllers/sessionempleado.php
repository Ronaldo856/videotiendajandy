<?php

namespace controllers;

class sessionempleado
{
    static function sessionExiste()
    {
        return (isset($_SESSION['empleado'])) ? '1' : '0';
    }
}