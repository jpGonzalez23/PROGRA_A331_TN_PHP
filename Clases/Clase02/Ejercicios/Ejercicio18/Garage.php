<?php
include_once "./Auto.php";

class Garage {
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos = [];

    public function __construct($razonSocial, $precioPorHora = 0) {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
    }

    public function MostrarGarage() {
        echo "Razón Social: " . $this->_razonSocial . "<br>";
        echo "Precio por Hora: " . $this->_precioPorHora . "<br>";
        foreach ($this->_autos as $autos) {
            Auto::MostrarAuto($autos);
            echo "<br>";
        }
    }

    public function Equals($auto) { 
        foreach ($this->_autos as $autoGaraje) {
            if($autoGaraje->Equals($auto)) {
                return true;
            }
        }
        return false;
    }

    public function Add($auto) {
        if (!$this->Equals($auto)) {
            $this->_autos[] = $auto;
            return true;
        }
        else {
            echo "El auto ya se encutra en el garaje.<br>";
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

}