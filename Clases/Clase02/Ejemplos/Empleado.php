<?php

include_once "./Usuario.php";

class Empleado extends Usuario {
    private $sueldo;

    public function __construct($nombre, $apellido, $dni = 0, $edad = 0, $sueldo = 0) { 
        parent::__construct($nombre, $apellido, $dni, $edad);
        $this->sueldo = $sueldo;
    }

    public static function MostrarEstatico($empleado) {
        return $empleado->Motrar() . ". Sueldo: " . $empleado->sueldo;
    }
}