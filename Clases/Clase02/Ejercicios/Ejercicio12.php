<?php
/** 
Gonzalez Juan Pablo

 Aplicación No 12 (Invertir palabra)
    Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
    de las letras del Array.
    Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
**/

$palabra = "HOLA";
$arrayPalabra = str_split($palabra);

$palabraInvertida = InvertirPalabra($arrayPalabra);

echo "Palabra original: " . $palabra ."<br/>";
echo "Palabra Invertida: " . $palabraInvertida ."<br/>";

function InvertirPalabra($array) {
    $arrayInvertida = array_reverse($array);

    $cadenaInvertida = implode("", $arrayInvertida);    

    return $cadenaInvertida;
}