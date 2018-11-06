<?php

namespace models;

use database\database;

class categorias
{
    private $nombrecategoria;
    private $fechacreacion;
    private $creado;
    private $codigo;

    public function setNombreCategoria($nombrecategoria)
    {
        $this->nombrecategoria=$nombrecategoria;
    }

    public function getNombreCategoria()
    {
        return ($this->nombrecategoria);
    }
    
    public function setFechaCreacion($fechacreacion)
    {
        $this->fechacreacion=$fechacreacion;
    }

    public function getFechaCreacion()
    {
        return ($this->fechacreacion);
    }

    public function getCreado()
    {
        return ($this->creado);
    }

    public function setCreado($creado)
    {
        $this->creado=$creado;
    }

    public function getCodigo()
    {
        return ($this->codigo);
        
    }

    public function setCodigo($codigo)
    {
        $this->codigo=$codigo;
    }

    
   
   
   
    public function crearCategoria($nombrecategoria,$fechacreacion,$creado)
    {
        $this->nombrecategoria=$nombrecategoria;
        $this->fechacreacion=$fechacreacion;
        $this->creado=$creado;
    }

    public function agregarCategoria()
    {
        $database = new database();
        $sql="INSERT INTO vj_categorias (nombre_categoria,fecha_creacion,creado_por) VALUES ('$this->nombrecategoria','$this->fechacreacion','$this->creado')";
        $resultado = $database->query($sql);
        $database->close();
        return $resultado;
    }

    public function consultarCategorias()
    {
        $database = new database();
        $sql="select * from vj_categorias";
        $resultado = $database->query($sql);
        while($registros = $database->assoc($resultado))
            {
               
                echo "
                    <tr>
                        <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[nombre_categoria]</td>
                        <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[fecha_creacion]</td>
                        <td style=' border: 1px solid #dadada; padding: 8px;'>";
                        echo "<a href=' ",BASE_URL,"?view=eliminacategoria&id_categoria=$registros[id_categoria]'><img src='./assets/images/delete.png' style ='margin: 7px;'> </a>";
                        echo "<img src='./assets/images/update.png' style ='margin: 7px;' > </td>
                    </tr>
                    ";
            }
        $database->close();
        return $resultado;
    }


    public function editaCategoria($nombrecategoria, $fechacreacion, $creado)
    {
        $database = new database();
        $sql = "UPDATE vj_categorias SET nombre_categoria ='$nombrecategoria', fecha_creacion = '$fechacreacion', creado_por = '$creado' WHERE nombre_categoria = '$nombrecategoria'";
        $resultado = $database->query($sql);
        $database->close();
        return $resultado;
    }

    public function eliminaCategoria($codigo)
    {
        echo "otro 1[- $codigo -]";
        $database = new database();
        
        $sql = "DELETE FROM vj_categorias WHERE id_categoria = '$codigo'";
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
            header("Location : " . BASE_URL . '?view=registroca&empty=1');

        return $status;
    }
}