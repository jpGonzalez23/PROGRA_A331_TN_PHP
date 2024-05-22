/** 
Gonzalez Juan Pablo <br/>

Aplicación No 4 (Calculadora)
Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla.
*/

<?php 

$operado;
$numero1 = 10;
$numero2 = 12;

switch ("-") {
    case "+":
        $operado = $numero1 + $numero2;
        break;
    case "-":
        $operado = $numero1 - $numero2;
        break;
    case "*":
        $operado = $numero1 * $numero2;
        break;
    case "/":
        if ($numero2 > 0) {
            $operado = $numero1 / $numero2;
        }
        else {
            $operado = "No se puede dividir por cero";
        }
        break;
}

echo "<br/>" . "el resultado es: " . $operado;

?>