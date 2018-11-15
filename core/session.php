<?php

namespace core;

class Session
{
    static function sessionExist()
    {
        if(count($_SESSION) <= 0)
            header("Location : " . BASE_URL . '?view=entrarp');
    }
}