<?php

namespace controllers;

use \controllers\views;
use \controllers\request;
use \models\peliculas;

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
        if(request::queryString('movie'))
        {
            $peliculas = new peliculas();
            $data = $peliculas->detailsMovie(request::queryString('movie'));

            views::addView('web/components/details', $data, $peliculas);
        }
        else if(request::queryString('alquilar') == '0')
            header('Location :' . BASE_URL . '?session=0');
        else
            views::addView('web/container');
    }

    static function footer()
    {
        views::addFooter('web/footer');
    }
}