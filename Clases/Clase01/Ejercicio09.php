/**
<br/>
Gonzalez Juan Pablo
<br/>

Aplicación No 9 (Arrays asociativos)
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
lapiceras.
<br/>
**/
<br/>

<?php

$lapicera = [
    [
        "color" => "Azul",
        "marca" => "Bic",
        "trazo" => "Fino",
        "precio" => 10.5
    ],
    [
        "color" => "Rojo",
        "marca" => "Paper Mate",
        "trazo" => "medio",
        "precio" => 8.75
    ],
    [   
        "color" => "Negro",
        "marca" => "Faber-Castell",
        "trazo" => "Grueso",
        "precio" => 12.0
    ]
];

foreach ($lapicera as $indice => $datos){
    echo "Lapicera $indice:<br>";
    echo "Color: " . $datos['color'] . "<br>";
    echo "Marca: " . $datos['marca'] . "<br>";
    echo "Trazo: " . $datos['trazo'] . "<br>";
    echo "Precio: $" . $datos['precio'] . "<br><br>";
}
?>
