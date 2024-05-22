<?php
session_start();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        if (isset($_POST['nombre']) && isset($_POST['apellido']))
        {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $_SESSION["usuario"]=array("nombre"=>$nombre,"apellido"=>$apellido);
            echo "sesion iniciada";
        }
        else
        {
            echo "nombre y apellido necesarios";
        }
        break;
    case "GET":
            
        if(isset($_SESSION["usuario"]))
        {
            $usuario = $_SESSION["usuario"];
            echo "Bienvenido ".$usuario["nombre"];
        }
        else{

            echo "Session no iniciada";
        }
        break;

    case "DELETE":
        session_destroy();
        echo "Session destruida";
        break;
}

