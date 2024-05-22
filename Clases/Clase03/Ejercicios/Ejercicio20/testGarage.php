<?php
include './Clase/Auto.php';
include './Clase/Garage.php';

// Crear objetos Auto y Garage
$auto1 = new Auto("Ford", "Azul");
$auto2 = new Auto("Ford", "Rojo");
$auto3 = new Auto("Toyota", "Azul", 20000);
$auto4 = new Auto("Toyota", "Azul", 25000);
$auto5 = new Auto("Toyota", "Azul", 30000, new DateTime());

$miGarage = new Garage("Mi Garage", 50);

// Agregar autos al garage
$miGarage->Add($auto1);
$miGarage->Add($auto3);
$miGarage->Add($auto5);

// Mostrar el garage
echo "<strong>Estado del Garage:</strong><br>";
$miGarage->MostrarGarage();
echo "<br>";

// Probar método Equals
echo "¿El auto1 está en el garage? ";
echo $miGarage->Equals($auto1) ? "Sí" : "No";
echo "<br>";

// Probar método Add
echo "Intentando agregar auto1 nuevamente al garage...<br>";
$miGarage->Add($auto1);

// Probar método Remove
echo "Intentando remover auto2 del garage...<br>";
$miGarage->Remove($auto2);

// Mostrar el garage actualizado
echo "<strong>Estado del Garage Actualizado:</strong><br>";
$miGarage->MostrarGarage();
echo "<br>";

// Alta de garages y lectura desde el archivo garages.csv
$garage1 = new Garage("Garage 1", 30);
$garage2 = new Garage("Garage 2", 120);
Garage::GuardarGaraje($garage1);
Garage::GuardarGaraje($garage2);

echo "<strong>Garages leídos desde el archivo garages.csv:</strong><br>";
$garagesLeidos = Garage::LeerGarages();
foreach ($garagesLeidos as $garage) {
    $garage->MostrarGarage();
    echo "<br>";
}

