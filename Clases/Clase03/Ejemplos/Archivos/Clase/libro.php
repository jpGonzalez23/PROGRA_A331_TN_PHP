<?php
class Libro {
    private $_titulo;
    private $_precio;

    public function __construct($titulo, $precio) {
        $this->_titulo = $titulo;
        $this->_precio = $precio;
    }

    public static function GuardarLibro($libro) {
        $archivo = fopen("./libros.txt", "a"); // a de apped

        $cadena = $libro->_titulo . " - " . $libro->_precio . PHP_EOL;

        $resultado = fwrite($archivo, $cadena);

        echo $cadena;

        if ($resultado) {
            echo "Escribio correctamente";
        }
        else { 
            echo "No pudo escribir";
        }

        fclose($archivo);
    }

    public static function LeerLibro() {
        $archivo = fopen("./libros.txt", "r");

        $contenido = fread($archivo, filesize("libros.txt"));

        echo $contenido;

        fclose($archivo);
    }

    public static function EncontrarPrecio($titulo) {
        $archivo = fopen("./libros.txt", "r");

        while (!feof($archivo)) {
            $linea = fgets($archivo);
            // strpos
            $pos = strpos($linea, " - ");
            $tituloObtenido = substr($linea, 0, $pos);
            
            echo $tituloObtenido . "<br>";

            $precio = substr($linea, $pos + 3);
            
            if (strcmp($titulo, $tituloObtenido) == 0) {
                echo $precio;
            }

            // explode

            
        }

        fclose($archivo);
    }

}