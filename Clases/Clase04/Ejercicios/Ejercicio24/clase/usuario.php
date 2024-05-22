<?php
// En la clase Usuario.php

class Usuario {
    private $nombre;
    private $mail;
    private $clave;

    public function __construct($nombre, $mail, $clave) {
        $this->nombre = $nombre;
        $this->mail = $mail;
        $this->clave = $clave;
    }

    public function AltaUsuario($archivo){
        // Cargar los usuarios existentes desde usuarios.json
        $usuarios = self::LeerUsuarios("usuarios.json");

        // Agregar el nuevo usuario al array de usuarios
        $usuarios[] = [
            "nombre" => $this->nombre,
            "mail" => $this->mail,
            "clave" => $this->clave
        ];

        // Guardar los datos en usuarios.json
        if (file_put_contents("usuarios.json", json_encode($usuarios, JSON_PRETTY_PRINT))) {
            return true;
        } else {
            return false;
        }
    }

    // Método para leer usuarios desde un archivo JSON
    public static function LeerUsuarios($archivo) {
        if (file_exists($archivo)) {
            $contenido = file_get_contents($archivo);
            $usuarios = json_decode($contenido, true);
            if ($usuarios !== null) {
                return $usuarios;
            } else {
                echo "Error: No se pudo decodificar el archivo JSON.";
                return array();
            }
        } else {
            return array();
        }
    }
}
