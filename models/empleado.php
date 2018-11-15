<?php

namespace models;

use database\database;

class empleado
{
    private $documento;
    private $nombres;
    private $apellidos;
    private $direccion;
    private $telefono;
    private $cargo;
    private $rol;

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

    public function setTelefono($telefono)
    {
        $this->telefono=$telefono;
    }

    public function getTelefono()
    {
        return ($this->telefono);
    }

    public function setCargo($cargo)
    {
        $this->cargo=$cargo;
    }

    public function getCargo()
    {
        return ($this->cargo);
    }

    public function setRol($rol)
    {
        $this->rol=$rol;
    }

    public function getrol()
    {
        return ($this->rol);
    }

    public function crearEmpleado($documento,$nombres,$apellidos,$direccion,$telefono,$cargo,$rol)
    {
        $this->documento=$documento;
        $this->nombres=$nombres;
        $this->apellidos=$apellidos;
        $this->direccion=$direccion;
        $this->telefono=$telefono;
        $this->cargo=$cargo;
        $this->rol=$rol;
    }

    public function agregarEmpleado()
    {
        $database = new database();
        $sql="INSERT INTO vj_empleado(id_empleado,nombres,apellidos,direccion,telefono,vj_cargos_id_cargo,vj_roles_id_rol) VALUES ('$this->documento','$this->nombres','$this->apellidos','$this->direccion','$this->telefono','$this->cargo','$this->rol')";
        $resultado = $database->query($sql);
        echo $sql;
        $database->close();
        return $resultado;
    }

    public function consultarEmpleados()
    {
        $database = new database();
        $sql="select * from vj_empleado";
        $resultado = $database->query($sql);
        while($registros = $database->assoc($resultado))
        {
            
            echo "
                <tr>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[nombres]</td>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[apellidos]</td>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[direccion]</td>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[telefono]</td>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[vj_cargos_id_cargo]</td>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[vj_roles_id_rol]</td>
                    <td style=' border: 1px solid #dadada; padding: 8px;'>";
                    echo "<a href=' ",BASE_URL,"?view=eliminaempleado&id_empleado=$registros[id_empleado]'><img src='./assets/images/delete.png' style ='margin: 7px;'> </a>";
                    echo "<a href=' ",BASE_URL,"?view=editaempleado&id_empleado=$registros[id_empleado]'><img src='./assets/images/update.png' style ='margin: 7px;' > </td>
                </tr>
                ";
        }
        $database->close();
        return $resultado;
    }

    public function editaEmpleado($documento, $nombres, $apellidos, $direccion, $telefono, $cargo, $rol)
    {
        $database = new database();
        $sql = "UPDATE vj_empleado SET id_empleado = '$documento', nombres ='$nombres', apellidos = '$apellidos', direccion = '$direccion', telefono = '$telefono', vj_cargos_id_cargo = '$cargo', vj_roles_id_rol = '$rol' WHERE id_empleado = '$documento'";
        $resultado = $database->query($sql);
        $database->close();
        return $resultado;
    }


    public function editaEmpleadoId($codigo)
    {
        $database = new database();
        $sql = "SELECT * FROM vj_empleado vjp JOIN vj_cargos vjc ON vjp.vj_cargos_id_cargo = vjc.id_cargo JOIN vj_roles vr ON vjp.vj_roles_id_rol = vr.id_rol WHERE id_empleado = '$codigo'";
        $resultado = $database->query($sql);
        $database->close();
        return $database->assoc($resultado);
    }


    public function eliminaEmpleado($documento)
    {
        $database = new database();
        $sql = "DELETE FROM vj_empleado WHERE id_empleado = '$documento'";
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
            header("Location : " . BASE_URL . '?view=registro&empty=1');

        return $status;
    }
}