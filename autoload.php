<?php

spl_autoload_register(function($class)
{
    $clases = str_replace("\\", "/", $class);
    $file = APP_PATH . "/$clases.php";

    if(file_exists($file))
        require_once $file;
});