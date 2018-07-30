<?php

namespace controllers;

class session
{
    static function sessionExist()
    {
        return (isset($_SESSION['cliente'])) ? '1' : '0';
    }
}