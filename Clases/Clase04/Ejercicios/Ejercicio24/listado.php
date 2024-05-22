<?php

include("./clase/usuario.php");

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if(isset($_GET['listado'])) { 
            if(isset($_GET['listado']) == 'usuarios') { 
                $usuarios = Usuario::LeerUsuarios("usuarios.json");
    
                if(!empty($usuarios)) { 
                    echo "<ul>";
                    foreach ($usuarios as $u) {
                        echo "<li>" . $u['nombre'] . " " . $u['mail'] . "</li>";
                    }
                    echo "</ul>";
                }
                else {
                    echo "No hay usuarios para mostar";
                }
            }
            else {
                echo "El listado especificado no es valido";
            }
        }
        else {
            echo "Error: Falta el parametro 'listado'";
        }
        break;

    case 'POST':
        if(isset($_POST['nombre']) && isset($_POST['mail']) && isset($_POST['clave'])) { 
            $nombre = $_POST['nombre'];
            $mail = $_POST['mail'];
            $clave = $_POST['clave'];

            $usuario = new Usuario($nombre, $mail, $clave);

            if($usuario->AltaUsuario($usuario)) { 
                echo "el usuario se agrego correctamente";
            } else {
                echo "no se pudo agregar al usuario";
            }

        }
        break;

    default:
        echo "Metodo incorrecto";
        break;

}
