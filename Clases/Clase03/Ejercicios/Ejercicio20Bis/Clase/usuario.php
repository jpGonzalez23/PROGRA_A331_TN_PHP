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
}