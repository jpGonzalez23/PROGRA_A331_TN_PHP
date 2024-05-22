<?php

include_once("./Clase/usuario.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST["nombre"]) && isset($_POST["mail"]) && isset($_POST["clave"])){ 
        $nombre = $_POST["nombre"];
        $mail = $_POST["mail"];
        $clave = $_POST["clave"];
        
        $usuario = new Usuario($nombre, $mail, $clave);
    
        if ($usuario->GuardarUsuario()) {
            echo "El usurario se agrego correctamente.";
        }
        else { 
            echo "No se pudo agregar el usuario.";
        }
    } else {
        echo "Parametros incorrectos";
    }
}