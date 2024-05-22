/**  
<br/>
Gonzalez Juan Pablo
<br/>

Aplicación No 10 (Arrays de Arrays)
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
Arrays de Arrays.
<br/>
**/

<br/>
<?php 
$lapicerasAsociativo = [
    'lapicera1' => [
        'color' => 'Azul',
        'marca' => 'Bic',
        'trazo' => 'Fino',
        'precio' => 10.5
    ],
    'lapicera2' => [
        'color' => 'Rojo',
        'marca' => 'Paper Mate',
        'trazo' => 'Medio',
        'precio' => 8.75
    ],
    'lapicera3' => [
        'color' => 'Negro',
        'marca' => 'Faber-Castell',
        'trazo' => 'Grueso',
        'precio' => 12.0
    ]
];

// Array indexado de Arrays
$lapicerasIndexado = [
    [
        'Azul', 'Bic', 'Fino', 10.5
    ],
    [
        'Rojo', 'Paper Mate', 'Medio', 8.75
    ],
    [
        'Negro', 'Faber-Castell', 'Grueso', 12.0
    ]
];

// foreach ($lapicerasAsociativo as $nombre => $lapicera) {
//     echo "Lapicera $nombre:<br>";
//     foreach ($lapicera as $clave => $valor) {
//         echo "$clave: $valor<br>";
//     }
//     echo "<br>";
// }

// Mostrar el Array indexado de Arrays
echo "<strong>Array indexado de Arrays:</strong><br>";
foreach ($lapicerasIndexado as $i => $lapicera) {
    echo "Lapicera " . ($i + 1) . ":<br>";
    echo "Color: " . $lapicera[0] . "<br>";
    echo "Marca: " . $lapicera[1] . "<br>";
    echo "Trazo: " . $lapicera[2] . "<br>";
    echo "Precio: $" . $lapicera[3] . "<br><br>";
}
?>