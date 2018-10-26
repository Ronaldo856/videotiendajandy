<?php

namespace controllers;

use \controllers\views;
use \controllers\request;
use \models\peliculas;

class loadpage
{
    static function load()
    {
        switch(request::queryString('view'))
        {
            case '':
                self::header();
                self::body();
                self::footer();
            break;

            case 'entrar':
                self::header();
                views::addView('web/components/login');
                self::footer();
            break;

            case 'registrar':
                self::header();
                views::addView('web/components/registrar');
                self::footer();
            break;

            default:
                echo 'Vista no encontrada';
            break;
        }        
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
            header('Location :' . BASE_URL . '?view=entrar');
        else
            views::addView('web/container');
    }

    static function footer()
    {
        views::addFooter('web/footer');
    }
}