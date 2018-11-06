<?php

namespace controllers;

use \controllers\views;
use \controllers\request;
use \models\peliculas;
use \models\clientes;
use \models\usuarios;
use \models\empleado;
use \models\usuarioempleado;
use \models\registropelicula;
use \models\categorias;

class loadpage
{
    static function load()
    {
        switch(request::queryString('view'))
        {
            case '':
                self::header();
                self::body();
                self::footer();
            break;

            case 'entrar':
                self::header();
                views::addView('web/components/login');
                self::footer();
            break;

            case 'registrar':
                self::header();
                views::addView('web/components/registrar');
                self::footer();
            break;

            case 'registro':
                self::header();
                views::addView('app/components/RegistroEmpleado');
                self::footer();
            break;
            
            case 'registrope':
                self::header();
                views::addView('app/components/RegistroPelicula');
                self::footer();
            break;

            case 'registroca':
                self::header();
                views::addView('app/components/Categoria');
                self::footer();
            break;

            case 'panel':
                self::header();
                views::addView('app/components/Panel');
                self::footer();
            break;

            case 'entrarp':
                self::header();
                views::addView('app/components/LoginEmpleado');
                self::footer();
            break;

            case 'report':
                self::header();
                views::addView('app/components/ReportePeliculas');
                self::footer();
            break;

            case 'creacliente':
                if(request::isPost())
                {
                    $cliente = new clientes();

                    if(!$cliente->isNotEmpty($_POST))
                    {
                        if($_POST['contrasena'] != $_POST['confirmarcontrasena'])
                            header("Location : " . BASE_URL . '?view=registrar&pass=0');
                        else
                        {
                            $cliente->setDocumento($_POST['documento']);
                            $cliente->setNombres($_POST['nombres']);
                            $cliente->setApellidos($_POST['apellidos']);
                            $cliente->setDireccion($_POST['direccion']);
                            $cliente->setCorreo($_POST['correo']);
                            $cliente->setTelefono($_POST['telefono']);
                            
                            if($cliente->agregarCliente() > 0)
                            {
                                usuarios::agregaUsuario($_POST['documento'], $_POST['contrasena']);
                                header("Location : " . BASE_URL . '?view=registrar&success=1');
                            }
                        }
                    }
                }
            break;

            

            case 'creaempleado':
                if(request::isPost())
                {
                    $empleado = new empleado();
                    
                    if(!$empleado->isNotEmpty($_POST))
                    {
                        if($_POST['contrasena'] != $_POST['confirmarcontrasena'])
                            header("Location : " . BASE_URL . '?view=registro&pass=0');
                        else
                        {
                            $empleado->setDocumento($_POST['documento']);
                            $empleado->setNombres($_POST['nombres']);
                            $empleado->setApellidos($_POST['apellidos']);
                            $empleado->setDireccion($_POST['direccion']);
                            $empleado->setTelefono($_POST['telefono']);
                            $empleado->setCargo($_POST['cargo']);
                            $empleado->setRol($_POST['rol']);
                            
                            if($empleado->agregarEmpleado() > 0)
                            {
                                usuarioempleado::agregaEmpleado($_POST['documento'], $_POST['contrasena']);
                                header("Location : " . BASE_URL . '?view=registro&success=1');
                            }
                        }
                    }
                }
            break;
            
            case 'creapelicula':
            if(request::isPost())
            {
                $registropelicula = new registropelicula();

                if(!$registropelicula->isNotEmpty($_POST))
                {
                    
                        $registropelicula->setNombrePelicula($_POST['nombrepelicula']);
                        $registropelicula->setFechaEstreno($_POST['fechaestreno']);
                        $registropelicula->setDuracion($_POST['duracion']);
                        $registropelicula->setSinopsis($_POST['sinopsis']);
                        $registropelicula->setImagen($_POST['imagen']);
                        $registropelicula->setEstadoAlquiler($_POST['estadoalquiler']);
                        $registropelicula->setEstadpReserva($_POST['estadoreserva']);
                        $registropelicula->setFechaRegistro($_POST['fecharegistro']);
                        $registropelicula->setCreado($_POST['creado']);
                        $registropelicula->setCategoria($_POST['categoria']);

                        if($registropelicula->agregarRpelicula() > 0)
                        {
                            header("Location : " . BASE_URL . '?view=registrope&success=1');
                        }
                    
                }
            }
        break;


        case 'creacategoria':
            if(request::isPost())
            {
                $categoria = new categorias();

                if(!$categoria->isNotEmpty($_POST))
                {
                    
                        $categoria->setNombreCategoria($_POST['nombrecategoria']);
                        $categoria->setFechaCreacion($_POST['fechacreacion']);
                        $categoria->setCreado($_POST['creado']);
                        
                        if($categoria->agregarCategoria() > 0)
                        {
                            header("Location : " . BASE_URL . '?view=registroca&success=1');
                        }
                    
                }
            }
        break;


        /////////////////////////////////////////////

        case 'eliminacategoria':
        
        if(request::isGet())
        {
            echo "paso1 --> ".$_GET['id_categoria'];
           $categoria = new categorias();
            
            
            if(!$categoria->isNotEmpty($_GET))
            {
                
                   
                  //  $categoria->setCodigo($_GET['id_categoria']);
                    echo "paso2";
                    
                    if($categoria->eliminaCategoria($_GET['id_categoria']) > 0)
                    {
                       header("Location : " . BASE_URL . '?view=registroca&success=1');
                    }
                
            }
        }
    break;

        //////////////////////////////////////////////////

            default:
                echo 'Vista no encontrada';
            break;
        }        
    }

    static function header()
    {
        views::addHeader('web/header');
    }

    static function body()
    {
        if(request::queryString('movie'))
        {
            $peliculas = new peliculas();
            $data = $peliculas->detailsMovie(request::queryString('movie'));

            views::addView('web/components/details', $data, $peliculas);
        }
        else if(request::queryString('alquilar') == '0')
            header('Location :' . BASE_URL . '?view=entrar');
        else
            views::addView('web/container');
    }

    static function footer()
    {
        views::addFooter('web/footer');
    }
}