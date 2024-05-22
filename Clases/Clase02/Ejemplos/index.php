<?php 

include "./Usuario.php";
include "./Empleado.php";

$empleado = new Empleado("Juan", "Gonzalez", 12345678, 22, 6);
$usuario = new Usuario("Agustin", "F", 87654321, 6);

$mostrarDatosUsuario = $usuario->Motrar();

echo $mostrarDatosUsuario;

echo "<br/><br/>";

echo $empleado->Motrar();

echo "<br/><br/>";

echo Empleado::MostrarEstatico($empleado);

echo "<br/><br/>";
