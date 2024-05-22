/*****
Gonzalez Juan Pablo
Aplicación No 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números
utilizando las estructuras while y foreach.
*****/

<?php 

$arrayNumeroImpares = [];
$numero = 1;

for ($i = 0; $i < 10; $i++) {
    $arrayNumeroImpares[] = $numero;
    $numero += 2;
}

echo "<br>" . "Imprimiendo utilizando la estructura for: <br>";
for ($i = 0; $i < count($arrayNumeroImpares); $i++) {
    echo $arrayNumeroImpares[$i] . "<br/>";
}

echo "<br>"."Imprimiendo utilizando la estructura while" . "<br/>";
$i = 0;
while ($i < count($arrayNumeroImpares)) { 
    echo $arrayNumeroImpares[$i] . "<br/>";
    $i++;
}

echo "<br>"."Imprimiendo utilizando la etructura foreach <br/>";
foreach ($arrayNumeroImpares as $numero) {
    echo $numero . "<br/>";
}

?>