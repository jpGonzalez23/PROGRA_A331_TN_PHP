<?php

include_once("./clase/usuario.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre"]) && isset($_POST["mail"]) && isset($_POST["clave"])) { 
        $nombre = $_POST["nombre"];
        $mail = $_POST["mail"];
        $clave = $_POST["clave"];

        $usuario = new Usuario($nombre, $mail, $clave);

        if ($usuario->VerificarUsuario()) {
            echo "Verificado";
        }
        else {
            echo "Error en los datos";
        }
    }
    else {
        echo "Error: Todo los campos son requeridos";
    }
}
else {
    echo "Error: Metodo de solicitud incorrecto";
}