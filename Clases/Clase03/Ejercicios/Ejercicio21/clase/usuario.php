<?php

class Usuario {
    public $_nombre;
    public $_mail;

    private $_clave;

    public function __construct($nombre, $mail, $clave) {
        $this->_nombre = $nombre;
        $this->_mail = $mail;
        $this->_clave = $clave;
    }

    public static function LeerUsuarios() {
        $usuario = [];

        if (($handle = fopen("./usuario.csv", "r")) !== false) {
            while (($data = fgetcsv($handle, 1000,",")) !== false) {
                $usuario[] = new Usuario($data[0], $data[1], $data[2]);
            }
            fclose($handle);
        }

        return $usuario;
    }
}