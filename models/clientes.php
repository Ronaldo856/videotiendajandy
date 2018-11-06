<?php

namespace models;

use database\database;

class clientes
{
    private $documento;
    private $nombres;
    private $apellidos;
    private $direccion;
    private $correo;
    private $telefono;

    public function setDocumento($documento)
    {
        $this->documento=$documento;
    }

    public function getDocumento()
    {
        return ($this->documento);
    }
    
    public function setNombres($nombres)
    {
        $this->nombres=$nombres;
    }

    public function getNombres()
    {
        return ($this->nombres);
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos=$apellidos;
    }

    public function getApellidos()
    {
        return ($this->apellidos);
    }

    public function setDireccion($direccion)
    {
        $this->direccion=$direccion;
    }

    public function getDireccion()
    {
        return ($this->direccion);
    }

    public function setCorreo($correo)
    {
        $this->correo=$correo;
    }

    public function getCorreo()
    {
        return ($this->correo);
    }

    public function setTelefono($telefono)
    {
        $this->telefono=$telefono;
    }

    public function getTelefono()
    {
        return ($this->telefono);
    }

    public function crearCliente($documento,$nombres,$apellidos,$direccion,$correo,$telefono)
    {
        $this->documento=$documento;
        $this->nombres=$nombres;
        $this->apellidos=$apellidos;
        $this->direccion=$direccion;
        $this->correo=$correo;
        $this->telefono=$telefono;
    }

    public function agregarCliente()
    {
        $database = new database();
        $sql="INSERT INTO vj_clientes (id_cliente,nombres,apellidos,direccion,correo,telefono) VALUES ('$this->documento','$this->nombres','$this->apellidos','$this->direccion','$this->correo','$this->telefono')";
        $resultado = $database->query($sql);
        $database->close();
        return $resultado;
    }

    public function consultarClientes()
    {
        $database = new database();
        $sql="select * from vj_clientes";
        $resultado = $database->query($sql);
        $database->close();
        return $resultado;
    }

    public function editaCliente($documento, $nombres, $apellidos, $direccion, $correo, $telefono)
    {
        $database = new database();
        $sql = "UPDATE vj_clientes SET id_cliente = '$documento', nombres ='$nombres', apellidos = '$apellidos', direccion = '$direccion', correo = '$correo', telefono = '$telefono' WHERE id_cliente = '$documento'";
        $resultado = $database->query($sql);
        $database->close();
        return $resultado;
    }

    public function eliminaCliente($documento)
    {
        $database = new database();
        $sql = "DELETE FROM vj_clientes WHERE id_cliente = '$documento'";
        $resultado = $database->query($sql);
        $database->close();
        return $resultado;
    }

    public function isNotEmpty($form)
    {
        $status = false;

        foreach($form as $key => $value)        
            if(empty($value))
                $status = true;        

        if($status)
            header("Location : " . BASE_URL . '?view=registrar&empty=1');

        return $status;
    }
}