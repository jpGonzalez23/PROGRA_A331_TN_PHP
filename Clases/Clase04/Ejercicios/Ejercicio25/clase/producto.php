<?php

class Producto {
    private $id;
    private $codigoDeBarra;
    private $nombre;
    private $tipo;
    private $stock;
    private $precio;

    public function __construct($id, $codigoDeBarra, $nombre, $tipo, $stock, $precio) {
        $this->id = $id;
        $this->codigoDeBarra = $codigoDeBarra;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->stock = $stock;
        $this->precio = $precio;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        if(is_numeric($id) && $id > 0) {
            $this->id = $id;
        }
    }

    public function getCodigoDeBarra() {
        return $this->codigoDeBarra;
    }

    public function setCodigoDeBarra($codigoDeBarra) {
        if(is_numeric($codigoDeBarra) && $codigoDeBarra > 0 && $codigoDeBarra < 6) {
            $this->codigoDeBarra = $codigoDeBarra;
        }
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        if(!empty($nombre)) {
            $this->nombre = $nombre;
        }
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        if(!empty($tipo)) {
            $this->tipo = $tipo;
        }
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        if(is_numeric($stock)) {
            $this->stock = $stock;
        }
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        if(is_float( $precio ) && $precio > 0) {
            $this->precio = $precio;
        }
    }

    public function AltaProducto($archivo) {
        $productos = $this->LeerProducto($archivo);

        $productos[] = [
            "id" => $this->getId(),
            "codigoBarra" => $this->getCodigoDeBarra(),
            "nombre" => $this->getNombre(),
            "tipo" => $this->getTipo(),
            "stock" => $this->getStock(),
            "precio" => $this->getPrecio()
        ];

        $jsonProductos = json_decode($productos, true);

        if(file_put_contents($archivo, $jsonProductos)) {
            return true;
        } else {
            return false;
        }
    }

    // public function GuardarProducto($producto, $archivo) {
        
    // }

    public function VerificarProducto($archivo) {

    }

    public function LeerProducto($archivo) { 
        if(file_exists($archivo)) {
            $contenido = file_get_contents($archivo);
            $productosDecodificados = json_decode($contenido, true);

            if($productosDecodificados !== null) {
                return $productosDecodificados;
            } else {
                echo "Error: no se pudo decodificar el archivo .json";
            }
        } else {
            return array();
        }
    }

}