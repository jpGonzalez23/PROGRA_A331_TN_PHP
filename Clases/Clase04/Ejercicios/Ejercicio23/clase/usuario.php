<?php

class Usuario {
    private $id;
    private $nombre;
    private $mail;
    private $clave;
    private $fecha;
    private $imagen;

    public function __construct($id, $nombre, $mail, $clave, $fecha) { 
        $this->id = $id;
        $this->_nombre = $nombre;
        $this->_mail = $mail;
        $this->_clave = $clave;
        $this->fecha = $fecha;
    }

    public function altaUsuarioJSON($archivo) {
        // Crear el array con los datos del usuario
        $datosUsuario = array(
            'id' => $this->id,
            'nombre' => $this->nombre,
            'clave' => $this->clave,
            'mail' => $this->mail,
            'fechaRegistro' => $this->fecha,
            'imagen' => $this->imagen
        );

        // Obtener los usuarios actuales desde el archivo JSON
        $usuarios = $this->leerUsuarios($archivo);

        // Agregar el nuevo usuario al array
        $usuarios[] = $datosUsuario;

        // Codificar el array como JSON
        $jsonUsuarios = json_encode($usuarios, JSON_PRETTY_PRINT);

        // Guardar el JSON en el archivo
        if (file_put_contents($archivo, $jsonUsuarios)) {
            return true;
        } else {
            return false;
        }
    }

    private function leerUsuarios($archivo) {
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

    // public function VerificarUsuario () { 
    //     $usuarios = self::LeerUsuarios();

    //     foreach ($usuarios as $u) {
    //         if ($u->_mail === $this->_mail && $u->_clave === $this->_clave) {
    //             return true;    
    //         }
    //         else {
    //             return false;
    //         }
    //     }
    // }
}