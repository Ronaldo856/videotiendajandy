<?php

namespace controllers;

class request
{
    public static function isGet()
    {
        return GET;
    }

    public static function queryString($string)
    {
        if(isset($_GET[$string]))
            return $_GET[$string];
    }
}