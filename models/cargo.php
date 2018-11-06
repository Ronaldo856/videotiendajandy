<?php

namespace models;

use database\database;

class cargo
{
    static function agregaCargo()
    {
        $database = new database();
        $folders = $database->query("select id_cargo, nombre_cargo from vj_cargos");
        
        while($rows = $database->assoc($folders))
            echo "<option value=".$rows['id_cargo'].">".$rows['nombre_cargo']."</option>";
    }

    static function agregaRol()
    {
        $database = new database();
        $folders = $database->query("select id_rol, nombre_rol from vj_roles");
        
        while($rows = $database->assoc($folders))
            echo "<option value=".$rows['id_rol'].">".$rows['nombre_rol']."</option>";
    }

    static function agregaCategoria()
    {
        $database = new database();
        $folders = $database->query("select id_categoria, nombre_categoria from vj_categorias");
        
        while($rows = $database->assoc($folders))
            echo "<option value=".$rows['id_categoria'].">".$rows['nombre_categoria']."</option>";
    }
}


