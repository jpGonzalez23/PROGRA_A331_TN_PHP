/****
Gonzalez Juan Pablo
Aplicación No 6 (Carga aleatoria)
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
****/
<br/>

<?php 
$num = [];

for ($i = 0; $i < 5; $i++) {
    $num[$i] = rand(1,10);
}        

$promedio = array_sum($num) / count($num);

if($promedio > 6) {
    echo "El promedio de los números es mayor que 6";
}
else if($promedio < 6) {
    echo "El promedio de los números es menor que 6";
}
else {
    echo "El promedio de los números es igual a 6";
}

echo "<br>Números generados: ";
echo implode(",", $num);
?>