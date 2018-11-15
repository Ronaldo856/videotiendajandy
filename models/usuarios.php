<?php

namespace models;

use database\database;

class usuarios
{
    static function initSession($userc, $passc)
    {
        $database = new database();
        $sql = "SELECT user_cliente, pass_cliente FROM vj_login_cliente WHERE user_cliente = '$userc' AND pass_cliente = '$passc' LIMIT 1";        
        $result = $database->query($sql);

        if($result > 0)
            return true;

        return false;
    }

    static function getProfile()
    {
        $database = new database();
        $sql = "SELECT id_login FROM vj_login_cliente WHERE user_cliente = '". $_SESSION['vj:userc']. "'";
        $resultado = $database->query($sql);
        $data = $database->assoc($resultado);

        $sqlemp = "SELECT nombres, apellidos FROM vj_clientes WHERE id_cliente = '".$data['id_login']."'";
        $resultado_emp = $database->query($sqlemp);
        $dataemp = $database->assoc($resultado_emp);        

        return $dataclie['nombres'] . " " . $dataclie['apellidos'];
    }


    static function agregaUsuario($idcliente, $pass)
    {
        $database = new database();
        $sql = "INSERT INTO vj_login_cliente (id_login, user_cliente, pass_cliente, vj_clientes_id_cliente, vj_roles_id_rol) VALUES ('', '$userc', '$passc', '$documento', '$rol')";
        $resultado = $database->query($sql);

        return $resultado;
    }
}