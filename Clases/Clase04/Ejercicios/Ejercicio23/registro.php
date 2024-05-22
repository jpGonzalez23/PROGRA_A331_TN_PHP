<?php

include_once("./clase/usuario.php");

// Verificar si se recibieron los datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibieron los datos necesarios
    if (isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"]) && isset($_FILES["imagen"])) {
        // Obtener los datos del usuario desde el formulario
        $nombre = $_POST["nombre"];
        $clave = $_POST["clave"];
        $mail = $_POST["mail"];
        $imagen = $_FILES["imagen"];

        // Crear un ID autoincremental emulado (random de 1 a 10.000)
        $id = rand(1, 10000);

        // Obtener la fecha de registro
        $fechaRegistro = date("Y-m-d H:i:s");

        // Crear un objeto Usuario con los datos recibidos
        $usuario = new Usuario($id, $nombre, $clave, $mail, $fechaRegistro);

        // Subir la imagen al servidor
        $targetDir = "Usuario/Fotos/";
        $targetFile = $targetDir . basename($imagen["name"]);
        if (move_uploaded_file($imagen["tmp_name"], $targetFile)) {
            // Agregar la ruta de la imagen al usuario
            //$usuario->setImagen($targetFile);

            // Intentar hacer el alta y guardar los datos en usuarios.json
            if ($usuario->altaUsuarioJSON("usuarios.json")) {
                echo "El usuario se agregó correctamente.";
            } else {
                echo "No se pudo agregar el usuario.";
            }
        } else {
            echo "Error al subir la imagen.";
        }
    } else {
        echo "Error: Todos los campos son requeridos.";
    }
} else {
    echo "Error: Método de solicitud incorrecto.";
}