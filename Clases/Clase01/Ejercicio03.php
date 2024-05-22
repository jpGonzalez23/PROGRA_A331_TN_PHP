/**
Gonzalez Juan Pablo <br/>

 Aplicación No 3 (Obtener el valor del medio)
    Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
    el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
    variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido. Ejemplo 1: $a= 6; $b = 9; $c = 8; => se muestra 8.
    Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
 */<br/>

 <?php 
 $a = 15;
 $b = 20;
 $c = 12;

 if (($a < $b && $a > $c) || ($a > $b && $a < $c)) {
   $valorDelMedio = $a;
 }
 else if (($b< $a && $b > $c) || ($b > $a && $b < $c)) {
   $valorDelMedio = $b;
}
else if (($c < $a && $c > $b) || ($c > $a && $c < $b)) {
   $valorDelMedio = $c;
}
else {
   $valorDelMedio = null;
}

if ($valorDelMedio !== null) {
   echo "El valor del medio es: " . $valorDelMedio ."";
}
else {
   echo "no existe un valor del medio";
}

?>