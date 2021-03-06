<?php

namespace controllers;

class views
{    
    static function addHeader($template)
    {
        include APP_PATH . "/layouts/" . $template . ".php";
    }

    static function addFooter($template)
    {
        include APP_PATH . "/layouts/" . $template . ".php";
    }

    static function addView($template, $data = array(), $instance = null)
    {
        include APP_PATH . "/views/" . $template . ".php";
    }
}