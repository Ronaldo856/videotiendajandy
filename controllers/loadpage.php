<?php

namespace controllers;

use \controllers\views;

class loadpage
{
    static function header()
    {
        views::addHeader('web/header');
    }
}