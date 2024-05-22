<?php 

class Usuario {

    // Declaración de variables
    protected $nombre;
    protected $apellido;
    private $dni;
    public $edad;

    // Constructor
    public function __construct($nombre, $apellido, $dni = 0, $edad = 0) { 
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->edad = $edad;
    }

    // Métodos
    public function Motrar() { 
        return "Nombre: " . $this->nombre . " Apellido: " . $this->apellido;
    }

    public function ActualizarDni($dni) {
        $this->dni = $dni;
    }

}


