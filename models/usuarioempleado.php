<?php

namespace models;

use database\database;

class usuarioempleado
{
    static function agregaEmpleado($idempleado, $pass)
    {
        $database = new database();
        $sql = "INSERT INTO vj_login_empleado (id_login_empleado, user_emp, pass_emp, vj_roles_id_rol, vj_empleado_id_empleado) VALUES ('0', '$idempleado', '$pass', '$idempleado', '4')";
        $resultado = $database->query($sql);

        return $resultado;
    }
}