<?php

namespace models;

use database\database;

class registropelicula
{
    private $nombrepelicula;
    private $fechaestreno;
    private $duracion;
    private $sinopsis;
    private $imagen;
    private $estadoalquiler;
    private $estadoreserva;
    private $fecharegistro;
    private $creado;
    private $categoria;
    private $codigo;


    public function setNombrePelicula($nombrepelicula)
    {
        $this->nombrepelicula=$nombrepelicula;
    }

    public function getNombrePelicula()
    {
        return ($this->nombrepelicula);
    }
    
    public function setFechaEstreno($fechaestreno)
    {
        $this->fechaestreno=$fechaestreno;
    }

    public function getFechaEstreno()
    {
        return ($this->fechaestreno);
    }

    public function setDuracion($duracion)
    {
        $this->duracion=$duracion;
    }

    public function getDuracion()
    {
        return ($this->duracion);
    }

    public function setSinopsis($sinopsis)
    {
        $this->sinopsis=$sinopsis;
    }

    public function getSinopsis()
    {
        return ($this->sinopsis);
    }

    public function setImagen($imagen)
    {
        $this->imagen=$imagen;
    }

    public function getImagen()
    {
        return ($this->imagen);
    }

    public function setEstadoAlquiler($estadoalquiler)
    {
        $this->estadoalquiler=$estadoalquiler;
    }

    public function getEstadoAlquiler()
    {
        return ($this->estadoalquiler);
    }

    public function setEstadoReserva($estadoreserva)
    {
        $this->estadoreserva=$estadoreserva;
    }

    public function getEstadoReserva()
    {
        return ($this->estadoreserva);
    }

    public function setFechaRegistro($fecharegistro)
    {
        $this->fecharegistro=$fecharegistro;
    }

    public function getFechaRegistro()
    {
        return ($this->fecharegistro);
    }

    public function setCreado($creado)
    {
        $this->creado=$creado;
    }

    public function getCreado()
    {
        return ($this->creado);
    }

    public function setCategoria($categoria)
    {
        $this->categoria=$categoria;
    }

    public function getCategoria()
    {
        return ($this->categoria);
    }


    public function setCodigo($codigo)
    {
        $this->codigo=$codigo;
    }

    public function getCodigo()
    {
        return ($this->codigo);
    }

    public function crearRpelicula($nombrepelicula,$fechaestreno,$duracion,$sinopsis,$imagen,$estadoalquiler,$estadoreserva,$fecharegistro,$creado,$categoria)
    {
        $this->nombrepelicula=$nombrepelicula;
        $this->fechaestreno=$fechaestreno;
        $this->duracion=$duracion;
        $this->sinopsis=$sinopsis;
        $this->imagen=$imagen;
        $this->estadoalquiler=$estadoalquiler;
        $this->estadoreserva=$estadoreserva;
        $this->fecharegistro=$fecharegistro;
        $this->creado=$creado;
        $this->categoria=$categoria;
        $this->codigo=$codigo;
    }

    public function agregarRpelicula()
    {
        
        $database = new database();
        $sql="INSERT INTO vj_peliculas (nombre_pelicula,fecha_estreno,duracion,sinopsis,imagen,estado_alquiler,estado_reserva,fecha_registro,creado_por,vj_categorias_id_categoria) VALUES ('$this->nombrepelicula','$this->fechaestreno','$this->duracion','$this->sinopsis','$this->imagen','$this->estadoalquiler','$this->estadoreserva','$this->fecharegistro','$this->creado','$this->categoria')";
        $resultado = $database->query($sql);
        $database->close();
        return $resultado;
    }

    public function consultarRpelicula()
    {
        $database = new database();
        $sql="select * from vj_peliculas";
        $resultado = $database->query($sql);
        while($registros = $database->assoc($resultado))
        {
            
            echo "
                <tr>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[nombre_pelicula]</td>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[fecha_estreno]</td>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[duracion]</td>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[sinopsis]</td>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[imagen]</td>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[estado_alquiler]</td>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[estado_reserva]</td>
                    <td style =' border: 1px solid #dadada; margin: 7px; padding: 3px;'>$registros[vj_categorias_id_categoria]</td>
                    <td style=' border: 1px solid #dadada; padding: 8px;'>";
                    echo "<a href=' ",BASE_URL,"?view=eliminapelicula&id_peliculas=$registros[id_peliculas]'><img src='./assets/images/delete.png' style ='margin: 7px;'> </a>";
                    echo "<a href=' ",BASE_URL,"?view=editapelicula&id_peliculas=$registros[id_peliculas]'><img src='./assets/images/update.png' style ='margin: 7px;' > </td>
                </tr>
                ";
        }
        $database->close();
        return $resultado;
    }

    public function editaRpelicula($codigo,$nombrepelicula,$fechaestreno,$duracion,$sinopsis,$imagen,$estadoalquiler,$estadoreserva,$fecharegistro,$creado,$categorias)
    {
        
        $database = new database();
        $sql = "UPDATE vj_peliculas SET nombre_pelicula ='$nombrepelicula', fecha_estreno = '$fechaestreno', duracion = '$duracion', sinopsis = '$sinopsis', imagen = '$imagen', estado_alquiler = '$estadoalquiler', estado_reserva ='$estadoreserva', fecha_registro ='$fecharegistro', creado_por = '$creado', vj_categorias_id_categoria = '$categorias' WHERE id_peliculas = '$codigo'";
        $resultado = $database->query($sql);
        $database->close();
        return $resultado;
    }

    public function editaPeliculaId($codigo)
    {
        $database = new database();
        $sql = "SELECT * FROM vj_peliculas vjp JOIN vj_categorias vjc ON vjp.vj_categorias_id_categoria = vjc.id_categoria WHERE id_peliculas = '$codigo'";
        $resultado = $database->query($sql);
        $database->close();
        return $database->assoc($resultado);
    }

    

    public function eliminaRpelicula($codigo)
    {
        $database = new database();
        $sql = "DELETE FROM vj_peliculas WHERE id_peliculas = '$codigo'";
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
            header("Location : " . BASE_URL . '?view=registrope&empty=1');

        return $status;
    }
}