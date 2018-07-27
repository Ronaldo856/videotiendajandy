<?php

namespace controllers;

use \controllers\views;

class loadpage
{
    static function load()
    {
        self::header();
        self::body();
        self::footer();
    }

    static function header()
    {
        views::addHeader('web/header');
    }

    static function body()
    {
        views::addView('web/container');
    }

    static function footer()
    {
        views::addFooter('web/footer');
    }
}