<?php

namespace core;

use controllers\loadpage;

class core 
{
    public static function EntryPoint()
    {
        session_start();
        loadpage::load();
    }
}

core::EntryPoint();