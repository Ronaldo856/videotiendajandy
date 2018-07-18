<?php

namespace core;

use controllers\loadpage;

class core 
{
    public static function EntryPoint()
    {
        loadpage::load();
    }
}

core::EntryPoint();