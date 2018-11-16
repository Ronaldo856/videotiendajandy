<?php

namespace models;

use database\database;

class usuarioempleado
{
    static function initSession($user, $pass)
    {
        $database = new database();
        $sql = "SELECT user_emp, pass_emp FROM vj_login_empleado WHERE user_emp = '$user' AND pass_emp = '$pass' LIMIT 1";        
        $result = $database->query($sql);

        if(!$database->rows($result))
            return true;

        return false;
    }

    static function getProfile()
    {
        $database = new database();
        $sql = "SELECT id_login_empleado FROM vj_login_empleado WHERE user_emp = '". $_SESSION['vj:user']. "'";
        $resultado = $database->query($sql);
        $data = $database->assoc($resultado);

        $sqlemp = "SELECT nombres, apellidos FROM vj_empleado WHERE id_empleado = '".$data['id_login_empleado']."'";
        $resultado_emp = $database->query($sqlemp);
        $dataemp = $database->assoc($resultado_emp);        

        return $dataemp['nombres'] . " " . $dataemp['apellidos'];
    }

    static function agregaEmpleado($documento, $user, $pass, $rol)
    {
        $database = new database();
        $sql = "INSERT INTO vj_login_empleado (id_login_empleado, user_emp, pass_emp, vj_roles_id_rol, vj_empleado_id_empleado) VALUES ('$documento', '$user', '$pass', '$rol', '$documento')";
        
        $resultado = $database->query($sql);
        
        return $resultado;
    }
}