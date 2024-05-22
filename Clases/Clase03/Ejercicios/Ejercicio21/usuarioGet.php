<?php
include './clase/usuario.php';

// Verificar si se recibió el parámetro "tipo" por GET
if (isset($_GET["tipo"])) {
    // Obtener el tipo de listado
    $tipo = $_GET["tipo"];

    // Verificar el tipo de listado y cargar los datos correspondientes
    switch ($tipo) {
        case 'usuarios':
            // Cargar los datos de usuarios desde usuarios.csv
            $usuarios = Usuario::LeerUsuarios();
            // Verificar si se encontraron usuarios
            if (!empty($usuarios)) {
                // Mostrar los usuarios en una lista
                echo "<ul>";
                foreach ($usuarios as $usuario) {
                    echo "<li>" . $usuario->_nombre . " - " . $usuario->_mail . "</li>";
                }
                echo "</ul>";
            } else {
                echo "No hay usuarios disponibles.";
            }
            break;
        default:
            echo "El tipo de listado especificado no es válido.";
            break;
    }
} else {
    echo "Error: Falta el parámetro 'tipo' en la solicitud GET.";
}