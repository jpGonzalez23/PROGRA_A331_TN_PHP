<?php
/**
 * Nombre: Gonzalez Juan Pablo
 * Div: A331-1
 */
class Helado {
    private $_id;
    private $_sabor;
    private $_precio;
    private $_tipo;
    private $_vaso;
    private $_stock;

    public function __construct($sabor, $precio, $tipo, $vaso, $stock) {
        $this->_id = self::GerarId();
        $this->_sabor = $sabor;
        $this->_precio = $precio;
        $this->_tipo = $tipo;
        $this->_vaso = $vaso;
        $this->_stock = $stock;
    }

    private static function GerarId(){
        $archivo = 'helados_id_counter.txt';

        if(!file_exists($archivo)) {
            file_put_contents($archivo, 1);
            return 1;
        } else {
            $id = (int)file_get_contents($archivo);
            $id++;
            file_put_contents($archivo, $id);
            return $id;
        }
    }

    public function SetId ($id) {
        if(is_int($id) && $id > 0) {
            $this->_id = $id;
        }
    }
    public function GetId () {
        return $this->_id;
    }

    public function SetSabor ($sabor) {
        if(is_string($sabor) && !empty($sabor)) {
            $this->_sabor = $sabor;
        }
    }

    public function GetSabor () {
        return $this->_sabor;
    }

    public function SetPrecio ($precio) {
        if(is_numeric($precio) && $precio > 0) {
            $this->_precio = $precio;
        }
    }

    public function GetPrecio () {
        return $this->_precio;
    }

    public function SetTipo($tipo) {
        if($tipo == 'Agua' || $tipo == 'Crema') {
            $this->_tipo = $tipo;
        }
    }

    public function GetTipo(){
        return $this->_tipo;
    }

    public function SetVaso($vaso) {
        if($vaso == 'Plastico' || $vaso == 'Cucurucho') {
            $this->_vaso = $vaso;
        }
    }

    public function GetVaso() {
        return $this->_vaso;
    }

    public function SetStock($stock) {
        if(is_numeric($stock) && $stock > 0) {
            $this->_stock = $stock;
        }
    }

    public function GetStock() { 
        return $this->_stock;
    }


    public function AltaHeladeria($archivo, $imagen) {
        $helados = self::LeerHeladeria($archivo);

        foreach($helados as $h) {
            if($h['_sabor'] == $this->GetSabor() && $h['_tipo'] == $this->GetTipo()) {
                $h['_precio'] = $this->_precio;
                $h['_stock'] += $this->_stock;

                $this->GuardarHelado($helados, $archivo);
                $this->GuardarImagen($imagen);
                return "Actualizados";
            }
        }

        $helados[] = array(
            '_id' => $this->GetId(),
            '_sabor' => $this->GetSabor(),
            '_precio' => $this->GetPrecio(),
            '_tipo' => $this->GetTipo(),
            '_vaso' => $this->GetVaso(),
            '_stock' => $this->GetStock() 
        );

        if($this->GuardarHelado($helados,$archivo)){
            $this->GuardarImagen($imagen);
            return "Se Ingreso correctamente";
        }
        else {
            return "No se pudo ingresar";
        }
    }

    public static function GuardarHelado($helados, $archivo) {
        $json = json_encode($helados, JSON_PRETTY_PRINT);
        return file_put_contents($archivo, $json) !== false;
    }

    public function GuardarImagen($imagen) {
        $directorio = './ImagenesDeHelados/2024';

        if(!file_exists($directorio)) {
            mkdir($directorio, 0777, true);
        }

        $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);

        $nombreImagen = $this->GetSabor() . ' - ' . $this->GetTipo() . ' - ' . $extension;

        $rutaImagen = $directorio . $nombreImagen;

        move_uploaded_file($imagen['tmp_name'], $rutaImagen);
    }

    public static function LeerHeladeria($archivo) {
        if (file_exists($archivo)) {
            $contenido = file_get_contents($archivo);
            return json_decode($contenido, true);
        } 

        return [];
    }

    public static function BuscarHelado($sabor, $tipo, $archivo) {
        $helados = self::LeerHeladeria($archivo);

        foreach($helados as $helado) {
            if($helado['_sabor'] == $sabor && $helado['_tipo'] == $tipo) {
                return "El Helado Existe";
            }
        }

        foreach($helados as $helado) {
            if($helado['_sabor'] == $sabor) {
                return "El sabor existe, pero no el tipo";
            }
            if($helado['_tipo'] == $tipo){
                return "El tipo existe, pero no el sabor";
            }
        }

        return "no existe el sabor ni el tipo";
    }

    public static function BuscarStockHelado($sabor, $tipo, $archivo) {
        $helados = self::LeerHeladeria($archivo);

        foreach($helados as $helado) {
            if($helado['_sabor'] == $sabor && $helado['_tipo'] == $tipo) {
                return $helado;
            }
        }

        return null;
    }

    public static function ActualizarStock($sabor, $tipo, $cantidad, $archivo) {
        $helados = self::LeerHeladeria($archivo);

        foreach ($helados as $helado) {
            if ($helado['_sabor'] == $sabor && $helado['_tipo'] == $tipo) {
                if ($helado['_stock'] >= $cantidad) {
                    $helado['_stock'] -= $cantidad;
                    
                    self::GuardarHelado($helados, $archivo);
                    
                    return true;
                }
                return false;
            }
        }
        return false;
    }
}