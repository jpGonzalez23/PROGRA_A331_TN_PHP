<?php
/**
 * Gonzalez Juan Pablo
 * Realizar una clase llamada “Auto” que posea los siguientes atributos
 *  privados: _color (String)
 * _precio (Double)
 * _marca (String).
 * _fecha (DateTime)
 * Realizar un constructor capaz de poder instanciar objetos pasándole como
 * parámetros: i. La marca y el color.
 *             ii. La marca, color y el precio.
 *             iii. La marca, color, precio y fecha.
 * Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble
 * por parámetro y que se sumará al precio del objeto.
 * Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
 * por parámetro y que mostrará todos los atributos de dicho objeto.
 * Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
 * devolverá TRUE si ambos “Autos” son de la misma marca.
 * Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
 * de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
 * la suma de los precios o cero si no se pudo realizar la operación.
 * Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
 **/
include_once "./Auto.php";

// Crear objetos Auto
$auto1 = new Auto("Ford", "Azul");
$auto2 = new Auto("Ford", "Rojo");
$auto3 = new Auto("Toyota", "Azul", 20000);
$auto4 = new Auto("Toyota", "Azul", 25000);
$auto5 = new Auto("Toyota", "Azul", 30000, new DateTime());

// Agregar impuesto a los autos
$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

// Obtener el importe sumado del primer auto más el segundo
$importeDouble = Auto::Add($auto1, $auto2);
echo "Importe sumado del primer auto más el segundo: $" . $importeDouble . "<br>";

// Comparar autos
echo "Comparación entre el primer auto y el segundo: ";
echo $auto1->Equals($auto2) ? "Son iguales" : "Son diferentes";
echo "<br>";

echo "Comparación entre el primer auto y el quinto: ";
echo $auto1->Equals($auto5) ? "Son iguales" : "Son diferentes";
echo "<br>";

// Mostrar autos impares
echo "<strong>Auto 1:</strong><br>";
Auto::MostrarAuto($auto1);
echo "<br>";

echo "<strong>Auto 3:</strong><br>";
Auto::MostrarAuto($auto3);
echo "<br>";

echo "<strong>Auto 5:</strong><br>";
Auto::MostrarAuto($auto5);