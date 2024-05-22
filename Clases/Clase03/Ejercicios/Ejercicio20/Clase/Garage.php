<?php

class Garage {
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos = [];

    public function __construct($razonSocial, $precioPorHora = 0) {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
    }

    public function MostrarGarage(){
        echo "Razón Social: " . $this->_razonSocial . "<br>";
        echo "Precio por Hora: $" . $this->_precioPorHora . "<br>";

        foreach ($this->_autos as $autosAMostrar) {
            Auto::MostrarAuto($autosAMostrar);
            echo "<br>";
        }
    }

    public function Equals($auto) {
        foreach ($this->_autos as $autoEnGarage) {
            if ($autoEnGarage->Equals($auto)) { 
                return true;
            }
        }
        return false;
    }

    public function Add($auto) {
        if (!$this->Equals($auto)) { 
            $this->_autos = $auto;
            return true;
        } else {
            echo "El Auto ya se encuentra en el garaje." . "<br>";
            return false;
        }
    }

    public function Remove(Auto $auto) {
        foreach ($this->_autos as $key => $autoGarage) {
            if ($autoGarage->Equals($auto)) {
                unset($this->_autos[$key]);
                echo "Auto removido del garage.<br>";
                return true;
            }
        }
        echo "El auto no se encuentra en el garage.<br>";
        return false;
    }

    public static function GuardarGaraje($garage) {
       $data = [
        $garage->_razonSocial,
        $garage->_precioPorHora
       ];

       $archivo = fopen('garage.csv', 'a');

       $resultado = fputcsv($archivo, $data);

       if ($resultado) {
        echo "Se guardo correctamente" . "<br>";
       } else {
        echo "No se pudo guardar" . PHP_EOL;
       }

       fclose($archivo);
    }

    public static function LeerGarages() {
        $garage = [];

        if (($archivo = fopen("./garage.csv", "r")) !== false) { 
            while(($data = fgetcsv($archivo, 1000, ",")) !== false) {
                $garage[] = new Garage($data[0], $data[1]);
            }
            fclose($archivo);
        }
        return $garage;
    }
}