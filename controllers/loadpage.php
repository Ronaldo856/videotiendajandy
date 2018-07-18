<?php

namespace controllers;

use \controllers\views;

class loadpage
{
    static function load()
    {
        self::header();
        self::container();
        self::footer();
    }

    static function header()
    {
        views::addHeader('web/header');
    }

    static function container()
    {
        views::addView('web/container');
    }

    static function footer()
    {
        views::addFooter('web/footer');
    }
}