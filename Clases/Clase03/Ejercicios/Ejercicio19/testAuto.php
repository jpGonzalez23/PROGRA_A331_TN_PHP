<?php
include './Clase/Auto.php';

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
echo "Importe sumado del primer auto más el segundo: $" . $importeDouble . "</br>";

// Comparar autos
echo "¿El auto1 está en la misma marca que el auto2? ";
echo $auto1->Equals($auto2) ? "Sí" : "No";
echo "<br>";

echo "¿El auto1 está en la misma marca que el auto5? ";
echo $auto1->Equals($auto5) ? "Sí" : "No";
echo "<br>";

// Utilizar el método de clase MostrarAuto para mostrar cada los objetos impares (1, 3, 5)
echo "<strong>Mostrar autos impares:</strong><br>";
Auto::MostrarAuto($auto1);
echo "<br>";
Auto::MostrarAuto($auto3);
echo "<br>";
Auto::MostrarAuto($auto5);
echo "<br>";

// Alta de autos y lectura desde el archivo autos.csv
$auto6 = new Auto("Chevrolet", "Blanco", 35000, new DateTime());
$auto7 = new Auto("Renault", "Gris", 28000, new DateTime());
Auto::GuardarAuto($auto6);
Auto::GuardarAuto($auto7);

echo "<strong>Autos leídos desde el archivo autos.csv:</strong><br>";
$autosLeidos = Auto::LeerAutos();
foreach ($autosLeidos as $auto) {
    Auto::MostrarAuto($auto);
    echo "<br>";
}

