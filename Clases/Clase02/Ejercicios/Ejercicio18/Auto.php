<?php

class Auto {
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($marca, $color, $precio = 0, $fecha = null) {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha instanceof DateTime ? $fecha : new DateTime();
    }

    public function AgregarImpuestos($impuesto) {
        if (is_numeric( $impuesto )) {
            $this->_precio += $impuesto;
        }
    }

    public static function MostrarAuto($auto) {
        echo "Marca: " . $auto->_marca . "<br>";
        echo "Color: " . $auto->_color . "<br>";
        echo "Precio: $" . $auto->_precio . "<br>";
        echo "Fecha: " . $auto->_fecha->format('y-m-d') . "<br>";
    }

    public function Equals($auto) {
        return $this->_marca === $auto->_marca;
    }

    public static function Add($auto1, $auto2) {
        if ($auto1->Equals($auto2) && $auto1->_color === $auto2->_color) {
            return $auto1->_precio + $auto2->_precio;
        } else {
            return 0;
        }
    }

}