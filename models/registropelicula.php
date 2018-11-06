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
        $this->ccategoria=$categoria;
    }

    public function getCategoria()
    {
        return ($this->categoria);
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
    }

    public function agregarRpelicula()
    {
        $database = new database();
        $sql="INSERT INTO vj_peliculas(nombre_pelicula,fecha_estreno,duracion,sinopsis,imagen,estado_alquiler,estado_reserva,fecha_registro,creado_por,vj_categorias_id_categoria) VALUES ('$this->nombrepelicula','$this->fechaestreno','$this->duracion','$this->sinopsis','$this->imagen','$this->estadoalquiler','$this->estadoreserva','$this->fecharegistro','$this->creado','$this->categorias')";
        $resultado = $database->query($sql);
        $database->close();
        return $resultado;
    }

    public function consultarRpelicula()
    {
        $database = new database();
        $sql="select * from vj_peliculas";
        $resultado = $database->query($sql);
        $database->close();
        return $resultado;
    }

    public function editaRpelicula($nombrepelicula,$fechaestreno,$duracion,$sinopsis,$imagen,$estadoalquiler,$estadoreserva,$fecharegistro,$creado,$categorias)
    {
        $database = new database();
        $sql = "UPDATE vj_peliculas SET nombre_pelicula ='$nombrepelicula', fecha_estreno = '$fechaestreno', duracion = '$duracion', sinopsis = '$sinopsis', imagen = '$imagen', estado_alquiler = '$estadoalquiler', estado_reserva ='$estadoreserva', fecha_registro ='$fecharegistro', creado_por = '$creado', vj_categorias_id_categoria = '$categoria' WHERE nombre_pelicula = '$nombrepelicula'";
        $resultado = $database->query($sql);
        $database->close();
        return $resultado;
    }

    public function eliminaRpelicula($nombrepelicula)
    {
        $database = new database();
        $sql = "DELETE FROM vj_peliculas WHERE nombre_pelicula = '$nombrepelicula'";
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