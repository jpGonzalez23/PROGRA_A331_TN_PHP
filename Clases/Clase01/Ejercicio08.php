/** 
<br/>
Gonzalez Juan Pablo
<br>
Aplicación No 8 (Carga aleatoria)
Imprima los valores del vector asociativo siguiente usando la estructura de control foreach:
$v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';
<br/>
**/
<br>

<?php 
$vector = [
    1 => 90,
    30 => 7,
    'e' => 99,
    "hola" => 'mundo'
];

foreach ($vector as $clave => $valor){
    echo "Clave: $clave, Valor: $valor<br/>";
}
?>