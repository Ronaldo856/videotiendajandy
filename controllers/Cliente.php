<?php
class cliente
{
    private $idcliente;
    private $nombres;
    private $apellidos;
    private $direccion;
    private $correo;
    private $telefono;

    public function setDocumento($documento)
    {
        $this->documeto=$documento;
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
        $this->conexion=Conectarse();
        $sql="insert into vj_clientes(id_cliente,nombres,apellidos,direccion,correo,telefono)
        values ('$this->documento','$this->nombres','$this->apellidos','$this->direccion','$this->correo','$this->telefono')";
        $resultado=$this->conexion->query($sql);
        $this->conexion->close();
        return $resultado;
    }

    public function consultarClientes()
    {
        $this->conexion=Conectarse();
        $sql="select * from vj_clientes";
        $resultado=$this->conexion->query($sql);
        $this->conexion->close();
        return $resultado;
    }

    public function editaCliente($documento, $nombres, $apellidos, $direccion, $correo, $telefono, $id_cliente)
    {
        $this->conexion = Conectarse();
        $sql = "UPDATE vj_clientes SET id_cliente = '$documento', nombres ='$nombres', apellidos = '$apellidos', direccion = '$direccion', correo = '$correo', telefono = '$telefono' WHERE id_cliente = '$id_cliente'";
        $resultado = $this->conexion->query($sql);
        $this->conexion->Close();
        return $resultado;
    }

    public function eliminaCliente($id_cliente)
    {
        $this->conexion = Conectarse();
        $sql = "DELETE FROM vj_clientes WHERE id_cliente = '$documento'";
        $resultado = $this->conexion->query($sql);
        $this->conexion->Close();
        return $resultado;
    }






}