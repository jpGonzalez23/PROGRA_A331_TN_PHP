<?php

class Usuario {
    private $_nombre;
    private $_mail;
    private $_clave;

    public function __construct($nombre, $mail, $clave) { 
        $this->_nombre = $nombre;
        $this->_mail = $mail;
        $this->_clave = $clave;
    }

    public function GuardarUsuario (){
        $data = [
            $this->_nombre,
            $this->_mail,
            $this->_clave            
        ];

        $file = fopen('./usuario.csv', 'a');

        if ($file !== false) {
            fputcsv($file, $data);
            fclose($file);
            return true;
        }
        else {
            return false;
        }
    }

    public static function LeerUsuarios() {
        $usuario = [];

        if (($handle = fopen("./usuario.csv", "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $usuario[] = new Usuario($data[0], $data[1], $data[2]);
            }
            fclose($handle);
        }
        return $usuario;
        
    }

    public function VerificarUsuario () { 
        $usuarios = self::LeerUsuarios();

        foreach ($usuarios as $u) {
            if ($u->_mail === $this->_mail && $u->_clave === $this->_clave) {
                return true;    
            }
            else {
                return false;
            }
        }
    }
}