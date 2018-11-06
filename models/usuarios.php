<?php

namespace models;

use database\database;

class usuarios
{
    static function agregaUsuario($idcliente, $pass)
    {
        $database = new database();
        $sql = "INSERT INTO vj_login_cliente (id_login, user_cliente, pass_cliente, vj_clientes_id_cliente, vj_roles_id_rol) VALUES ('0', '$idcliente', '$pass', '$idcliente', '4')";
        $resultado = $database->query($sql);

        return $resultado;
    }
}