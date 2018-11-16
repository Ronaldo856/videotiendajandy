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
use \core\Session;

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

            case 'initsession':
                if(request::isPost())
                {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];

                    if(usuarioempleado::initSession($user, $pass))
                    {
                        $_SESSION['vj:user'] = $user;
                        header("Location : " . BASE_URL . "?view=panel");
                    }
                    else
                        header("Location : " . BASE_URL . "?view=entrarp&error=1");
                }
            break; 
            
            case 'initsessionC':
                if(request::isPost())
                    {
                        $userc = $_POST['userc'];
                        $passc = $_POST['passc'];

                        if(usuarios::initSession($userc, $passc))
                        {
                            $_SESSION['vj:userc'] = $userc;
                            header("Location : " . BASE_URL );
                        }
                            else
                            header("Location : " . BASE_URL . "?view=entrar&error=1");
                    }
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
                Session::sessionExist();
                self::header();
                views::addView('app/components/RegistroEmpleado');
                self::footer();
            break;
            
            case 'registrope':
                Session::sessionExist();
                self::header();
                views::addView('app/components/RegistroPelicula');
                self::footer();
            break;

            case 'registroca':
                Session::sessionExist();
                self::header();
                views::addView('app/components/Categoria');
                self::footer();
            break;

            case 'panel':
                Session::sessionExist();
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
                Session::sessionExist();
                self::header();
                views::addView('app/components/ReportePeliculas');
                self::footer();
            break;

            case 'reporte':
                Session::sessionExist();
                self::header();
                views::addView('app/components/ReporteEmpleados');
                self::footer();
            break;
           
            case 'reportca':
                Session::sessionExist();
                self::header();
                views::addView('app/components/ReporteCategorias');
                self::footer();
            break;


            case 'reportcl':
                Session::sessionExist();
                self::header();
                views::addView('app/components/ReporteCliente');
                self::footer();
            break;

            case 'creacliente':
                Session::sessionExist();

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
                                usuarios::agregaUsuario($_POST['documento'], $_POST['contrasena'], $_POST['documento'], 4);
                                header("Location : " . BASE_URL . '?view=registrar&success=1');
                            }
                        }
                    }
                }
            break;

        case 'eliminacliente':
            Session::sessionExist();
            if(request::isGet())
            {                
                $cliente = new clientes();

                if(!$cliente->isNotEmpty($_GET))
                {
                    
        
                    if($cliente->eliminaCliente($_GET['id_cliente']) > 0)
                    {
                        header("Location : " . BASE_URL . '?view=reportcl&success=1');
                    }

                }
            }
        break;

        case 'editacliente':
        
            if(request::isGet())
            {
                $documento = $_GET['id_cliente'];
                $datos = new clientes();

                self::header();
                views::addView('app/components/editaCliente', $datos->editaClienteId($documento));
                self::footer();
            }

        break;

        case 'updatecliente':
                
            $documento = $_REQUEST['id_cliente'];
            $datos = new clientes();
            $resultado= $datos->editaCliente($_REQUEST['documento'], $_REQUEST['nombres'], $_REQUEST['apellidos'], $_REQUEST['direccion'], $_REQUEST['correo'],
            $_REQUEST['telefono']);
                                
            header("Location : " . BASE_URL . '?view=reportcl'); 
                         
        break;

        case 'creaempleado':
            Session::sessionExist();
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
                            usuarioempleado::agregaEmpleado($_POST['documento'], $_POST['nombres'], $_POST['contrasena'], $_POST['rol']);
                            header("Location : " . BASE_URL . '?view=registro&success=1');
                        }
                    }
                }
            }
        break;

        case 'eliminaempleado':
        Session::sessionExist();
                    if(request::isGet())
                        {
                            echo "paso1 --> ".$_GET['id_empleado'];
                            $empleado = new empleado();
        
        
                    if(!$empleado->isNotEmpty($_GET))
                        {
                          
                
                        if($empleado->eliminaEmpleado($_GET['id_empleado']) > 0)
                            {
                                header("Location : " . BASE_URL . '?view=reporte&success=1');
                            }
            
                        }
                    }
        break;

        case 'editaempleado':
        Session::sessionExist();
                if(request::isGet())
                    {
                        $codigo = $_GET['id_empleado'];
                        $datos = new empleado();

                        self::header();
                        views::addView('app/components/editaEmpleado', $datos->editaEmpleadoId($codigo));
                        self::footer();
                    }

        break;


        case 'updateempleado':
                Session::sessionExist();
                $codigo = $_REQUEST['id_empleado'];
                $datos = new empleado();
                $resultado= $datos->editaEmpleado($_REQUEST['documento'], $_REQUEST['nombres'], $_REQUEST['apellidos'], $_REQUEST['direccion'], $_REQUEST['telefono'],
                $_REQUEST['cargo'], $_REQUEST['rol']);
                                    
                header("Location : " . BASE_URL . '?view=reporte'); 
                             
        break;
     

            
        case 'creapelicula':
            Session::sessionExist();
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
                            $registropelicula->setEstadoReserva($_POST['estadoreserva']);
                            $registropelicula->setFechaRegistro($_POST['fecharegistro']);
                            $registropelicula->setCreado($_POST['creado']);
                            $registropelicula->setCategoria($_POST['categoria']);
                        

                            if($registropelicula->agregarRpelicula() > 0)
                                
                                 header("Location : " . BASE_URL . '?view=registrope&success=1');
                                
                    
                        }
                }
        break;

        case 'eliminapelicula':
        Session::sessionExist();
                if(request::isGet())
                    {
        
                        $registropelicula = new registropelicula();
        
        
                        if(!$registropelicula->isNotEmpty($_GET))
                        {
                          
                        
                         if($registropelicula->eliminaRpelicula($_GET['id_peliculas']) > 0)
                            {
                                header("Location : " . BASE_URL . '?view=report&success=1');
                            }
            
                        }
                    }
        break;
    
        case 'editapelicula':
        Session::sessionExist();
                if(request::isGet())
                    {
                        $codigo = $_GET['id_peliculas'];
                        $datos = new registropelicula();

                        self::header();
                        views::addView('app/components/editaPelicula', $datos->editaPeliculaId($codigo));
                        self::footer();
                    }

        break;


        case 'updatepelicula':
        Session::sessionExist();
                $codigo = $_POST['id_peliculas'];
                $datos = new registropelicula();
                $resultado= $datos->editaRpelicula($_REQUEST['codigo'], $_REQUEST['nombrepelicula'], $_REQUEST['fechaestreno'], $_REQUEST['duracion'], $_REQUEST['sinopsis'],
                $_REQUEST['imagen'], $_REQUEST['estadoalquiler'], $_REQUEST['estadoreserva'], $_REQUEST['fecharegistro'], $_REQUEST['creado'], $_REQUEST['categoria']);
                    
                header("Location : " . BASE_URL . '?view=report'); 
                    
        break;


        case 'creacategoria':
        Session::sessionExist();
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
        Session::sessionExist();
                if(request::isGet())
                    {
                        $categoria = new categorias();
            
                            if(!$categoria->isNotEmpty($_GET))
                                {
                                    
                                    if($categoria->eliminaCategoria($_GET['id_categoria']) > 0)
                                        {
                                            header("Location : " . BASE_URL . '?view=reportca&success=1');
                                        }                
                                }
                    }
        break;

        case 'editacategoria':
        Session::sessionExist();
                if(request::isGet())
                    {
                        $codigo = $_GET['id_categoria'];
                        $datos = new categorias();

                        self::header();
                        views::addView('app/components/editaCategoria', $datos->editaCategoriaId($codigo));
                        self::footer();
                    }

        break;
            
        case 'updatecategoria':
        Session::sessionExist();
                $datos = new categorias();
                $resultado= $datos->editaCategoria($_REQUEST['codigo'], $_REQUEST['nombrecategoria'], $_REQUEST['fechacreacion'], $_REQUEST['creado']);
                    
                header("Location : " . BASE_URL . '?view=reportca'); 
                  
        break;

        case 'logout':
            session_destroy();
            header("Location : ". BASE_URL . "?view=entrarp");
        break;
    
        case 'logout1':
            session_destroy();
            header("Location : ". BASE_URL . "?view=entrar");
        break;

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