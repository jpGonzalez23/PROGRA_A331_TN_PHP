<?php

class Venta {
    private $_id;
    private $_mail;
    private $_sabor;
    private $_tipo;
    private $_cantidad;
    private $_fecha;
    private $_numeroPedido;

    public function __construct($mail, $sabor, $tipo, $cantidad) {
        $this->_mail = $mail;
        $this->_sabor = $sabor;
        $this->_tipo = $tipo;
        $this->_cantidad = $cantidad;
        $this->_id = self::GenerarId();
        $this->_fecha = date('Y-m-d H:i:s');
        $this->_numeroPedido = self::GenerarNumeroPedido();
    }

    private static function GenerarId() {
        $archivo = 'venta_id_counter.txt';

        if(!file_exists($archivo)) {
            file_put_contents($archivo, 1);
            return 1;
        } else {
            $id = (int) file_get_contents($archivo);
            $id++;
            file_put_contents($archivo, $id);
            return $id;
        }
    }

    private static function GenerarNumeroPedido() {
        return rand(1, 1000);
    }

    public static function LeerVentas($archivo) {
        if (file_exists($archivo)) {
            $contenido = file_get_contents($archivo);
            return json_decode($contenido, true);
        }
        return [];
    }

    public function GuardarVenta($ventas, $archivo) {
        $json = json_encode($ventas, JSON_PRETTY_PRINT);
        return file_put_contents($archivo, $json) !== false;
    }

    public function RegistrarVenta($archivo) {
        $ventas = self::LeerVentas($archivo);
        $ventas[] = array(
            '_id' => $this->_id,
            '_mail' => $this->_mail,
            '_sabor' => $this->_sabor,
            '_tipo' => $this->_tipo,
            '_cantidad' => $this->_cantidad,
            '_fecha' => $this->_fecha,
            '_numeroPedido' => $this->_numeroPedido
        );

        return $this->GuardarVenta($ventas, $archivo);
    }

    public function ObtenerNumbreUsuario($mail) {
        $pos = strpos($mail, '@');

        if($pos !== false) {
            return substr($mail, 0, $pos);
        } else {
            return $mail;
        }
    }


    public static function ConsultaVentas($mail, $fecha, $fechaInicio, $fechaFin) {

    }
}