/*
Nombre: Gonzalez Juan Pablo
<br/>

Aplicación No 2 (Mostrar fecha y estación)
    Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
    distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
    año es. Utilizar una estructura selectiva múltiple.
*/

<?php

$fecha = date("d/m/o H:i:s");

echo "<br/>" . $fecha . "";

$mes = date("m");

switch ($mes) {
    case "12":
    case "01":
    case "02":
    case "03":
        $estacion = "verano";
        break;

    case "04":
    case "05":
    case "06":
        $estacion = "invierno";
        break;

    case "07":
    case "08":
    case "09":
        $estacion = "otoño";
        break;

    case "10":
    case "11":
        $estacion = "primavera";
        break;

    default:
        echo "Mes invalido";
        break;

}

echo "<br/>" . "la estacion es: ". $estacion ;

?>